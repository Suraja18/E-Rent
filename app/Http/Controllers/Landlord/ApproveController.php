<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\RentedProperty;
use App\Models\RentProperty;
use App\Notifications\PayRentNotification;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ApproveController extends Controller
{
    public function index()
    {
        $rentProperties = RentProperty::where('landlord_id', Auth::id())->get();
        $rentedProperties = RentedProperty::whereIn('rent_id', $rentProperties->pluck('id'))->where('status', 'New')->get();
        $data = ['rentedProperties' => $rentedProperties];
        return view('Landlords.ApproveRent.index', $data);
    }

    public function edit(string $id)
    {
        $rent = RentedProperty::findOrFail($id);
        $property  = RentProperty::where('id', $rent->rent_id)->first();
        $data = ['property' => $property, 'rented_property' => $rent];
        return view('Landlords.ApproveRent.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'discount' => 'required|numeric|min:0|max:10000000000',
        ]);
        if($validate)
        {
            $rentProperties = RentProperty::where('landlord_id', Auth::id())->get();
            $rentedProperties = RentedProperty::whereIn('rent_id', $rentProperties->pluck('id'))->where('status', 'New')->get();
            $rent = RentedProperty::findOrFail($id);
            $property  = RentProperty::where('id', $rent->rent_id)->first();
            $data = ['property' => $property, 'rented_property' => $rent, 'rentedProperties' => $rentedProperties];
            if($property->type == "Rent")
            {
                $price = $property->monthly_house_rent;
                $rentMessage = "Please Pay the deposit for <b>". $property->building->name ."<b/> rent";
                $tenantMessage = "Rented Building for <b>". $property->building->name ."</b> has been approved.";
            }else{
                $price = $property->price ;
                $rentMessage = "Please Pay the price for <b>". $property->building->name ."<b/>";
                $tenantMessage = "Purchase Building for <b>". $property->building->name ."</b> has been approved.";
            }
            if($price <= $request->discount)
            {
                Alert::error('Your discount amount is greater than the house price');
                return view('Landlords.ApproveRent.edit', $data);
            }else{
                
                $rent->status = "Approved";
                $rent->discount = $request->discount;
                $rent->update();
                $rent->tenant->notify(new UserNotification([
                    'tenantMessage' => $tenantMessage,
                ]));
                $rent->tenant->notify(new PayRentNotification([
                    'rentMessage' => $rentMessage,
                ]));
                Alert::success('This building has been approved to '. $rent->tenant->first_name);
                return redirect()->route('approve.index');
            }
        }
    }

    public function destroy(string $id)
    {
        $rent = RentedProperty::findOrFail($id);
        $property  = RentProperty::where('id', $rent->rent_id)->first();
        $rent->status = "Cancelled";
        $rent->update();
        $rent->delete();
        $rent->tenant->notify(new UserNotification([
            'tenantMessage' => "Rented Building for <b>". $property->building->name ."</b> has been cancelled."
        ]));
        Alert::success('Building Rent Declined Successfully');
        return redirect()->route('approve.index');
    }
}
