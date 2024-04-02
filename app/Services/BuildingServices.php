<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuildingServices{
    public function buildingStore($image1, $image2, $image3, $image4, $request){
        $validatedData = $request;
        if($image1)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Building', $imageName);
            $validatedData['image_1'] = "Images/Variable/Building/" . $imageName;
        }
        if($image2)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/Building', $imageName);
            $validatedData['image_2'] = "Images/Variable/Building/" . $imageName;
        }
        if($image3)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move('Images/Variable/Building', $imageName);
            $validatedData['image_3'] = "Images/Variable/Building/" . $imageName;
        }
        if($image4)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move('Images/Variable/Building', $imageName);
            $validatedData['image_4'] = "Images/Variable/Building/" . $imageName;
        } 
        $validatedData['landlord'] = Auth::id();
        $validatedData['slug'] = $request['name'];
        return $validatedData;
    }
    public static function buildingUpdate($image1, $image2, $image3, $image4, $request, $building){
        $validatedData = $request;
        if ($image1) {
            File::delete($building->image1);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Building', $imageName);
            $validatedData['image_1'] = "Images/Variable/Building/" . $imageName;
        }
        if ($image2) {
            File::delete($building->image2);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/Building', $imageName);
            $validatedData['image_2'] = "Images/Variable/Building/" . $imageName;
        }
        if ($image3) {
            File::delete($building->image3);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move('Images/Variable/Building', $imageName);
            $validatedData['image_3'] = "Images/Variable/Building/" . $imageName;
        }
        if ($image4) {
            File::delete($building->image4);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move('Images/Variable/Building', $imageName);
            $validatedData['image_4'] = "Images/Variable/Building/" . $imageName;
        }
        $validatedData['slug'] = $request->name;
        return $validatedData;
    }
}