<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function aboutPage()
    {
        return view('Users.about');
    }
    public function contacts()
    {
        return view('Users.contact');
    }
    public function FAQS()
    {
        return view('Users.FAQs');
    }
    public function SocialNews()
    {
        return view('Users.press-media');
    }
    public function customerReview()
    {
        return view('Users.customer-review');
    }
    public function userRoles()
    {
        return view('Users.user-roles');
    }
    public function teamManagement()
    {
        return view('Users.team-management');
    }
    public function helpCentre()
    {
        return view('Users.help-centre');
    }
    public function useCases()
    {
        return view('Users.use-case');
    }
}
