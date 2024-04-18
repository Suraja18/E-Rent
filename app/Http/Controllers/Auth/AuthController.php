<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
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
        return view('Auth.Users.password');
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
    
        $credentials = ['email' => $email, 'password' => $password];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userMode = User::find(Auth::id());
            if ($user->email_verified_at !== null) {
                if ($user->roles == 1) {
                    $request->session()->put('time-to-log_' . $user->id, now()->addMinutes(30));
                    $userMode->deleted_at = null;
                    $userMode->update();
                    Alert::success('Login Successful');
                    return redirect()->route('tenant.dashboard');
                } elseif ($user->roles == 2) {
                    $request->session()->put('time-to-log_' . $user->id, now()->addMinutes(30));
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
   

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'password' => 'required|min:8',
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
}
