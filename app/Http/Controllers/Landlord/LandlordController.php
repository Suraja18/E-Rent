<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function profile()
    {
        $data = ['user' => User::findOrFail(Auth::id()),];
        return view('Landlords.edit-profile', $data);
    }
}
