<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\PressMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function helpCentre()
    {
        return view('Users.help-centre');
    }
    public function allService()
    {
        return view('Users.services');
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
    public function newsAndMedia(string $slug)
    {
        $press = PressMedia::where('slug', $slug)->first();
        $user = User::find(Auth::id());
        if($user && $user->roles == 1)
        {
            return view('Tenants.Press-Media.details', compact('press'));
        }else{
            return view('Users.press-detail',compact('press'));
        }
    }
}
