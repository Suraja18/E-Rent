<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class RolesServices{
    public function roleStore($image1, $request){
        $validatedData = $request;
        $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move('Images/Variable/Role', $imageName);
        $validatedData['image'] = "Images/Variable/Role/" . $imageName;
        $validatedData['slug'] = $request['user_roles'];
        return $validatedData;
    }
    public static function roleUpdate($image1, $request, $role){
        $validatedData = $request;
        if ($image1) {
            File::delete($role->image_1);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Role', $imageName);
            $validatedData['image'] = 'Images/Variable/Role/' . $imageName;
        }
        $validatedData['slug'] = $request['user_roles'];
        return $validatedData;
    }
}