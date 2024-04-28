<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use App\Models\webReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.index');
    }
    public function profile()
    {
        $data = ['user' => User::findOrFail(Auth::id()),];
        return view('Admin.edit-profile', $data);
    }
    public function banners()
    {
        $banner = Banner::first();
        return view('Admin.Banner.index', compact('banner'));
    }
    public function bannerStore(Request $request)
    {
        $validate = $request->validate([
            'user_heading' => 'required|string|min:3|max:100',
            'user_description' => 'required|string|min:3|max:250',
            'tenant_heading' => 'required|string|min:3|max:100',
            'tenant_description' => 'required|string|min:3|max:250',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate)
        {
            $banner = Banner::first();
            $banner->user_head = $request->user_heading;
            $banner->user_desc = $request->user_description;
            $banner->tenant_head = $request->tenant_heading;
            $banner->tenant_desc = $request->tenant_description;
            $image1 = $request->image_1;
            $image2 = $request->image_2;
            $image3 = $request->image_3;
            $image4 = $request->image_4;
            if ($image1) {
                File::delete($banner->image1);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Banner', $imageName);
                $banner->image1 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image2) {
                File::delete($banner->image2);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
                $image2->move('Images/Variable/Banner', $imageName);
                $banner->image2 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image3) {
                File::delete($banner->image3);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
                $image3->move('Images/Variable/Banner', $imageName);
                $banner->image3 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image4) {
                File::delete($banner->image4);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
                $image4->move('Images/Variable/Banner', $imageName);
                $banner->image4 = "Images/Variable/Banner/" . $imageName;
            }
            $banner->update();
            Alert::success('Banner Successfully updated');
            return redirect()->route('admin.banners');
        }

    }
    public function company()
    {
        $data = ['company' => Company::first(),];
        return view('Admin.Company.index', $data);
    }
    public function companyStore(Request $request)
    {
        $validate = $request->validate([
            'address'             => 'required|string|max:255',
            'email'               => 'required|email|max:255',
            'phone_number'        => 'required|numeric|digits_between:9,10',
            'logo'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'google_map'          => 'required|url|max:2048',
            'linkedin'            => 'required|url|max:2048',
            'facebook'            => 'required|url|max:2048',
            'instagram'           => 'required|url|max:2048',
            'twitter'             => 'required|url|max:2048',
            'contact_description' => 'required|string|min:25|max:250',
        ]);
        if($validate)
        {
            $company = Company::first();
            $company->address = $request->address;
            $company->email = $request->email;
            $company->phone_number = $request->phone_number;
            $image1 = $request->logo;
            if ($image1) {
                File::delete($company->logo);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Company', $imageName);
                $company->logo = "Images/Variable/Company/" . $imageName;
            }
            $company->google_map = $request->google_map;
            $company->linkedin = $request->linkedin;
            $company->facebook = $request->facebook;
            $company->instagram = $request->instagram;
            $company->twitter = $request->twitter;
            $company->contact_description = $request->contact_description;
            $company->save();
            Alert::success('Company Details Updated Successfully');
            return redirect()->route('admin.company'); 
        }
       
    }
    public function getRating()
    {
        $data = ['rates' => webReview::orderBy('rate', 'desc')->get()];
        return view('Admin.Rating.index', $data);
    }
    public function deleteRating(string $id)
    {
        $rate = webReview::find($id);
        $rate->delete();
        Alert::success('User Rate Deleted Successfully');
        return redirect()->route('admin.rating.index'); 
    }
    public function Contact()
    {
        $data = [
            'contacts' => Contact::orderBy('read')
                                 ->latest()
                                 ->get(),
        ];
        return view('Admin.Contact.index', $data);
    }
    public function updateReadStatus(Request $request)
    {
        $contact = Contact::find($request->id);
        if ($contact) {
            $contact->read = $request->read;
            $message = "Contact Marked as Read!";
            if($request->read == "0"){
                $message = "Contact Marked as Unread!";
            }
            $contact->save();
            return response()->json(['message' => $message]);
        }
        return response()->json(['message' => 'Contact not found'], 404);
    }
    public function deleteContact(string $id)
    {
        $rate = Contact::find($id);
        $rate->delete();
        Alert::success('User Contact Deleted Successfully');
        return redirect()->route('admin.contact');    
    }
    public function contactView(string $email)
    {
        $contact = Contact::where('email', $email)->first();
        $data = ['contact' => $contact, 'type' => 'readonly'];
        return view('Admin.Contact.view', $data);
    }
    public function AllTenants()
    {
        $data = ['users' => User::where('roles', 1)->latest()->get(),];
        return view('Admin.Users.Tenants.index', $data);
    }
    public function AllLandlords()
    {
        $data = ['users' => User::where('roles', 2)->latest()->get(),];
        return view('Admin.Users.Landlords.index', $data);
    }
    public function destroyUser(string $id)
    {
        $user = User::findOrFail($id);
        if($user->roles == 1)
        {
            $user->delete();
            Alert::success('The User account is deactivated temporary.', 'The account will permanently deleted after 30 days.');
            return redirect()->route('admin.all_tenants');
        }
        if($user->roles == 2)
        {
            $user->delete();
            Alert::success('The User account is deactivated temporary.', 'The account will permanently deleted after 30 days.');
            return redirect()->route('admin.all_landlords');
        }
        return redirect()->back();
    }
}
