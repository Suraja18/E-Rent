<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Notifications\EmailTempPassword;
use App\Notifications\VerifyEmailNotification;
use App\Notifications\VerifyOTPNotification;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    protected $users;
    public function __construct(UserServices $userService)
    {
        $this->users = $userService;
    }

    public function chat()
    {
        return view('chat');
    }

    public function registerComplete(UserRequest $request)
    {
        $validatedData = $this->users->userStore($request->validated());
        $user = User::create($validatedData);
        $user->notify(new VerifyEmailNotification);
        Alert::success('Registration Successful.', 'Please check your email to verify first');
        return redirect()->route('user.login');
    }
    public function showLoginForm()
    {
        return view('Auth.Users.login');
    }

    public function registerUser()
    {
        return view( 'Auth.Users.register' );
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::withTrashed()->where('email', $email)->first();
        if ($user && password_verify($password, $user->password))
        {
            if ($user->trashed()) {
                $user->restore();
            }
        }
    
        $credentials = ['email' => $email, 'password' => $password];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userMode = User::find(Auth::id());
            if ($user->email_verified_at !== null) {
                if ($user->roles == 1) {
                    $request->session()->put('time-to-log_' . $user->id, now()->addMinutes(60));
                    $userMode->restore();
                    $userMode->update();
                    Alert::success('Login Successful');
                    return redirect()->route('tenant.dashboard');
                } elseif ($user->roles == 2) {
                    $request->session()->put('time-to-log_' . $user->id, now()->addMinutes(60));
                    $userMode->restore();
                    $userMode->update();
                    Alert::success('Login Successful');
                    return redirect()->route('landlord.dashboard');
                }
            } else {
                Auth::logout();
                Alert::error('Your email address is not verified.', 'Please check your email to verify first');
                $userMode->notify(new VerifyEmailNotification); 
                return redirect()->route('user.login');
            }
        }
        Alert::error('Invalid credentials.', 'Please enter correct email and password');
        return redirect()->route('user.login');
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
    public function Home()
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return redirect()->route('user.index');
        }
        if($user->roles == 3)
        {
            return redirect()->route('admin.dashboard');
        }
        if($user->roles == 2)
        {
            return redirect()->route('landlord.dashboard');
        }
        if($user->roles == 1)
        {
            return redirect()->route('tenant.dashboard');
        }
        
    }
    public function updateProfile(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'phone_number' => [
                'required',
                'numeric',
                'digits_between:9,10',
                Rule::unique('users', 'phone_number')->ignore(auth()->user()->id),
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'address' => 'required|string',
            'gender' => ['required', 'string', Rule::in(['Male', 'Female'])],
        ]);
        if($validate){
            $user = User::findOrFail(Auth::id());
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $image = $request->image;
            if ($image) {
                File::delete('Images/Variable/Users'. $user->image);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move('Images/Variable/Users', $imageName);
                $user->image = 'Images/Variable/Users/' . $imageName;
            }
            $user->update();
            Alert::success('Your Profile has been Updated Successfully');
            return redirect()->back();
        }
        
        
    }
    public function verify(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            Alert::error('Invalid verification link.');
            return redirect()->route('user.login');
        }

        $user->email_verified_at = now();
        $user->save();
        Alert::success('Email verified successfully.','You can now log in.');
        return redirect()->route('user.login');
    }
    public function changePassword()
    {
        return view('Auth.Users.change-password');
    }
    public function changeTryPassword(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|different:old_password',
            'confirm_password' => 'required|same:password',
        ]);
        if($validate)
        {
            if (!Hash::check($request->old_password, Auth::user()->password)) {
                Alert::error('The old password is incorrect.', 'Please insert correct password to continue.');
                if(Auth::user()->roles === 1)
                {
                    return redirect()->route('tenant.change.password');
                }
                elseif(Auth::user()->roles === 2)
                {
                    return redirect()->route('landlord.change.password');
                }
                
            }
            $user = User::find(Auth::id());
            $user ->update([
                'password' => $request->password,
            ]); 
            Auth::logout();
            Alert::success('Password Changed Successfully.', 'Please login again');
            return redirect()->route('user.login');
        }
    }
    public function changeEmail()
    {
        return view('Auth.Users.change-email');
    }
    public function changeTryEmail(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required',
        ]);
        if($validate)
        {
            if (!Hash::check($request->password, Auth::user()->password)) {
                Alert::error('The old password is incorrect.', 'Please insert correct password to continue.');
                if(Auth::user()->roles === 1)
                {
                    return redirect()->route('tenant.change.email');
                }
                elseif(Auth::user()->roles === 2)
                {
                    return redirect()->route('landlord.change.email');
                }   
            }
            $user = User::find(Auth::id()) ;
            $user-> email= $request->email;
            $user->notify(new VerifyOTPNotification(Auth::id()));
            Auth::logout();
            Alert::success('Email Changed Request have been sent to Email.', 'Please check your email');
            return redirect()->route('user.login');
        }
    }
    public function verifiedEmail(Request $request)
    {
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->update();
        Alert::success('Email Changed Successfully.', 'Please login to continue');
        return redirect()->route('user.login');
    }
    public function deactiveAccount()
    {
        $user = User::find(Auth::id());
        $user->delete();
        Alert::success('Account deactivated Successfully.', 'You all information will be permenantly deleted after 30 days');
        return redirect()->route('user.login');
    }
    public function forgetPassword()
    {
        return view('Auth.Users.email');
    }
    public function sendPass(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|email',
        ]); 
        if($validate)
        {
            $user = User::where('email', $request->email)->first();
            if($user)
            {
                $password = Str::random(10);
                $user->password = $password;
                $user->update();
                $user->notify(new EmailTempPassword($password));
                Alert::success("We have sent a temporary password on your registered email address.", "Check Your Registered Email");
                return redirect()->route('user.login');
            }
            else{
                Alert::error("Your email address wasn't registered");
                return redirect()->route('forgetPassword');
            }
           
        }  
    }

    public function showAdminLogin()
    {
        return view('Auth.Admin.login');
    }
    public function doAdminLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');    
        $credentials = ['email' => $email, 'password' => $password];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->roles == 3) {
                $request->session()->put('time-to-log_' . $user->id, now()->addMinutes(60));
                Alert::success('Login Successful');
                return redirect()->route('admin.dashboard');
            }
        }
        Alert::error('Invalid credentials.', 'Please enter correct email and password');
        return redirect()->route('admin.login');   
    }
}
