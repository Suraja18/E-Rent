<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\HelpCentre;
use App\Models\PressMedia;
use App\Models\UseCases;
use App\Models\User;
use App\Models\userRoles;
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
    public function userRoleDetail(string $slug)
    {
        $role = userRoles::where('slug', $slug)->first();
        $data = ['role' => $role,];
        return view('Users.userRoleDetail', $data);
    }
    public function helpCentre()
    {
        return view('Users.help-centre');
    }
    public function allService()
    {
        return view('Users.services');
    }
    public function useCases(string $slug)
    {
        $role = userRoles::where('slug', $slug)->first();
        $cases = UseCases::where('role_id', $role->id)->latest()->get();
        $data = ['role' => $role, 'cases' => $cases,];
        return view('Users.use-case', $data);
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
    public function helpCentreFind(string $userSlug, string $slug)
    {
        $question = HelpCentre::where('slug', $slug)->first();
        return view('Users.help-centre-result', compact('question'));
    }
}
