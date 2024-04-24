<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\userRoles;
use App\Services\RolesServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    protected $role;

    public function __construct(RolesServices $role)
    {
        $this->role = $role;
    }
    public function index()
    {
        $data = ['roles' => userRoles::latest()->get(),];
        return view('Admin.Roles.Index.index', $data);
    }

    public function create()
    {
        return view('Admin.Roles.Index.add');
    }

    public function store(RolesRequest $request)
    {
        $validatedData = $this->role->roleStore($request->file('image_1'), $request->file('image_2'), $request->validated());
        userRoles::create($validatedData);
        Alert::success('User Roles Added Successfully');
        return redirect()->route('roles.index');
    }

    public function show(userRoles $role)
    {
        $data = ['role' => $role, 'type' => 'readonly',];
        return view('Admin.Roles.Index.show', $data);
    }

    public function edit(userRoles $role)
    {
        $data = ['role' => $role,];
        return view('Admin.Roles.Index.edit', $data);
    }

    public function update(RolesRequest $request, userRoles $role)
    {
        $validatedData = $request->validated();
        unset($validatedData['user_roles']);
        if (in_array($role->id, [1, 2, 3])) {
            if ($role->user_roles != $request->input('user_roles')) {
                Alert::error('The user role for ' . $role->user_roles . ' cannot be changed', 'These User Roles are permanent');
                return redirect()->route('roles.index');
            }
        }
        $validatedData = $this->role->roleUpdate($request->file('image_1'), $request->file('image_2'), $request->validated(), $role);
        $role->update($validatedData);
        Alert::success('User Roles Updated Successfully');
        return redirect()->route('roles.index');
    }

    public function destroy(userRoles $role)
    {
        if (in_array($role->id, [1, 2, 3])) {
            Alert::error('Error', 'This role is permanent and cannot be deleted.');
            return redirect()->route('roles.index');
        }
        $role->delete();
        Alert::success('User role has been successfully deleted.');
        return redirect()->route('roles.index');
    }

}
