<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function dashboard()
    {
        return view('Landlords.index');
    }
    public function getFloors(Request $request, string $id)
    {
        $building = Building::findOrFail($id);
        return response()->json(['numberOfFloors' => $building->no_of_floors]);
    }
}
