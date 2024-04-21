<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PressRequest;
use App\Models\PressMedia;
use App\Services\PressServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class PressController extends Controller
{
    protected $press;
    public function __construct(PressServices $press)
    {
        $this->press = $press;
    }
    public function index()
    {
        $data = [ 'press' => PressMedia::latest()->get(), ];
        return view('Admin.Press-Media.index', $data);
    }

    public function create()
    {
        return view('Admin.Press-Media.add');
    }

    public function store(PressRequest $request)
    {
        $validatedData = $this->press->pressStore($request->file('image_1'), $request->validated());
        $press = PressMedia::create($validatedData);
        Alert::success('Press & Media successfully added.');
        return redirect()->route('press.index');
    }

    public function show(PressMedia $press)
    {
        $data = ['press' => $press, 'type' => 'readonly'];
        return view('Admin.Press-Media.view', $data);
    }

    public function edit(PressMedia $press)
    {
        return view('Admin.Press-Media.edit', compact('press'));
    }

    public function update(PressRequest $request, PressMedia $press)
    {
        $validatedData = $this->press->pressUpdate($request->file('image_1'), $request->validated(), $press);
        $press->update($validatedData);
        Alert::success('Press & Media updated successfully.');
        return redirect()->route('press.index');
    }

    public function destroy(PressMedia $press)
    {
        File::delete($press->image_1);
        $press->delete();
        Alert::success('Press  & Media deleted successfully.');
        return redirect()->route('press.index');
    }
}
