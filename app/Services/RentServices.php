<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class RentServices{
    public function rentStore($image1, $image2, $image3, $image4, $request){
        $validatedData = $request;
        if($image1)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_1'] = "Images/Variable/propertyRent/" . $imageName;
        }
        if($image2)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_2'] = "Images/Variable/propertyRent/" . $imageName;
        }
        if($image3)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_3'] = "Images/Variable/propertyRent/" . $imageName;
        }
        if($image4)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_4'] = "Images/Variable/propertyRent/" . $imageName;
        } 
        $validatedData['landlord_id'] = Auth::id();
        $validatedData['slug'] = $request['rent_name'];
        return $validatedData;
    }
    public static function rentUpdate($image1, $image2, $image3, $image4, $request, $rent){
        $validatedData = $request;
        if ($image1) {
            File::delete($rent->image1);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_1'] = "Images/Variable/propertyRent/" . $imageName;
        }
        if ($image2) {
            File::delete($rent->image2);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_2'] = "Images/Variable/propertyRent/" . $imageName;
        }
        if ($image3) {
            File::delete($rent->image3);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_3'] = "Images/Variable/propertyRent/" . $imageName;
        }
        if ($image4) {
            File::delete($rent->image4);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move('Images/Variable/propertyRent', $imageName);
            $validatedData['image_4'] = "Images/Variable/propertyRent/" . $imageName;
        }
        $validatedData['slug'] = $request['rent_name'];
        return $validatedData;
    }
}