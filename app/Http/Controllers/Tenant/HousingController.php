<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\RentedProperty;
use App\Models\RentPayment;
use App\Models\RentProperty;
use Carbon\Carbon;
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
        $properties = RentProperty::where('property_type_id', $type) ->where('status', 'Yes')
        ->whereNotIn('id', function ($query) {
            $query->select('rent_id')
                ->from('rented_properties')
                ->where('status', '<>', 'Cancelled')->where('status', '<>', 'Checked Out');
        })->take(4)->get()->shuffle();
        
        $propertiesCount = $properties->count();
        if ($propertiesCount < 4) {
            
            $remainingProperties = RentProperty::whereNotIn('id', $properties->pluck('id')->toArray())
                                                ->where('status', 'Yes')
                                                ->whereNotIn('id', function ($query) {
                                                    $query->select('rent_id')
                                                        ->from('rented_properties')
                                                        ->where('status', '<>', 'Cancelled')->where('status', '<>', 'Checked Out');
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
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->where('tenantVisible', 'Yes')->first();
        $data = ['property' => $property, 'rented_property' => $rented_property ];
        return view('Tenants.view-detail', $data);
    }

    public function makePayment(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if($property)
        {
            $building = $property->building->name ."/ ". $property->rent_name; 
        }
        if(!$property){
            $buildingName = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $buildingName->id)->firstOrFail();
            $building = $property->building->name;
        }
        $paymentType = "Deposit";
        $rented_property = RentedProperty::where('rent_id', $property->id)->where('tenant_id', Auth::id())->first();
        $payment = RentPayment::where('rented_id', $rented_property->id)
        ->where('payment_type', 'Deposit')
        ->whereHas('rentedProperty.rentProperty', function($query) {
            $query->where('type', '!=', 'Sell');
        })
        ->exists();
        if($payment)
        {
            $paymentType = "Sell";
            if($property->type == "Rent")
            {
                $paymentType = "Rent";
            }
        }
        $price = $property->monthly_house_rent - $rented_property->discount;
        if($property->type == "Sell")
        {
            $paymentType = "Sell";
        }
        if($paymentType == "Rent")
        {
            $price = $property->monthly_house_rent - $rented_property->discount;
        }elseif($paymentType == "Sell")
        {
            $price = $property->price - $rented_property->discount;
        }
        $chargeE = $property->electric_charge;
        $chargeW = $property->water_charge;
        $chargeG = $property->garbage_charge;
        

        $previousPayment = RentPayment::where('rented_id', $rented_property->id)->get();
        $paymentFirst = RentPayment::where('rented_id', $rented_property->id)->first();
        if($property->type == "Rent")
        {
            $rentPrice = $property->monthly_house_rent + $property->electric_charge + $property->water_charge + $property->garbage_charge - $rented_property->discount;
        }elseif($property->type == "Sell"){
            $rentPrice = $property->price - $rented_property->discount;
        }
        $totalPaid = 0 - $rentPrice;
        foreach($previousPayment as $paid){
            $totalPaid = $totalPaid + $paid->amt_paid;
        }
        if($paymentFirst)
        {
            $createdAt = Carbon::parse($paymentFirst->created_at);
            $today = Carbon::today(); 
            $diffInMonths = $createdAt->diffInMonths($today);
        }
        $rentToPay = 0;
        $remainToPay = 0;
        if(isset($diffInMonths)){
            for($i = 0; $i < $diffInMonths; $i++)
            {
                $rentToPay = $rentToPay + $rentPrice;
            }
            $remainToPay = $rentToPay - $totalPaid ;
        }
        $allTotal = $price + $chargeE + $chargeW + $chargeG + $remainToPay;
        $data = [
            'buildingName' => $building,
            'paymentType' => $paymentType,
            'due' => $remainToPay,
            'price' => $price,
            'chargeE' => $chargeE,
            'chargeW' => $chargeW,
            'chargeG' => $chargeG,
            'allTotal' => $allTotal,
            'rented_property' => $rented_property,
        ];
        return view('Tenants.make-payment',$data);
    }
}
