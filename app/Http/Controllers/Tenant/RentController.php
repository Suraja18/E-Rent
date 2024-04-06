<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\RentedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RentController extends Controller
{
    public function rentStore(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|exists:rent_properties,id',
            'checkbox' => 'required|in:on'
        ]);
        if($validate)
        {
            $rents = RentedProperty::withTrashed()
                    ->where('rent_id', $request->id)->get();
            if(!$rents->isEmpty())
            {
                foreach($rents as $rent)
                {
                    if($rent && $rent->rent_id == $request->id)
                    {
                        Alert::error('This Property is already processed by others');
                        return redirect()->back();             
                    }
                    else{
                        $rents = new RentedProperty;
                        $rents->tenant_id = Auth::id();
                        $rents->rent_id = $request->id; 
                        $rents->discount = 0;
                        $rents->status = "New";
                        $rents->active = "No";
                        $rents->save();
                        Alert::success("Your Request is sent to Landlord for Approval");
                        return redirect()->back();      
                    }
                }
            }else{
                $rents = new RentedProperty;
                $rents->tenant_id = Auth::id();
                $rents->rent_id = $request->id; 
                $rents->discount = 0;
                $rents->status = "New";
                $rents->active = "No";
                $rents->save();
                Alert::success("Your Request is sent to Landlord for Approval");
                return redirect()->back();   
            }   
        }
    }
}
