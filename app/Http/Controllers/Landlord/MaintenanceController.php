<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;
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
        $mRequest = MaintenanceRequest::find($id)->first();
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
        $mRequest->update();
        Alert::success('Maintenance Request have been updated to progress', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function completed(string $id)
    {
        $mRequest = MaintenanceRequest::find($id)->first();
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
        $mRequest->update();
        Alert::success('Maintenance Request have been updated to Completed', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function cancel(string $id)
    {
        $mRequest = MaintenanceRequest::find($id)->first();
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
        $mRequest->update();
        Alert::success('Maintenance Request have been cancelled', 'Thank You!');
        return redirect()->route('landlord.maintenance.index');
    }
    public function destroy(string $id)
    {
        $mRequest = MaintenanceRequest::find($id)->first();
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
        $mRequest = MaintenanceRequest::find($id)->first();
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
