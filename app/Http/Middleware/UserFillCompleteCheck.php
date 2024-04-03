<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class UserFillCompleteCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
            $requiredFields = ['first_name', 'last_name', 'phone_number', 'email', 'image', 'address', 'gender'];
            foreach ($requiredFields as $field) {
                if (empty($user->$field)) {
                    Alert::error('Please Complete your Profile First')->persistent(true);
                    if ($user->roles == 1) {
                        return redirect()->route('tenant.profile');
                    } elseif ($user->roles == 2) {
                        return redirect()->route('landlord.profile');
                    }
                }
            }
        }
        return $next($request);
    }
}
