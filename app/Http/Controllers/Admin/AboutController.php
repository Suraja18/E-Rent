<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\DescImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function intro()
    {
        $data = [
            'intro' => About::first(),
            'introImage' => DescImage::where('about_id', 1)->get(),
        ];
        return view('Admin.About.intro', $data);
    }
    public function aboutStore(Request $request)
    {
        $validate = $request->validate([
            'heading' => 'required|string|min:10|max:25',
            'description' => 'required|string|min:100|max:320',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if($validate)
        {
            $intro = About::first();
            $introImage = DescImage::where('about_id', 1)->get();
            $intro->heading = $request->heading;
            $intro->description = $request->description;
            $counter = 1;
            foreach($introImage as $imageField)
            {
                $imageFieldName = "image_$counter";
                $image1 = $request->$imageFieldName;
                if ($image1) {
                    File::delete($imageField->image);
                    $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                    $image1->move('Images/Variable/About/Intro', $imageName);
                    $imageField->image = "Images/Variable/About/Intro/" . $imageName;
                }
                
                $imageField->update();
                $counter++;
            }
            $intro->update();
            Alert::success('About Intro Successfully Updated!');
            return redirect()->route('admin.intro');
        }
    }
    public function infinity()
    {
        $data = [
            'intro' => About::find(2),
        ];
        return view('Admin.About.infinity', $data);
    }
    public function infinityStore(Request $request)
    {
        $validate = $request->validate([
            'heading' => 'required|string|min:10|max:50',
            'description' => 'required|string|min:100|max:450',
        ]);
        if($validate)
        {
            $intro = About::find(2);
            $intro->heading = $request->heading;
            $intro->description = $request->description;
            $intro->update();
            Alert::success('About Infinity Successfully Updated!');
            return redirect()->route('admin.infinity');
        }
    }
    public function images()
    {
        $introImage = DescImage::where('about_id', 2)->latest()->get();
        $data = ['images' => $introImage];
        return view('Admin.About.infinity-image', $data);
    }
    public function imagesStore(Request $request)
    {
        $introImage = new DescImage;
        $introImage->about_id = 2;
        $image1 = $request->image_1;
        if ($image1) {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/About/Infinity', $imageName);
            $introImage->image = "Images/Variable/About/Infinity/" . $imageName;
        }  
        $introImage->save();
        Alert::success('Images Inserted Successfully');
        return redirect()->route('admin.infinity.images'); 
    }
    public function imagesDestroy(string $id)
    {
        $introImage = DescImage::where('id', $id)->where('about_id', 2)->first();
        File::delete($introImage->image);
        $introImage->delete();
        Alert::success('Image Deleted Successfully');
        return redirect()->route('admin.infinity.images');
    }
    public function history()
    {
        $data = [
            'history' => About::find(3),
            'historyImage' => DescImage::where('about_id', 3)->first(),
        ];
        return view('Admin.About.history', $data);
    }
    public function aboutHistory(Request $request)
    {
        $validate = $request->validate([
            'heading' => 'required|string|min:10|max:25',
            'description' => 'required|string|min:100|max:500000',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validate)
        {
            $history = About::find(3);
            $historyImage = DescImage::where('about_id', 3)->first();
            $history->heading = $request->heading;
            $history->description = $request->description;
            $image1 = $request->image_1;
            if ($image1) {
                File::delete($historyImage->image);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/About/Intro', $imageName);
                $history->image = "Images/Variable/About/Intro/" . $imageName;
            } 
            $history->update();
            Alert::success('About History Successfully Updated!');
            return redirect()->route('admin.history');
        }
    }
}
