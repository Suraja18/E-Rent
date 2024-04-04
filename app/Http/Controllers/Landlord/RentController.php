<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentRequest;
use App\Models\Building;
use App\Models\FloorRemain;
use App\Models\RentProperty;
use App\Models\Unit;
use App\Models\User;
use App\Services\RentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class RentController extends Controller
{
    protected $rent;

    public function __construct(RentServices $rent) 
    {
        $this->rent = $rent;
    }
    public function index()
    {
        $user = User::find(Auth::id());
        $data = [ 'rents' => $user->rentProperties()->where('type', 'Rent')->latest()->get(), ];
        return view('Landlords.Property-Occupants.Rent.index', $data);
    }

    public function create()
    {
        $user = User::find(Auth::id());
        $buildings = Building::whereDoesntHave('rentProperties', function ($query) use ($user) {
            $query->whereIn('type', ['Sell'])
                  ->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->latest()->get();
        $units =  Unit::latest()->get();   
        $data = ['buildings' => $buildings, 'units'=>$units];
        return view('Landlords.Property-Occupants.Rent.add', $data);
    }

    public function store(RentRequest $request)
    {
        $building = Building::findOrFail($request->building_id);
        $unit = Unit::findOrFail($request->property_type_id);

        $existingRentProperty = RentProperty::where('building_id', $request->building_id)
                                        ->whereHas('unit', function ($query) {
                                            $query->whereNull('rooms');
                                        })
                                        ->exists();
        if ($existingRentProperty) {
            Alert::error('Your Whole Building is already rented.');
            return redirect()->route('rent.create');
        }
        if($unit->rooms === null){
            $existingRentProperty = RentProperty::where('building_id', $request->building_id)->exists();
            if ($existingRentProperty){
                Alert::error('Your Building Room is already rented! Please Remove them first to rent for'. $unit->building_unit);
                return redirect()->route('rent.create');
            }
        }

        $remainingRooms = $building->room_per_floor - $unit->rooms;
        $existingRecord = FloorRemain::where('building_id', $request->building_id)
        ->where('floor', $request->floor)
        ->first();

        if ($existingRecord) {
            if($unit->rooms == 0)
            {
                $remainingRooms = $existingRecord->remaining_room - $building->room_per_floor;
                if($unit->rooms == null){
                    $remainingRooms = 0;
                }
                if ($remainingRooms >= 0) {
                    $existingRecord->update(['remaining_room' => $remainingRooms]);
                } else {
                    Alert::error('Your Rent Room for this floor is already exceed! Please Try Again');
                    return redirect()->route('rent.create');
                }
            }else{
                $remainingRooms = $existingRecord->remaining_room - $unit->rooms;
                if ($remainingRooms >= 0) {
                    $existingRecord->update(['remaining_room' => $remainingRooms]);
                } else {
                    Alert::error('Your Rent Room for this floor is already exceed! Please Try Again');
                    return redirect()->route('rent.create');
                }
            }
        } else {
            if($unit->rooms == 0){
                $remainingRooms = 0;
                if ($remainingRooms >= 0){
                    FloorRemain::create([
                        'building_id' => $request->building_id,
                        'floor' => $request->floor,
                        'remaining_room' => $remainingRooms,
                    ]);
                } else{
                    Alert::error('Your Rent Room for this floor is already exceed! Please Try Again');
                    return redirect()->route('rent.create');
                }
            }else{
                $remainingRooms = $building->room_per_floor - $unit->rooms;
                if ($remainingRooms >= 0){
                    FloorRemain::create([
                        'building_id' => $request->building_id,
                        'floor' => $request->floor,
                        'remaining_room' => $remainingRooms,
                    ]);
                } else{
                    Alert::error('Your Rent Room for this floor is already exceed! Please Try Again');
                    return redirect()->route('rent.create');
                }
            }
            
            
        }
        $request->merge(['status' => $request->status == 'on' ? 'Yes' : 'No']);
        
        $validatedData = $this->rent->rentStore($request->file('image_1'),$request->file('image_2'),$request->file('image_3'),$request->file('image_4'),  $request->validated());
        $validatedData['status'] = $request->status;
        RentProperty::create($validatedData);
        Alert::success('Property has been Rented Successfully');
        return redirect()->route('rent.index');
    }

    public function show(RentProperty $rent)
    {
        $user = User::find(Auth::id());
        $buildings = Building::whereDoesntHave('rentProperties', function ($query) use ($user) {
            $query->whereIn('type', ['Sell'])
                  ->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->latest()->get();
        $units =  Unit::latest()->get();   
        $data = ['buildings' => $buildings, 'units'=>$units, 'rent' => $rent, 'type' => 'readonly'];
        return view('Landlords.Property-Occupants.Rent.view', $data);
    }

    public function edit(RentProperty $rent)
    {
        $user = User::find(Auth::id());
        $buildings = Building::whereDoesntHave('rentProperties', function ($query) use ($user) {
            $query->whereIn('type', ['Sell'])
                  ->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->latest()->get();
        $units =  Unit::latest()->get();   
        $data = ['buildings' => $buildings, 'units'=>$units, 'rent' => $rent];
        return view('Landlords.Property-Occupants.Rent.edit', $data);
    }

    public function update(RentRequest $request, RentProperty $rent)
    {
        $building = Building::findOrFail($request->building_id);
        $unit = Unit::findOrFail($request->property_type_id);

        if($building->id != $request->building_id)
        {
            $existingRentProperty = RentProperty::where('building_id', $request->building_id)
                                        ->whereHas('unit', function ($query) {
                                            $query->whereNull('rooms');
                                        })
                                        ->exists();
            if ($existingRentProperty) {
                Alert::error('Your Whole Building is already rented');
                return redirect()->route('rent.edit', $rent);
            }
        }

        if($unit->rooms === null){ 
            $existingRentProperty = RentProperty::where('building_id', $request->building_id)->exists();
            if ($existingRentProperty){
                Alert::error('Your Building Room is already rented! Please Remove them first to rent for'. $unit->building_unit);
                return redirect()->route('rent.edit', $rent);
            }
        }

        $unit2 = Unit::findOrFail($rent->property_type_id);
        $remainingRooms = $building->room_per_floor - $unit->rooms;
        $existingRecord = FloorRemain::where('building_id', $request->building_id)
        ->where('floor', $request->floor)
        ->first();

        if ($existingRecord) {
            if($unit->rooms == 0){
                $remainingRooms = ($existingRecord->remaining_room + $unit2->rooms) - $building->room_per_floor;
                
                if($unit->rooms == null){
                    $remainingRooms = 0;
                }

                if ($remainingRooms >= 0) {
                    $existingRecord->update(['remaining_room' => $remainingRooms]);
                } else {
                    Alert::error('Your Rent Room for this floor is already exceed! Please Try Again');
                    return redirect()->route('rent.edit', $rent);
                }
            }else{
                if($unit2->rooms == 0)
                {
                    $unit2->rooms = $building->room_per_floor;
                }
                $remainingRooms = ($existingRecord->remaining_room + $unit2->rooms) - $unit->rooms;
                

                if ($remainingRooms >= 0) {
                    $existingRecord->update(['remaining_room' => $remainingRooms]);
                } else {
                    Alert::error('Your Rent Room for this floor is already exceed! Please Try Again');
                    return redirect()->route('rent.edit', $rent);
                }
            }
            
        }
        $request->merge(['status' => $request->status == 'on' ? 'Yes' : 'No']);
        
        $validatedData = $this->rent->rentUpdate($request->file('image_1'),$request->file('image_2'),$request->file('image_3'),$request->file('image_4'),  $request->validated(), $rent);
        $validatedData['status'] = $request->status;
        $rent->update($validatedData);
        Alert::success('Property has been Rented Successfully');
        return redirect()->route('rent.index');
    }

    public function destroy(RentProperty $rent)
    {
        $unit = Unit::findOrFail($rent->property_type_id);
        $existingRecord = FloorRemain::where('building_id', $rent->building_id)
        ->where('floor', $rent->floor)
        ->first();

        if ($existingRecord) {
            $remainingRooms = ($existingRecord->remaining_room + $unit->rooms);
            if ($remainingRooms >= 0) {
                $existingRecord->update(['remaining_room' => $remainingRooms]);
            }
        }
        File::delete($rent->image_1);
        if(isset($rent->image_2)){
            File::delete($rent->image_2);
        }
        if(isset($rent->image_3)){
            File::delete($rent->image_3);
        }
        if(isset($rent->image_4)){
            File::delete($rent->image_4);
        }
        $rent->delete();
        Alert::error('Rent has been deleted Successfully');
        return redirect()->route('rent.index');
    }
}
