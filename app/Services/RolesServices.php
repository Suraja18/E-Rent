<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class RolesServices{
    public function roleStore($image1, $image2, $request){
        $validatedData = $request;
        $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move('Images/Variable/Role', $imageName);
        $validatedData['image'] = "Images/Variable/Role/" . $imageName;
        $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
        $image2->move('Images/Variable/Role', $imageName);
        $validatedData['sub_image'] = "Images/Variable/Role/" . $imageName;
        $validatedData['slug'] = $request['user_roles'];
        return $validatedData;
    }
    public static function roleUpdate($image1, $image2, $request, $role){
        $validatedData = $request;
        if ($image1) {
            File::delete($role->image);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Role', $imageName);
            $validatedData['image'] = 'Images/Variable/Role/' . $imageName;
        }
        if ($image2) {
            File::delete($role->sub_image);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/Role', $imageName);
            $validatedData['sub_image'] = 'Images/Variable/Role/' . $imageName;
        }
        $validatedData['slug'] = $request['user_roles'];
        return $validatedData;
    }
}