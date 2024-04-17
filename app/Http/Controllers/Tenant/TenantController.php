<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Forums;
use App\Models\Friends;
use App\Models\MaintenanceRequest;
use App\Models\RentPayment;
use App\Models\RentProperty;
use App\Models\User;
use App\Notifications\FriendNotification;
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
        $tenantId = Auth::id();
        $maintenanceRequests = MaintenanceRequest::select('maintenance_requests.*')
                            ->join('rented_properties', 'maintenance_requests.rented_id', '=', 'rented_properties.id')
                            ->where('rented_properties.tenant_id', $tenantId)
                            ->where('maintenance_requests.tenantVisible', 'Yes')
                            ->get();
        $count = $maintenanceRequests->count();
        $data = ['mRequest' => $maintenanceRequests, 'count' => $count, ];
        return view('Tenants.maintenance-request', $data);
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
    public function seeFriends(Request $request)
    {
        $tenant = User::findOrFail($request->tenantID);
        return view('Tenants.Profile.index', compact('tenant'));
    }
    public function unfriend(Request $request)
    {
        $tenantId = $request->tenantID;
        $authId = Auth::id();
        $tenant = User::findOrFail($tenantId);
        $friendship = Friends::where(function ($query) use ($authId, $tenantId) {
            $query->where('user_id', $authId)->where('sent_id', $tenantId)
                ->orWhere('user_id', $tenantId)->where('sent_id', $authId);
        })
        ->where('type', 'Accepted')
        ->first();
        if($friendship)
        {
            $friendship->delete();
        }
        return view('Tenants.Profile.index', compact('tenant'));
    }
    public function addingFriend(Request $request)
    {
        $friendId = $request->tenantID; 
        $authId = Auth::id();
        $friendship = Friends::where(function ($query) use ($authId, $friendId) {
            $query->where('user_id', $authId)->where('sent_id', $friendId)
                ->orWhere('user_id', $friendId)->where('sent_id', $authId);
        })
        ->where('type', 'New')
        ->first();
        if(!$friendship){
            Friends::create([
                'user_id' => auth()->id(),
                'sent_id' => $friendId,
                'type' => 'New'
            ]);
            $friend = User::find($friendId);
            if ($friend) {
                $friend->notify(new FriendNotification([
                    'friendMessage' => "New Friend Request from ". auth()->user()->first_name . " " . auth()->user()->last_name  . ".",
                ]));
            }
        }
        $friend = User::find($friendId);
        $tenant = $friend;
        return view('Tenants.Profile.index', compact('tenant'));
    }
}
