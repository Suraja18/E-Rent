<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function updateContact(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->first_name=$request->first_name;
        $contact->last_name=$request->last_name;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->save();
        Alert::success('Your Message has been sent!');
        return redirect()->back();
    }
}
