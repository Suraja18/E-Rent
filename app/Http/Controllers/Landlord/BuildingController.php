<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuildingRequest;
use App\Models\Building;
use App\Models\User;
use App\Services\BuildingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class BuildingController extends Controller
{
    protected $building;

    public function __construct(BuildingServices $building)
    {
        $this->building = $building;
    }

    public function index()
    {
        $user = User::find(Auth::id());
        $data = [ 'buildings' => $user->getBuildings()->latest()->get()];
        return view('Landlords.Property.building', $data);
    }

    public function create()
    {
        return view('Landlords.Property.add-building');
    }

    public function store(BuildingRequest $request)
    {
        $validatedData = $this->building->buildingStore($request->file('image_1'),$request->file('image_2'),$request->file('image_3'),$request->file('image_4'),  $request->validated());
        Building::create($validatedData);
        Alert::success('Building Added Successfully');
        return redirect()->route('building.index');
    }

    public function show(Building $building)
    {
        $data = ['building' => $building, 'type' => 'readonly',];
        return view('Landlords.Property.view-building', $data);
    }

    public function edit(Building $building)
    {
        $data = ['building' => $building,];
        return view('Landlords.Property.edit-building', $data);
    }

    public function update(BuildingRequest $request, Building $building)
    {
        $validatedData = $this->building->buildingUpdate($request->file('image_1'),$request->file('image_2'),$request->file('image_3'),$request->file('image_4'),  $request->validated(), $building);
        $building->update($validatedData);
        Alert::success('Building Updated Successfully');
        return redirect()->route('building.index');
    }

    public function destroy(Building $building)
    {
        File::delete($building->image_1);
        if(isset($building->image_2)){
            File::delete($building->image_2);
        }
        if(isset($building->image_3)){
            File::delete($building->image_3);
        }
        if(isset($building->image_4)){
            File::delete($building->image_4);
        }
        $building->delete();
        Alert::error('Building Deleted Successfully');
        return redirect()->route('building.index');
    }

}
