<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserManual;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManualController extends Controller
{
    public function index()
    {
        $manuals = UserManual::latest()->get();
        $data = ['manuals' => $manuals,];
        return view('Admin.User-Manual.index', $data);
    }

    public function create()
    {
        return view('Admin.User-Manual.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'role_id' => 'nullable|exists:user_roles,id',
            'title'         => 'required|string|max:250',
            'description'   => 'required|string|max:50000',
            'video_embed_links'=> 'required|url|max:2048',
        ]);
        if($validate)
        {
            $manual = new UserManual();
            $manual->role_id = $request->role_id;
            $manual->title = $request->title;
            $manual->description = $request->description;
            $manual->link = $request->video_embed_links;
            $manual->save();
            Alert::success('User Manual Has been Successfully Added');
            return redirect()->route('manual.index');
        }
    }

    public function show(string $id)
    {
        $manual = UserManual::findOrFail($id);
        $data = ['manual' => $manual, 'type' => 'readonly',];
        return view('Admin.User-Manual.show', $data);
    }

    public function edit(string $id)
    {
        $manual = UserManual::findOrFail($id);
        $data = ['manual' => $manual,];
        return view('Admin.User-Manual.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'role_id' => 'nullable|exists:user_roles,id',
            'title'         => 'required|string|max:250',
            'description'   => 'required|string|max:50000',
            'video_embed_links'=> 'required|url|max:2048',
        ]);
        if($validate)
        {
            $manual = UserManual::findOrFail($id);
            $manual->role_id = $request->role_id;
            $manual->title = $request->title;
            $manual->description = $request->description;
            $manual->link = $request->video_embed_links;
            $manual->save();
            Alert::success('User Manual Has been Successfully Updated');
            return redirect()->route('manual.index');
        }
    }

    public function destroy(string $id)
    {
        $manual = UserManual::findOrFail($id);
        $manual->delete();
        Alert::success('User Manual Has been Successfully Deleted');
        return redirect()->route('manual.index');
    }
}
