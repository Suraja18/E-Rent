<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.index');
    }
    public function banners()
    {
        $banner = Banner::first();
        return view('Admin.Banner.index', compact('banner'));
    }
    public function bannerStore(Request $request)
    {
        $validate = $request->validate([
            'user_heading' => 'required|string|min:3|max:100',
            'user_description' => 'required|string|min:3|max:250',
            'tenant_heading' => 'required|string|min:3|max:100',
            'tenant_description' => 'required|string|min:3|max:250',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validate)
        {
            $banner = Banner::first();
            $banner->user_head = $request->user_heading;
            $banner->user_desc = $request->user_description;
            $banner->tenant_head = $request->tenant_heading;
            $banner->tenant_desc = $request->tenant_description;
            $image1 = $request->image_1;
            $image2 = $request->image_2;
            $image3 = $request->image_3;
            $image4 = $request->image_4;
            if ($image1) {
                File::delete($banner->image1);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Banner', $imageName);
                $banner->image1 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image2) {
                File::delete($banner->image2);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
                $image2->move('Images/Variable/Banner', $imageName);
                $banner->image2 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image3) {
                File::delete($banner->image3);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
                $image3->move('Images/Variable/Banner', $imageName);
                $banner->image3 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image4) {
                File::delete($banner->image4);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
                $image4->move('Images/Variable/Banner', $imageName);
                $banner->image4 = "Images/Variable/Banner/" . $imageName;
            }
            $banner->update();
            Alert::success('Banner Successfully updated');
            return redirect()->route('admin.banners');
        }

    }
}
