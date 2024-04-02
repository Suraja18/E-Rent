<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            'building_unit'   =>  'required | string | min:3 | max:255 | unique:units',
        ]);
        if($validate)
        {
            $unit = new Unit;
            $unit->building_unit=$request->building_unit;
            $unit->slug=$request->building_unit;
            $unit->save();
            Alert::success('Building Unit has been added!!');
            return redirect()->route('unit.index');
        }
    }
    public function destroy(Unit $unit)
    {
        $unit->delete();
        Alert::error('Building Unit Deleted Successfully');
        return redirect()->route('unit.index');
    }
}
