<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $users;
    public function __construct(UserServices $userService)
    {
        $this->users = $userService;
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
}
