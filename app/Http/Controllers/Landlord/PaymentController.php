<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Building;
use App\Models\RentedProperty;
use App\Models\RentPayment;
use App\Models\RentProperty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(PaymentRequest $request)
    {
        $payment = new RentPayment();
        $tenant = $request->tenant_id;
        $rentedProperty = $request->building_id;
        $type = $request->payment_type;
        
        $rented = RentedProperty::where('tenant_id', $tenant)->where('rent_id', $rentedProperty)->first();
        $payments = RentPayment::where('rented_id', $rented->id)->where('payment_type', "Deposit")->first();
        $paymentrent = RentPayment::where('rented_id', $rented->id)->first();
        $paymentrents = RentPayment::where('rented_id', $rented->id)->get();
        if($rented->rentProperty->type == "Rent") 
        {
            $rentPrice = $rented->rentProperty->monthly_house_rent + $rented->rentProperty->electric_charge + $rented->rentProperty->water_charge + $rented->rentProperty->garbage_charge - $rented->discount;
        }elseif($rented->rentProperty->type == "Sell"){
            $rentPrice = $rented->rentProperty->price - $rented->discount;
        }
        $totalPaid = 0 - $rentPrice;
        foreach($paymentrents as $paid){
            $totalPaid = $totalPaid + $paid->amt_paid;
        }
        if($paymentrent)
        {
            $createdAt = Carbon::parse($paymentrent->created_at);
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
            $remainToPay = $rentToPay - $totalPaid;
        }
        if($payments)
        {
            if($type == "Deposit")
            {
                Alert::warning('The building has already been deposited earlier.');
                return redirect()->route('payment.create');
            }
            if($type == "Sell"){
                Alert::warning('This property is rented. You can\'t done payment for sell.');
                return redirect()->route('payment.create');
            }
            $amt = $request->amt_paid;
            $payment->status = "Paid";
            if($amt < $remainToPay){
                $payment->status = "Half-Paid";
            }
            $payment->rented_id = $rented->id;
            $payment->amt_paid = $amt;
            $payment->payment_mode = $request->payment_mode;
            $payment->payment_type = $request->payment_type;
            $payment->visible = "Yes";
            $payment->remarks = $request->remarks;
            $payment->month = $request->month;
            $payment->save();
            Alert::success('The payment has been done.');
            return redirect()->route('payment.index');
        }elseif($type == "Deposit"){

            if($rented->rentProperty->type == "Sell")
            {
                Alert::warning('This Property is for Sell.');
                return redirect()->route('payment.create');
            }
            $amt = $request->amt_paid;
            if($amt < $rentPrice)
            {
                Alert::warning('The amount entered is less than deposit amount.');
                return redirect()->route('payment.create');
            }
            $payment->rented_id = $rented->id;
            $payment->amt_paid = $amt;
            $payment->status = "Paid";
            $payment->payment_mode = $request->payment_mode;
            $payment->payment_type = "Deposit";
            $payment->visible = "Yes";
            $payment->remarks = $request->remarks;
            $payment->month = $request->month;
            $rented->status = "Confirmed";
            $rented->update();
            $payment->save();
            Alert::success('The amount has been deposited.');
            return redirect()->route('payment.index');

        }elseif($type == "Sell"){
            $amt = $request->amt_paid;
            if($amt < $rentPrice)
            {
                Alert::warning('The amount entered is less than Sell amount. Try again');
                return redirect()->route('payment.create');
            }
            $payment->rented_id = $rented->id;
            $payment->amt_paid = $amt;
            $payment->status = "Paid";
            $payment->payment_mode = $request->payment_mode;
            $payment->payment_type = "Deposit";
            $payment->visible = "Yes";
            $payment->remarks = $request->remarks;
            $payment->month = $request->month;
            $rented->status = "Confirmed";
            $rented->update();
            $payment->save();
            Alert::success('The amount has been deposited.');
            return redirect()->route('payment.index');
        }else{
            Alert::warning('This property hasn\'t deposited.');
            return redirect()->route('payment.create');
        }  
    }

    public function show(RentPayment $payment)
    { 
        $payment = $payment;
        $rented = $payment->rentedProperty;
        $paymentrent = RentPayment::where('rented_id', $payment->rented_id)->first();
        $paymentrents = RentPayment::where('rented_id', $payment->rented_id)->where('created_at', '<', $payment->created_at)->get();
        if($rented->rentProperty->type == "Rent")
        {
            $rentPrice = $rented->rentProperty->monthly_house_rent + $rented->rentProperty->electric_charge + $rented->rentProperty->water_charge + $rented->rentProperty->garbage_charge - $rented->discount;
        }elseif($rented->rentProperty->type == "Sell"){
            $rentPrice = $rented->rentProperty->price - $rented->discount;
        }
        $totalPaid = 0 - $rentPrice;
        foreach($paymentrents as $paid){
            $totalPaid = $totalPaid + $paid->amt_paid;
        }
        if($paymentrent)
        {
            $createdAt = Carbon::parse($paymentrent->created_at);
            $today = Carbon::parse($payment->created_at);    
            $diffInMonths = $createdAt->diffInMonths($today);
        }
        $rentToPay = 0;
        $remainToPay = 0;
        if(isset($diffInMonths)){
            for($i = 0; $i < $diffInMonths; $i++)
            {
                $rentToPay = $rentToPay + $rentPrice;
            }
            $remainToPay = $rentToPay - $totalPaid - $rentPrice ;
        }
        $data = ['rented' => $rented, 'payment' => $payment, 'rentPrice' => $rentPrice, 'remainToPay' => $remainToPay ];
        return view('Landlords.Payment.view', $data);
    }


    public function getBuildings(Request $request)
    {
        $tenantId = $request->input('tenant_id');
        $buildings = Building::with(['rentProperties.rentedProperty', 'rentProperties'])
        ->whereHas('rentProperties.rentedProperty', function ($query) use ($tenantId) {
            $query->where('tenant_id', $tenantId)
                ->whereHas('rentProperty.landlord', function ($subQuery) {
                    $subQuery->where('id', Auth::id());
                })
                ->where(function ($subQuery) {
                    $subQuery->where(function ($q) {
                        $q->where('type', 'Rent')->where('status', 'Confirmed');
                    })
                    ->orWhere(function ($q) {
                        $q->where('type', 'Rent')->where('status', 'Approved');
                    })
                    ->orWhere(function ($q) {
                        $q->where('type', 'Sell')->where('status', 'Approved');
                    });
                });
        })
        ->whereDoesntHave('rentProperties', function ($query) {
            $query->where('type', 'Sell')->whereHas('rentedProperty', function ($subQuery) {
                $subQuery->where('status', 'Confirmed');
            });
        })
        ->get();
    
        return response()->json($buildings);
    }

    public function getRentedProperties(Request $request)
    {
        $buildingId = $request->input('building_id');

        $rentedProperty = RentProperty::where('id', $buildingId)
            ->whereHas('rentedProperty', function ($query) {
                $query->where('status', 'Approved'); 
            })
            ->where('type', 'Rent')
            ->first();
        if($rentedProperty )
        {
            $discount = $rentedProperty->RentedProperty->discount;
        }
        $rentedPropertys = RentProperty::where('id', $buildingId)
            ->whereHas('rentedProperty', function ($query) {
                $query->where('status', 'Approved'); 
            })
            ->where('type', 'Sell')
            ->first();
        if($rentedPropertys )
        {
            $discount = $rentedPropertys->RentedProperty->discount;
        }
        $rentedPropertyss = RentProperty::where('id', $buildingId)
            ->whereHas('rentedProperty', function ($query) {
                $query->where('status', 'Confirmed'); 
            })
            ->first();
        if($rentedPropertyss )
        {
            $discount = $rentedPropertyss->rentedProperty->discount;
            $paymentrent = RentPayment::where('rented_id', $rentedPropertyss->rentedProperty->id)->first();
            $paymentrents = RentPayment::where('rented_id', $rentedPropertyss->rentedProperty->id)->get();
            if($rentedPropertyss->type == "Rent")
            {
                $rentPrice = $rentedPropertyss->monthly_house_rent + $rentedPropertyss->electric_charge + $rentedPropertyss->water_charge + $rentedPropertyss->garbage_charge - $discount;
            }elseif($rentedPropertyss->type == "Sell"){
                $rentPrice = $rentedPropertyss->price - $discount;
            }
            $totalPaid = 0 - $rentPrice;
            foreach($paymentrents as $paid){
                $totalPaid = $totalPaid + $paid->amt_paid;
            }
            if($paymentrent)
            {
                $createdAt = Carbon::parse($paymentrent->created_at);
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
                $remainToPay = $rentToPay - $totalPaid - $rentPrice;
            }
        }
        if ($rentedProperty) {
            return response()->json([
                'deposit_rent' => $rentedProperty->monthly_house_rent - $discount,
                'electric_charge' => $rentedProperty->electric_charge,
                'water_charge' => $rentedProperty->water_charge,
                'garbage_charge' => $rentedProperty->garbage_charge,
                'total' => $rentedProperty->monthly_house_rent + $rentedProperty->electric_charge + $rentedProperty->water_charge + $rentedProperty->garbage_charge - $discount,
            ]);
        } elseif($rentedPropertyss) {
            return response()->json([
                'remainToPay' => $remainToPay,
                'monthly_house_rent' => $rentedPropertyss->monthly_house_rent - $discount,
                'sell_price' => $rentedPropertyss->price,
                'electric_charge' => $rentedPropertyss->electric_charge,
                'water_charge' => $rentedPropertyss->water_charge,
                'garbage_charge' => $rentedPropertyss->garbage_charge,
                'total' => $remainToPay + $rentedPropertyss->monthly_house_rent + $rentedPropertyss->electric_charge + $rentedPropertyss->water_charge + $rentedPropertyss->garbage_charge - $discount,
            ]);
        } elseif($rentedPropertys) {
            return response()->json([
                'monthly_house_rent' => $rentedPropertys->monthly_house_rent - $discount,
                'sell_price' => $rentedPropertys->price,
                'electric_charge' => $rentedPropertys->electric_charge,
                'water_charge' => $rentedPropertys->water_charge,
                'garbage_charge' => $rentedPropertys->garbage_charge,
                'total' => $rentedPropertys->monthly_house_rent + $rentedPropertys->electric_charge + $rentedPropertys->water_charge + $rentedPropertys->garbage_charge - $discount,
            ]);
        } else {
            return response()->json(['error' => 'No rented property found for the selected building']);
        }
    }

    public function destroy(RentPayment $payment)
    {
        $payment->visible = "No";
        $payment->update();
        Alert::success('Payment has been deleted.');
        return redirect()->route('payment.index');
    }
}
