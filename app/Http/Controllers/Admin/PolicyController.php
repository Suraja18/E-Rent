<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\policy;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PolicyController extends Controller
{

    public function index()
    {
        $data = ['policies' => policy::latest()->get(),];
        return view('Admin.Policy.index', $data);
    }

    public function create()
    {
        return view('Admin.Policy.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255|unique:policies,title',
            'description' => 'required|string|min:100',
        ]);
        if($validate)
        {
            $policy = new policy();
            $policy->title = $request->title;
            $policy->description = $request->description;
            $policy->slug = $request->title;
            $policy->save();
            Alert::success('Policy Stored Successfully');
            return redirect()->route('policy.index');
        }
    }

    public function show(string $id)
    {
        $data = ['policy' => policy::find($id), 'type' => 'readonly',];
        return view('Admin.Policy.view',$data);
    }

    public function edit(string $id)
    {
        $data = ['policy' => policy::find($id),];
        return view('Admin.Policy.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $policy = policy::find($id);
        $validate = $request->validate([
            'title' => 'required|string|max:255|unique:policies,title,' . $policy->id,
            'description' => 'required|string|min:100',
        ]);
        if($validate)
        {  
            $policy->title = $request->title;
            $policy->description = $request->description;
            $policy->slug = $request->title;
            $policy->update();
            Alert::success('Policy Updated Successfully');
            return redirect()->route('policy.index');
        }
    }

    public function destroy(string $id)
    {
        if (in_array($id, [1, 2])) {
            Alert::error('This policy is permanent and cannot be deleted.');
            return redirect()->route('policy.index');
        }
        $policy = policy::find($id);
        $policy->delete();
        Alert::success('Policy Deleted Successfully');
        return redirect()->route('policy.index');
    }
}
