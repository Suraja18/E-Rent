<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function dashboard()
    {
        return view('Tenants.index');
    }
    public function aboutPage()
    {
        return view('Tenants.about');
    }
    public function landlordList()
    {
        return view('Tenants.landlord-list');
    }
    public function propertyList()
    {
        return  view('Tenants.property-list');
    }
    public function propertyTypes()
    {
        return view('Tenants.property-type');
    }
    public function contactPage()
    {
        return view('Tenants.contact');
    }
    public function maintenanceRequest()
    {
        return view('Tenants.maintenance-request');
    }
    public function landlordForum()
    {
        return view('Tenants.landlord-forum');
    }
    public function pressMedia()
    {
        return view('Tenants.press-media');
    }
    public function customerReview()
    {
        return view('Tenants.customer-review');
    }
    public function addFriend()
    {
        return view('Tenants.add-friends');
    }
    public function profile()
    {
        $data = ['user' => User::findOrFail(Auth::id()),];
        return view('Tenants.edit-profile', $data);
    }
}
