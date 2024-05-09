<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class FrequentlyController extends Controller
{
    public function index()
    {
        $data = ['frequentlies' => Questions::where('type', 'Frequently')->latest()->get(),];
        return view('Admin.Question.Frequently.index', $data);
    }

    public function create()
    {
        return view('Admin.Question.Frequently.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'question'          => 'required|string|max:255',
            'description'       => 'required|string|max:50000',
        ]);
        if($validate)
        {
            DB::select('CALL InsertQuestion(?, ?, ?)', [$request->question,$request->description,'Frequently']);
            Alert::success('FAQs Added Successfully');
            return redirect()->route('frequently.index');
        }
    }

    public function show(string $id)
    {
        $data = ['frequently' => Questions::find($id), 'type' => 'readonly',];
        return view('Admin.Question.Frequently.view', $data);
    }

    public function edit(string $id)
    {
        $data = ['frequently' => Questions::find($id)];
        return view('Admin.Question.Frequently.edit', $data);
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
            return redirect()->route('frequently.index');
        }
    }

    public function destroy(string $id)
    {
        $frequently = Questions::find($id);
        $frequently->delete();
        Alert::success('FAQs Deleted Successfully');
        return redirect()->route('frequently.index');
    }
}
