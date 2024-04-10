<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\RentedProperty;
use App\Models\RentProperty;
use App\Models\User;
use App\Notifications\PayRentNotification;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TenantController extends Controller
{
    public function activeIndex()
    {
        $landlordId = Auth::id();
        $activeTenants = User::whereHas('rentedProperties', function ($query) {
            $query->whereNull('deleted_at')
                ->where('status', 'Confirmed');
        })->whereHas('rentedProperties.rentProperty.landlord', function ($query) use ($landlordId) {
            $query->where('id', $landlordId);
        })->where('roles', '1')->get();

        $data = [
            'tenants' => $activeTenants,
        ];
        return view('Landlords.Tenants.Active.index', $data);
    }

    public function alreadyRented()
    {
        $landlordId = Auth::id();
        $rentedProperties = RentedProperty::whereHas('rentProperty', function($query) use ($landlordId) {
            $query->where('landlord_id', $landlordId);
        })
        ->where('status', 'Confirmed')
        ->whereNull('deleted_at')
        ->with(['payments'])
        ->get();

        $data = [
            'properties' => $rentedProperties,
        ];
        return view('Landlords.Property-Occupants.Occupant.index', $data);
    }

    public function notifyRented(string $id, string $amt)
    {   
        $rentedProperties = RentedProperty::where('id', $id)->first();
        $rentedProperties->tenant->notify(new PayRentNotification([
            'rentMessage' => 'Please pay the remaining amount '. $amt . ' for your rent property name '. $rentedProperties->rentProperty->building->name . ' .',
        ]));
        Alert::success('Notification has been sent');
        return redirect()->route('landlord.property.rent.index');

    }

    public function vacantProperty()
    {
        $availableRentProperties = RentProperty::whereNotIn('id', function ($query) {
            $query->select('rent_id')->from('rented_properties')->where(function ($query) {
                $query->whereIn('status', ['Confirmed', 'Approved']);
            });
        })->latest()->get();
        $data = ['properties' => $availableRentProperties,];
        return view('Landlords.Property-Occupants.Vacant.index', $data);
    }
    
}
