<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HelpCentre;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HelpCentreController extends Controller
{
    public function index()
    {
        $data = ['frequentlies' => HelpCentre::latest()->get(),];
        return view('Admin.Help-Center.index', $data);
    }

    public function create()
    {
        return view('Admin.Help-Center.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_roles_id' => 'required|integer|exists:user_roles,id',
            'question'          => 'required|string|max:255',
            'description'       => 'required|string|max:50000',
        ]);
        if($validate)
        {
            $frequently = new HelpCentre();
            $frequently->role_id = $request->user_roles_id;
            $frequently->question = $request->question;
            $frequently->answer = $request->description;
            $frequently->slug = $request->question;
            $frequently->save();
            Alert::success('Help Centre Added Successfully');
            return redirect()->route('help-centre.index');
        }
    }

    public function show(string $id)
    {
        $data = ['frequently' => HelpCentre::find($id), 'type' => 'readonly',];
        return view('Admin.Help-Center.view', $data);
    }

    public function edit(string $id)
    {
        $data = ['frequently' => HelpCentre::find($id)];
        return view('Admin.Help-Center.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'user_roles_id' => 'required|integer|exists:user_roles,id',
            'question'          => 'required|string|max:255',
            'description'       => 'required|string|max:50000',
        ]);
        if($validate)
        {
            $frequently = HelpCentre::find($id);
            $frequently->role_id = $request->user_roles_id;
            $frequently->question = $request->question;
            $frequently->answer = $request->description;
            $frequently->slug = $request->question;
            $frequently->update();
            Alert::success('Help Centre Updated Successfully');
            return redirect()->route('help-centre.index');
        }
    }

    public function destroy(string $id)
    {
        $frequently = HelpCentre::find($id);
        $frequently->delete();
        Alert::success('Help Centre Deleted Successfully');
        return redirect()->route('help-centre.index');
    }
}
