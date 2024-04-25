<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TenantController extends Controller
{
    public function index()
    {
        $data = ['frequentlies' => Questions::where('type', 'Tenant')->latest()->get(),];
        return view('Admin.Question.Tenant.index', $data);
    }

    public function create()
    {
        return view('Admin.Question.Tenant.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'question'          => 'required|string|max:255',
            'description'       => 'required|string|max:50000',
        ]);
        if($validate)
        {
            $frequently = new Questions();
            $frequently->question = $request->question;
            $frequently->answer = $request->description;
            $frequently->type = "Tenant";
            $frequently->save();
            Alert::success('FAQs Added Successfully');
            return redirect()->route('question.index');
        }
    }

    public function show(string $id)
    {
        $data = ['frequently' => Questions::find($id), 'type' => 'readonly',];
        return view('Admin.Question.Tenant.view', $data);
    }

    public function edit(string $id)
    {
        $data = ['frequently' => Questions::find($id)];
        return view('Admin.Question.Tenant.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'question'          => 'required|string|max:255',
            'description'       => 'required|string|max:50000',
        ]);
        if($validate)
        {
            $frequently = Questions::find($id);
            $frequently->question = $request->question;
            $frequently->answer = $request->description;
            $frequently->update();
            Alert::success('FAQs Updated Successfully');
            return redirect()->route('question.index');
        }
    }

    public function destroy(string $id)
    {
        $frequently = Questions::find($id);
        $frequently->delete();
        Alert::success('FAQs Deleted Successfully');
        return redirect()->route('question.index');
    }
}