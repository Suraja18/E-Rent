<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuildingRequest;
use App\Models\Building;
use App\Models\User;
use App\Services\BuildingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{
    protected $building;

    public function __construct(BuildingServices $building)
    {
        $this->building = $building;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $data = [ 'buildings' => $user->getBuildings];
        return view('Landlords.Property.building', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Landlords.Property.add-building');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuildingRequest $request)
    {
        $validatedData = $this->building->buildingStore($request->file('image-1'),$request->file('image-2'),$request->file('image-3'),$request->file('image-4'),  $request->validated());
        Building::create($validatedData);
        // Alert::success('Blog Added Successfully');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
