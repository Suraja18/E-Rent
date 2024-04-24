<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UnitController extends Controller
{
    public function index()
    {
        $data = [ 'units' => Unit::latest()->get(),];
        return view('Landlords.Property.unit', $data);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'building_unit'   =>  'required | string | min:3 | max:255 | unique:units',
            'rooms' => 'required|integer|min:0|max:200',
            'description' => 'required|string| min:3 | max:150',
        ]);
        if($validate)
        {
            $unit = new Unit;
            $unit->building_unit=$request->building_unit;
            $image1 = $request->image_1;
            if($image1)
            {
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Building/Unit', $imageName);
                $image_1 = "Images/Variable/Building/Unit/" . $imageName;
                $unit->image_1=$image_1;
            }
            
            $unit->rooms=$request->rooms;
            $unit->description=$request->description;
            $unit->slug=$request->building_unit;
            $unit->save();
            Alert::success('Building Unit has been added!!');
            return redirect()->route('unit.index');
        }
    }

    public function edit(Unit $unit)
    {
        $data = ['unit' => $unit, 'units' => Unit::latest()->get(), 'type2' => 'edit'];
        return view('Landlords.Property.unit', $data);
    }

    public function update(Request $request, Unit $unit)
    {
        $validate = $request->validate([
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'building_unit'   =>  'required | string | min:3 | max:255',
            'rooms' => 'required|integer|min:0',
            'description' => 'required|string| min:3 | max:150',
        ]);
        if($validate)
        {
            $unit->building_unit=$request->building_unit;
            $image1 = $request->image_1;
            if($image1)
            {
                File::delete($unit->image_1);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Building/Unit', $imageName);
                $image_1 = "Images/Variable/Building/Unit/" . $imageName;
                $unit->image_1=$image_1;
            }
            
            $unit->rooms=$request->rooms;
            $unit->description=$request->description;
            $unit->slug=$request->building_unit;
            $unit->update();
            Alert::success('Building Unit has been Updated!!');
            return redirect()->route('unit.index');
        }
    }

    public function destroy(Unit $unit)
    {
        File::delete($unit->image_1);
        $unit->delete();
        Alert::success('Building Unit Deleted Successfully');
        return redirect()->route('unit.index');
    }
}
