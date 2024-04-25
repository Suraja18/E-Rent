<?php

namespace App\Http\Controllers\Admin\UseCase;

use App\Http\Controllers\Controller;
use App\Models\UseCases;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CaseController extends Controller
{
    public function index()
    {
        $data = ['cases' => UseCases::latest()->get(),];
        return view('Admin.Use-Case.UseCase.index', $data);
    }

    public function create()
    {
        return view('Admin.Use-Case.UseCase.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_roles_id' => 'required|integer|exists:user_roles,id',
            'heading'          => 'required|string|max:100',
            'description'       => 'required|string|max:250',
        ]);
        if($validate)
        {
            $case = new UseCases();
            $case->role_id = $request->user_roles_id;
            $case->heading = $request->heading;
            $case->description = $request->description;
            $case->save();
            Alert::success('Use Case Added Successfully');
            return redirect()->route('use-case.index');
        }
    }

    public function edit(string $id)
    {
        $data = ['case' => UseCases::find($id)];
        return view('Admin.Use-Case.UseCase.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'user_roles_id' => 'required|integer|exists:user_roles,id',
            'heading'          => 'required|string|max:100',
            'description'       => 'required|string|max:250',
        ]);
        if($validate)
        {
            $case = UseCases::find($id);
            $case->role_id = $request->user_roles_id;
            $case->heading = $request->heading;
            $case->description = $request->description;
            $case->update();
            Alert::success('Use Case Updated Successfully');
            return redirect()->route('use-case.index');
        }
    }

    public function destroy(string $id)
    {
        $case = UseCases::find($id);
        $case->delete();
        Alert::success('Use Case Deleted Successfully');
        return redirect()->route('use-case.index');
    }
}
