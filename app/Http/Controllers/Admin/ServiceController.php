<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        $data = ['services' => $services,];
        return view('Admin.Service.index', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'heading'             => 'required|string|max:30',
            'description'         => 'required|string|max:200',
            'image'               => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        if($validate)
        {
            $service = new Service();
            $service->heading = $request->heading;
            $service->description = $request->description;
            $image1 = $request->image;
            if ($image1) {
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Service', $imageName);
                $service->image = "Images/Variable/Service/" . $imageName;
            }
            $service->save();
            Alert::success('Service Inserted successfully');
            return redirect()->route('service.index');
        }
    }

    public function edit(Service $service)
    {
        $services = Service::latest()->get();
        $data = ['services' => $services, 'service' => $service];
        return view('Admin.Service.index', $data);
    }

    public function update(Request $request, Service $service)
    {
        $validate = $request->validate([
            'heading'             => 'required|string|max:30',
            'description'         => 'required|string|max:200',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        if($validate)
        {
            $service->heading = $request->heading;
            $service->description = $request->description;
            $image1 = $request->image;
            if ($image1) {
                File::delete($service->image);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Service', $imageName);
                $service->image = "Images/Variable/Service/" . $imageName;
            }
            $service->update();
            Alert::success('Service Updated successfully');
            return redirect()->route('service.index');
        }
    }

    public function destroy(Service $service)
    {
        File::delete($service->image);
        $service->delete();
        Alert::success('Service Deleted successfully');
        return redirect()->route('service.index');
    }
}
