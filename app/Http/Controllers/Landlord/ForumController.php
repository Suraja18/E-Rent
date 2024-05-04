<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForumRequest;
use App\Models\Forums;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ForumController extends Controller
{
    public function index()
    {
        $data = [ 'forums' => Forums::latest()->get(),];
        return view('Landlords.Forums.index', $data);
    }

    public function create()
    {
        return view('Landlords.Forums.add');
    }

    public function store(ForumRequest $request)
    {
        $forum = new Forums();
        $forum->heading = $request->heading;
        $forum->description = $request->description;
        $forum->slug = $request->heading;
        $forum->save();
        Alert::success('Lease Aggrement has been added!!');
        return redirect()->route('forum.index');
    }

    public function show(Forums $forum)
    {
        $data = ['forum'=>$forum, 'type'=>'readonly', ];
        return view('Landlords.Forums.view', $data);
    }

    public function edit(Forums $forum)
    {
        return view('Landlords.Forums.edit', compact('forum'));
    }

    public function update(ForumRequest $request, Forums $forum)
    {
        $forum->heading = $request->heading;
        $forum->description = $request->description;
        $forum->slug = $request->heading;
        $forum->update();
        Alert::success('Lease Aggrement has been updated!!');
        return redirect()->route('forum.index');
    }

    public function destroy(Forums $forum)
    {
        if ($forum->rentProperties()->exists()) {
            Alert::error('Error', 'The forum is already occupied and cannot be deleted.');
            return redirect()->route('forum.index');
        }
        $forum->delete();
        Alert::success('Forum has been deleted successfully');
        return redirect()->route('forum.index');
    }
}
