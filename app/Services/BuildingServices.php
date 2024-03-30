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
            $image1->move('Images/Variable/Users', $imageName);
            $validatedData['image-1'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        if($image2)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/Users', $imageName);
            $validatedData['image-2'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        if($image3)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move('Images/Variable/Users', $imageName);
            $validatedData['image-3'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        if($image4)
        {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move('Images/Variable/Users', $imageName);
            $validatedData['image-4'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        
        $validatedData['landlord'] = Auth::id();
        return $validatedData;
    }
    public static function buildingUpdate($image1, $image2, $image3, $image4, $request, $users){
        $validatedData = $request;
        if ($image1) {
            File::delete('Images/Variable/Users'. $users->image1);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Users', $imageName);
            $validatedData['image-1'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        if ($image2) {
            File::delete('Images/Variable/Users'. $users->image2);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move('Images/Variable/Users', $imageName);
            $validatedData['image-2'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        if ($image3) {
            File::delete('Images/Variable/Users'. $users->image3);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move('Images/Variable/Users', $imageName);
            $validatedData['image-3'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        if ($image4) {
            File::delete('Images/Variable/Users'. $users->image4);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move('Images/Variable/Users', $imageName);
            $validatedData['image-4'] = "asset('Images/Variable/Users/" . $imageName. "')";
        }
        return $validatedData;
    }
}