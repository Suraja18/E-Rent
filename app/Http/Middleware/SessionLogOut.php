<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionLogOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::id();

        if ($request->session()->has('time-to-log_' . $userId)) {
            $loginTime = $request->session()->get('time-to-log_' . $userId);
            if (now()->diffInMinutes($loginTime) > 60) {
                $user = User::find(Auth::id());
                $user->active_status = 0;
                $user->update();
                Auth::logout();
                if($user->roles == 3)
                {
                    return redirect()->route('admin.login')->withErrors(['email' => 'Session expired. Please log in again.']);
                }
                return redirect()->route('user.login')->withErrors(['email' => 'Session expired. Please log in again.']);
            }
        }

        return $next($request);
    }
}
