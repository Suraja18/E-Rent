<?php

namespace App\Http\Controllers\Admin\UseCase;

use App\Http\Controllers\Controller;
use App\Models\CaseDescription;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DescController extends Controller
{
    public function index()
    {
        $data = ['cases' => CaseDescription::latest()->get(),];
        return view('Admin.Use-Case.CaseDescription.index', $data);
    }

    public function create()
    {
        return view('Admin.Use-Case.CaseDescription.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'use_case_id' => 'required|integer|exists:user_roles,id',
            'image_1'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'heading'          => 'required|string|max:50',
            'description'       => 'required|string|max:150',
        ]);
        if($validate)
        {
            $case = new CaseDescription();
            $case->case_id = $request->use_case_id;
            $image1 = $request->image_1;
            if($image1)
            {
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Role', $imageName);
                $case->icon = "Images/Variable/Role/" . $imageName;
            }
            $case->heading = $request->heading;
            $case->description = $request->description;
            $case->save();
            Alert::success('Use Case Added Successfully');
            return redirect()->route('case.index');
        }
    }

    public function edit(string $id)
    {
        $data = ['case' => CaseDescription::find($id)];
        return view('Admin.Use-Case.CaseDescription.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'use_case_id' => 'required|integer|exists:user_roles,id',
            'image_1'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'heading'          => 'required|string|max:50',
            'description'       => 'required|string|max:150',
        ]);
        if($validate)
        {
            $case = CaseDescription::find($id);
            $case->case_id = $request->use_case_id;
            $image1 = $request->image_1;
            if($image1)
            {
                File::delete($case->icon);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Role', $imageName);
                $case->icon = "Images/Variable/Role/" . $imageName;
            }
            $case->heading = $request->heading;
            $case->description = $request->description;
            $case->update();
            Alert::success('Use Case Updated Successfully');
            return redirect()->route('case.index');
        }
    }

    public function destroy(string $id)
    {
        $case = CaseDescription::find($id);
        File::delete($case->icon);
        $case->delete();
        Alert::success('Use Case Deleted Successfully');
        return redirect()->route('case.index');
    }
}
