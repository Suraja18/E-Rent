<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\RentedProperty;
use App\Models\RentProperty;
use App\Notifications\ApprovalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RentController extends Controller
{
    public function viewAllProperty()
    {
        $properties = RentedProperty::where('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->get();
        $count = $properties->count();
        $data = ['count' => $count, 'properties' => $properties,];
        return view('Tenants.view-rented-property', $data);
    }

    public function viewRentedProperty(Request $request)
    {
        $properties = RentedProperty::where('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->where('status', $request->selectStatus)->get();
        $count = $properties->count();
        $data = ['count' => $count, 'properties' => $properties,];
        return view('Tenants.view-rented-property', $data);
    }

    public function rentStore(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|exists:rent_properties,id',
            'checkbox' => 'required|in:on'
        ]);

        if ($validate) {
            $isPropertyRented = RentedProperty::where('rent_id', $request->id)->exists();

            if ($isPropertyRented) {
                Alert::error('This Property is already processed by others');
                return redirect()->back();
            } else {
                $rent = new RentedProperty;
                $rent->tenant_id = Auth::id();
                $rent->rent_id = $request->id;
                $rent->discount = 0;
                $rent->status = "New";
                $rent->active = "No";
                $rent->save();
                $landlord = $rent->rentProperty->landlord;
                $landlord->notify(new ApprovalNotification($rent));

                Alert::success("Your Request is sent to Landlord for Approval");
                return redirect()->route('tenant.view.allProperty');
            }
        }
    }

    public function displaySelectProperty(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if (!$property) {
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->first();
        $data = ['property' => $property, 'property_rent' => $rented_property];
        return view('Tenants.view-detail', $data);
    }

    public function propertyDelete(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if (!$property) {
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->first();
        $rented_property->tenantVisible = "No";
        $rented_property->update();
        Alert::success('Building Rent Deleted Successfully');
        return redirect()->route('tenant.view.allProperty');
    }

    public function propertyCheckout(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if (!$property) {
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->first();
        $rented_property->status = "Checked Out";
        $rented_property->update();
        Alert::success('Building Rent Checked Out Successfully');
        return redirect()->route('tenant.view.allProperty');
    }
    public function propertyCancel(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if (!$property) {
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->first();
        $rented_property->status = "Cancelled";
        $rented_property->update();
        Alert::success('Building Rent Cancelled Out Successfully');
        return redirect()->route('tenant.view.allProperty');
    }
}
