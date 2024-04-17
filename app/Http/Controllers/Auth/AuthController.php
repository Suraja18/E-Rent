<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        User::create($validatedData);
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

        if (Auth::attempt(['email' => $email, 'password' => $password, 'roles' => 1])) {
            $request->session()->put('time-to-log_' . Auth::id(), now()->addMinutes(30));
            return redirect()->route('tenant.dashboard');
        }
        if (Auth::attempt(['email' => $email, 'password' => $password, 'roles' => 2])) {
            $request->session()->put('time-to-log_' . Auth::id(), now()->addMinutes(30));
            return redirect()->route('landlord.dashboard');
        }
        return redirect()->route('user.login')->withErrors(['email' => 'Invalid credentials']);
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
}
