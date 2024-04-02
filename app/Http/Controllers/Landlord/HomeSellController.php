<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\HomeSell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeSellController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $buildings = Building::whereDoesntHave('homeSell', function ($query) use ($user) {
            $query->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->latest()->get();        
        $homeSells = $user->homeSells();
        $data = [ 'buildings' => $buildings, 'homeSells' => $homeSells];
        return view('Landlords.Property-Occupants.Sell.index', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'building_id' => 'required|exists:buildings,id|unique:home_sells,building_id',
            'price' => 'required|numeric|min:0',
            'status' => 'nullable|in:on'
        ]);
        if($validate)
        {
            $homeSell = new HomeSell;
            $request->merge(['status' => $request->status == 'on' ? 'Yes' : 'No']);
            $homeSell->building_id=$request->building_id;
            $homeSell->landlord_id=Auth::id();
            $homeSell->price=$request->price;
            $homeSell->status=$request->status;
            $homeSell->save();
            Alert::success('Home has been added to sold!');
            return redirect()->route('house-sell.index');
        }
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::id());
        $buildings = Building::whereDoesntHave('homeSell', function ($query) use ($user) {
            $query->where('landlord_id', $user->id);
        })->where('landlord', $user->id)->latest()->get();        
        $homeSells = $user->homeSells();
        $homeSell = HomeSell::findOrFail($request->id);
        $data = [
            'buildings'=>$buildings, 
            'homeSells'=>$homeSells,
            'homeSell'=>$homeSell,
            'type' => 'edit',
        ];
        return view('Landlords.Property-Occupants.Sell.index', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'price' => 'required|numeric|min:0',
            'status' => 'nullable|in:on'
        ]);
        if($validate)
        {
            $homeSell = HomeSell::findOrFail($id);
            $request->merge(['status' => $request->status == 'on' ? 'Yes' : 'No']);
            $homeSell->building_id=$request->building_id;
            $homeSell->landlord_id=Auth::id();
            $homeSell->price=$request->price;
            $homeSell->status=$request->status;
            $homeSell->update();
            Alert::success('Home has been update to sold!');
            return redirect()->route('house-sell.index');
        }
    }
    public function destroy(Request $request)
    {
        $homeSell = HomeSell::findOrFail($request->id);
        $homeSell->delete();
        Alert::error('Building Sold has been Removed Successfully');
        return redirect()->route('house-sell.index');
    }
}
