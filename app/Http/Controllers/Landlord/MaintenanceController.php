<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;
use App\Models\RentedProperty;
use App\Models\RentProperty;
use App\Notifications\MaintenanceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MaintenanceController extends Controller
{
    public function index()
    {
        $authId = Auth::id();
        $maintenanceRequests = MaintenanceRequest::whereHas('rentedProperty.rentProperty', function ($query) use ($authId) {
            $query->where('landlord_id', $authId);
        })
        ->where('landlordVisible', 'Yes')
        ->whereIn('status', ['New', 'In Progress'])
        ->get();
        $count = $maintenanceRequests->count();
        $data = ['mRequest' => $maintenanceRequests, 'count' => $count,];
        return view('Landlords.Request.in-progress', $data);
    }
    public function complete()
    {
        $authId = Auth::id();
        $maintenanceRequests = MaintenanceRequest::whereHas('rentedProperty.rentProperty', function ($query) use ($authId) {
            $query->where('landlord_id', $authId);
        })
        ->where('landlordVisible', 'Yes')
        ->whereIn('status', ['Completed'])
        ->get();
        $count = $maintenanceRequests->count();
        $data = ['mRequest' => $maintenanceRequests, 'count' => $count,];
        return view('Landlords.Request.completed', $data);
    }
    public function progress(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $tenant = $mRequest->rentedProperty->rentProperty->landlord_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $mRequest->status = "In Progress";
        $rent = RentedProperty::where('id',  $mRequest->rented_id)->first();
        $rent->tenant->notify(new MaintenanceNotification([
            'maintenanceMessage' => 'Your request for '. $rent->rentProperty->building->name . ' is in progress.' ,
        ]));
        $mRequest->update();
        Alert::success('Maintenance Request have been updated to progress', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function completed(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $tenant = $mRequest->rentedProperty->rentProperty->landlord_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $mRequest->status = "Completed";
        $rent = RentedProperty::where('id',  $mRequest->rented_id)->first();
        $rent->tenant->notify(new MaintenanceNotification([
            'maintenanceMessage' => 'Your request for '. $rent->rentProperty->building->name . ' is Completed.' ,
        ]));
        $mRequest->update();
        Alert::success('Maintenance Request have been updated to Completed', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function cancel(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $tenant = $mRequest->rentedProperty->rentProperty->landlord_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $mRequest->status = "Cancelled";
        $rent = RentedProperty::where('id',  $mRequest->rented_id)->first();
        $rent->tenant->notify(new MaintenanceNotification([
            'maintenanceMessage' => 'Your request for '. $rent->rentProperty->building->name . ' is Cancelled.' ,
        ]));
        $mRequest->update();
        Alert::success('Maintenance Request have been cancelled', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function destroy(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $tenant = $mRequest->rentedProperty->rentProperty->landlord_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        if($mRequest->tenantVisible == "Yes")
        {
            $mRequest->landlordVisible = "No";
            $mRequest->update();
        }else{
            File::delete($mRequest->image);
            if($mRequest->video)
            {
                File::delete($mRequest->video);
            }
            $mRequest->delete();
        }
        Alert::success('Maintenance Request have been deleted', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function view(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $tenant = $mRequest->rentedProperty->rentProperty->landlord_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('landlord.maintenance.index');
        }
        $data = ['requests' => $mRequest,];
        return view('Landlords.Request.view', $data);
    }
}
