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
    public function landlordList()
    {
        return view('Users.landlord-list');
    }
    public function propertyList()
    {
        return  view('Users.property-list');
    }
    public function propertyTypes()
    {
        return view('Users.property-type');
    }
    public function userRoles()
    {
        return view('Users.user-roles');
    }
}
