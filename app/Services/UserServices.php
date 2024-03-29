<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserServices{
    public function userStore($request){
        $validatedData = $request;
        return $validatedData;
    }
    public static function userUpdate($image, $request, $users){
        $validatedData = $request;
        if ($image) {
            File::delete('Images/Variable/Users'. $users->image);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Images/Variable/Users', $imageName);
            $validatedData['image'] = 'Images/Variable/Users/' . $imageName;
        }
        return $validatedData;
    }
}