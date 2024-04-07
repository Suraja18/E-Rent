<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\RentedProperty;
use App\Models\RentProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->whereNull('deleted_at')->where('tenantVisible', 'Yes')->first();
        $data = ['property' => $property, 'rented_property' => $rented_property ];
        return view('Tenants.view-detail', $data);
    }
}
