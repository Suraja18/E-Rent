<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\RentPayment;
use App\Models\RentProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = RentPayment::with(['rentedProperty.rentProperty.landlord'])
        ->whereHas('rentedProperty.rentProperty.landlord', function ($query) {
            $query->where('id', Auth::id());
        })
        ->where('visible','Yes')
        ->get();
        $data = ['payments' => $payments];

        return view('Landlords.Payment.index', $data);
    }

    public function create()
    {
        $tenants = User::whereHas('rentedProperties', function ($query) {
            $query->whereHas('rentProperty.landlord', function ($subQuery) {
                $subQuery->where('id', Auth::id());
            });
        })
        ->with(['rentedProperties' => function ($query) {
            $query->whereHas('rentProperty.landlord', function ($subQuery) {
                $subQuery->where('id', Auth::id());
            })->with('tenant');
        }])
        ->get();
        return view('Landlords.Payment.add', compact('tenants'));
    }

    public function store(Request $request)
    {
        //
    }

    public function getBuildings(Request $request)
    {
        $tenantId = $request->input('tenant_id');

        $buildings = Building::whereHas('rentProperties.rentedProperty', function ($query) use ($tenantId) {
            $query->where('tenant_id', $tenantId)
                ->whereHas('rentProperty.landlord', function ($subQuery) {
                    $subQuery->where('id', Auth::id());
                });
        })->get();

        return response()->json($buildings);
    }

    public function getRentedProperties(Request $request)
    {
        $buildingId = $request->input('building_id');

        $rentedProperty = RentProperty::where('building_id', $buildingId)
            ->whereHas('rentedProperty', function ($query) {
                $query->where('status', 'Approved'); 
            })
            ->first();
        if ($rentedProperty) {
            return response()->json([
                'monthly_house_rent' => $rentedProperty->monthly_house_rent,
                'sell_price' => $rentedProperty->price,
                'electric_charge' => $rentedProperty->electric_charge,
                'water_charge' => $rentedProperty->water_charge,
                'garbage_charge' => $rentedProperty->garbage_charge,
                'total' => $rentedProperty->monthly_house_rent + $rentedProperty->electric_charge + $rentedProperty->water_charge + $rentedProperty->garbage_charge
            ]);
        } else {
            return response()->json(['error' => 'No rented property found for the selected building']);
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
