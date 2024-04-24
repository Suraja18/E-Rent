<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RolesDescription;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesDescController extends Controller
{
    public function index()
    {
        $data = ['roles' => RolesDescription::latest()->get(),];
        return view('Admin.Roles.Roles.index', $data);
    }
    public function create()
    {
        return view('Admin.Roles.Roles.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_roles_id' => 'required|integer|exists:user_roles,id',
            'title'             => 'required|string|max:50',
            'description'       => 'required|string|max:400',
        ]);
        if($validate)
        {
            $role = new RolesDescription();
            $role->role_id = $request->user_roles_id;
            $role->title = $request->title;
            $role->description = $request->description;
            $role->save();
            Alert::success('Roles Description Added Successfully');
            return redirect()->route('roles-desc.index');
        }
    }

    public function show(string $role)
    {
        $role = RolesDescription::find($role);
        $data = ['role' => $role, 'type' => 'readonly',];
        return view('Admin.Roles.Roles.show', $data);
    }

    public function edit(string $role)
    {
        $role = RolesDescription::find($role);
        $data = ['role' => $role,];
        return view('Admin.Roles.Roles.edit', $data);
    }

    public function update(Request $request, string $role)
    {
        $role = RolesDescription::find($role);
        $validate = $request->validate([
            'user_roles_id' => 'required|integer|exists:user_roles,id',
            'title'             => 'required|string|max:50',
            'description'       => 'required|string|max:400',
        ]);
        if($validate)
        {
            $role->role_id = $request->user_roles_id;
            $role->title = $request->title;
            $role->description = $request->description;
            $role->update();
            Alert::success('Roles Description Updated Successfully');
            return redirect()->route('roles-desc.index');
        }
    }

    public function destroy(string $role)
    {
        $role = RolesDescription::find($role);
        $role->delete();
        Alert::success('Roles Description Deleted Successfully');
        return redirect()->route('roles-desc.index');
    }
}
