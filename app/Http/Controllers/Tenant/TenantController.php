<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Forums;
use App\Models\RentPayment;
use App\Models\RentProperty;
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
    public function searchProperty(Request $request)
    {
        $keyword = $request->input('keyword');
        $type = $request->input('type');
        $location = $request->input('location');

        $properties = RentProperty::query();

        if ($type) {
            $properties->where('property_type_id', $type);
        }

        if ($location) {
            $properties->whereHas('building', function ($query) use ($location) {
                $query->where('address', 'like', "%$location%");
            });
        }

        if ($keyword) {
            $properties->where(function ($query) use ($keyword) {
                $query->where('rent_name', 'like', "%$keyword%")
                      ->orWhereHas('building', function ($query) use ($keyword) {
                          $query->where('name', 'like', "%$keyword%");
                      });
            });
        }
        $properties->where('status', 'Yes')
        ->whereNotIn('id', function ($query) {
            $query->select('rent_id')
                  ->from('rented_properties')
                  ->where('status', '<>', 'Cancelled')
                  ->orWhereNull('deleted_at');
        })
        ->take(4)
        ->get();

        $results = $properties->get();
        $data = ['properties' => $results, 'search' => $request,];
        return view('Tenants.property-list', $data);
    }
    public function forumDetail(string $slug)
    {
        $data = ['forum' => Forums::where('slug', $slug)->first()];
        return view('Tenants.forum-detail', $data);
    }
}
