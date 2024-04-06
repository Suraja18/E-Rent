<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\RentProperty;
use Illuminate\Http\Request;

class HousingController extends Controller
{
    public function propertyDetail(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if(!$property){
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $type = $property->property_type_id;
        $properties = RentProperty::where('property_type_id', $type)->take(4)->get()->shuffle();
        
        $propertiesCount = $properties->count();
        if ($propertiesCount < 4) {
            
            $remainingProperties = RentProperty::whereNotIn('id', $properties->pluck('id')->toArray())
                                                ->whereNotIn('id', function ($query) {
                                                    $query->select('rent_id')->from('rented_properties');
                                                })
                                                ->take(4 - $propertiesCount)
                                                ->get();
            $remainingProperties = $remainingProperties->shuffle();
            $properties = $properties->concat($remainingProperties);
        }
        $data = ['property' => $property,'properties' => $properties, ];
        return view('Tenants.housing-details', $data);
    }

    public function showDetail(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if(!$property){
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $data = ['property' => $property, ];
        return view('Tenants.view-detail', $data);
    }
}
