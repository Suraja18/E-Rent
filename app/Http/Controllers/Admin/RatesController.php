<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebRates;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class RatesController extends Controller
{
    public function index()
    {
        $data = ['rates' => WebRates::take(3)->get(), ];
        return view('Admin.WebRates.index', $data);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title_1'             => 'required|string|max:25',
            'description_1'       => 'required|string|max:150',
            'image_1'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title_2'             => 'required|string|max:25',
            'description_2'       => 'required|string|max:150',
            'image_2'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title_3'             => 'required|string|max:25',
            'description_3'       => 'required|string|max:150',
            'image_3'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate)
        {
            $rates = WebRates::take(3)->get();
            foreach ($rates as $index => $rate)
            {
                $titleKey = 'title_' . ($index + 1);
                $descriptionKey = 'description_' . ($index + 1);
                $imageKey = 'image_' . ($index + 1);
                $image1 = $request->$imageKey;
                if ($image1) {
                    File::delete($rate->images);
                    $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                    $image1->move('Images/Variable/About', $imageName);
                    $rate->images = "Images/Variable/About/" . $imageName;
                }
                $rate->title = $request->$titleKey;
                $rate->paragraph = $request->$descriptionKey;
                $rate->update();
            }
            Alert::success('Elements Updated Successfully');
            return redirect()->route('admin.rates.index');
        }
    }
}
