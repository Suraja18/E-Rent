<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;
use App\Models\RentedProperty;
use App\Notifications\MaintenanceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MaintenanceController extends Controller
{
    public function create()
    {
        $tenants = RentedProperty::where('tenant_id', Auth::id())->where('status', 'Confirmed')->whereNull('deleted_at')->get();
        $data = ['properties' => $tenants,];
        return view('Tenants.Maintainance.add', $data);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|min:5|max:250',
            'description' => 'required|string|min:10|max:50000',
            'rented_id' => 'required|exists:rented_properties,id',
            'date' => 'required|date|after_or_equal:today',
            'time1' => 'required|date_format:H:i',
            'time2' => 'required|date_format:H:i',
            'MaintainanceRequestImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'MaintainanceRequestVideo' => 'nullable|file|mimes:mp4,avi,mov,qt|max:10240',
            'piority' => 'required|in:Low,Normal,High,Critical',
        ]);
        if($validate)
        {
            $mRequest = new MaintenanceRequest;
            $mRequest->title = $request->title;
            $mRequest->description = $request->description;
            $mRequest->rented_id = $request->rented_id;
            $mRequest->date = $request->date;
            $mRequest->time1 = $request->time1;
            $mRequest->time2 = $request->time2;
            $image1 = $request->MaintainanceRequestImage;
            if($image1)
            {
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Maintenance/Request', $imageName);
                $mRequest->image = "Images/Variable/Maintenance/Request/" . $imageName;
            }
            $video = $request->MaintainanceRequestVideo;
            if($video)
            {
                $videoName = Str::uuid()->toString() . '-' . time() . '.' . $video->getClientOriginalExtension();
                $video->move('Images/Variable/Maintenance/Request', $videoName);
                $mRequest->video = "Images/Variable/Maintenance/Request/" . $videoName;
            }
            $mRequest->piority = $request->piority;
            $mRequest->save();
            $rent = RentedProperty::where('id', $request->rented_id)->first();
            $rent->rentProperty->landlord->notify(new MaintenanceNotification([
                'maintenanceMessage' => 'New Maintenance Request from Building '. $rent->rentProperty->building->name . '.' ,
            ]));
            Alert::success('Your Maintenance Request have been submitted', 'Thank You!');
            return redirect()->route('tenant.maintenanceRequest');
        }
    }
    public function view(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('tenant.maintenanceRequest');
        }
        $tenant = $mRequest->rentedProperty->tenant_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('tenant.maintenanceRequest');
        }
        $data = ['requests' => $mRequest,];
        return view('Tenants.Maintainance.view', $data);
    }
    public function cancel(string $id) 
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('tenant.maintenanceRequest');
        }
        $tenant = $mRequest->rentedProperty->tenant_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('tenant.maintenanceRequest');
        }
        $mRequest->status = "Cancelled";
        $mRequest->update();
        Alert::success('Your Maintenance Request have been canceled', 'Thank You!');
        return redirect()->route('tenant.maintenanceRequest');
    }
    public function destroy(string $id)
    {
        $mRequest = MaintenanceRequest::find($id);
        if(!$mRequest)
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('tenant.maintenanceRequest');
        }
        $tenant = $mRequest->rentedProperty->tenant_id;
        if($tenant != Auth::id())
        {
            Alert::warning('Maintenance Request not Found');
            return redirect()->route('tenant.maintenanceRequest');
        }
        if($mRequest->landlordVisible == "Yes")
        {
            $mRequest->tenantVisible = "No";
            $mRequest->update();
        }else{
            File::delete($mRequest->image);
            if($mRequest->video)
            {
                File::delete($mRequest->video);
            }
            $mRequest->delete();
        }
        Alert::success('Maintenance Request Deleted Successfully', 'Thank You!');
        return redirect()->route('tenant.maintenanceRequest');
    }
    public function search(Request $request)
    {
        $tenantId = Auth::id();
        $maintenanceRequests = MaintenanceRequest::select('maintenance_requests.*')
                            ->join('rented_properties', 'maintenance_requests.rented_id', '=', 'rented_properties.id')
                            ->where('rented_properties.tenant_id', $tenantId)
                            ->where('maintenance_requests.tenantVisible', 'Yes')
                            ->where('maintenance_requests.status', $request->status)
                            ->get();
        $count = $maintenanceRequests->count();
        $data = ['mRequest' => $maintenanceRequests, 'count' => $count, ];
        return view('Tenants.maintenance-request', $data);
    }
    
}
