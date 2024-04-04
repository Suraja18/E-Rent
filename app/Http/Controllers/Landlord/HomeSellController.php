<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Forums;
use App\Models\RentProperty;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeSellController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $units =  Unit::where('rooms', 0)->orWhereNull('rooms')->whereNotIn('building_unit', ['Floor', 'Flat'])->latest()->get();   
        $buildings = Building::whereDoesntHave('rentProperties', function ($query) use ($user) {
            $query->whereIn('type', ['Sell', 'Rent'])
                  ->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->latest()->get();        
        $homeSells = $user->rentProperties()->where('type', 'Sell')->latest()->get();
        $forums = Forums::latest()->get();
        $data = [ 'buildings' => $buildings, 'rents' => $homeSells, 'units' => $units, 'forums' => $forums];        
        return view('Landlords.Property-Occupants.Sell.index', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'building_id' => 'required|exists:buildings,id|unique:rent_properties,building_id',
            'property_type_id' => [
                            'required',
                            'string',
                            function ($attribute, $value, $fail) {
                                $unit = Unit::where('id', $value)->first();
                                if (!$unit) {
                                    $fail('The selected property type is invalid.');
                                }
                            }
                        ],
            'forum_id' => 'required|exists:forums,id',
            'price' => 'required|numeric|min:0',
            'status' => 'nullable|in:on',
            'area' => 'required|numeric',
        ]);
        if($validate)
        {
            $homeSell = new RentProperty();
            $request->merge(['status' => $request->status == 'on' ? 'Yes' : 'No']);
            $homeSell->building_id=$request->building_id;
            $homeSell->forum_id=$request->forum_id;
            $homeSell->landlord_id=Auth::id();
            $homeSell->price=$request->price;
            $homeSell->property_type_id=$request->property_type_id;
            $homeSell->area=$request->area;
            $homeSell->type='Sell';
            $homeSell->status=$request->status;
            $homeSell->save();
            Alert::success('Home has been added to sold!');
            return redirect()->route('house-sell.index');
        }
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::id());
        $units =  Unit::where('rooms', 0)->orWhereNull('rooms')->whereNotIn('building_unit', ['Floor', 'Flat'])->latest()->get(); 
        $buildings = Building::whereDoesntHave('rentProperties', function ($query) use ($user) {
            $query->whereIn('type', ['Sell', 'Rent'])
                  ->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->get();       
        $homeSells = $user->rentProperties()->where('type', 'Sell')->latest()->get();
        $forums = Forums::latest()->get();
        $homeSell = RentProperty::findOrFail($request->id);
        $data = [
            'buildings'=>$buildings, 
            'rents'=>$homeSells,
            'rent'=>$homeSell,
            'units' => $units,
            'type' => 'edit',
            'forums' => $forums,
        ];
        return view('Landlords.Property-Occupants.Sell.index', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'property_type_id' => [
                            'required',
                            'string',
                            function ($attribute, $value, $fail) {
                                $unit = Unit::where('id', $value)->first();
                                if (!$unit) {
                                    $fail('The selected property type is invalid.');
                                }
                            }
                        ],
            'forum_id' => 'required|exists:forums,id',
            'price' => 'required|numeric|min:0',
            'status' => 'nullable|in:on',
            'area' => 'required|numeric',
        ]);
        if($validate)
        {
            $homeSell = RentProperty::findOrFail($id);
            $request->merge(['status' => $request->status == 'on' ? 'Yes' : 'No']);
            $homeSell->building_id=$request->building_id;
            $homeSell->forum_id=$request->forum_id;
            $homeSell->landlord_id=Auth::id();
            $homeSell->price=$request->price;
            $homeSell->property_type_id=$request->property_type_id;
            $homeSell->area=$request->area;
            $homeSell->type='Sell';
            $homeSell->status=$request->status;
            $homeSell->update();
            Alert::success('Home has been update to sold!');
            return redirect()->route('house-sell.index');
        }
    }
    public function destroy(Request $request)
    {
        $homeSell = RentProperty::findOrFail($request->id);
        $homeSell->delete();
        Alert::error('Building Sold has been Removed Successfully');
        return redirect()->route('house-sell.index');
    }
}
