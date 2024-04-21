<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PressServices{
    public function pressStore($image1, $request){
        $validatedData = $request;
        if($image1)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Press', $imageName);
            $validatedData['image_1'] = "Images/Variable/Press/" . $imageName;
        }
        return $validatedData;
    }
    public static function pressUpdate($image1, $request, $press){
        $validatedData = $request;
        if ($image1) {
            File::delete($press->image_1);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Press', $imageName);
            $validatedData['image_1'] = 'Images/Variable/Press/' . $imageName;
        }
        return $validatedData;
    }
}