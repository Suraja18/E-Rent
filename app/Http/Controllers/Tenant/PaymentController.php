<?php

namespace App\Http\Controllers\Tenant;

require '../vendor/autoload.php';

use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\EsewaRequest;
use App\Models\RentedProperty;
use App\Models\RentPayment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function esewaPay(EsewaRequest $request)
    {
        $pid = $request->building_id;
        $amt = $request->amt_paid;
        $payment = new RentPayment();
        $payment->rented_id = $pid; 
        $payment->amt_paid = $amt;
        $rents = RentedProperty::where('id', $pid)->whereNull('deleted_at')->first();
        if($request->payment_type == "Deposit")
        {
            $rentPrice = $rents->rentProperty->monthly_house_rent + $rents->rentProperty->electric_charge + $rents->rentProperty->water_charge + $rents->rentProperty->garbage_charge - $rents->discount;
            if($rentPrice != $amt)
            {
                Alert::warning('Please Insert the full amount to continue');
                return redirect()->route('tenant.view.allProperty');
            }
        }
        if($request->payment_type == "Sell")
        {
            $rentPrice = $rents->rentProperty->price = $rents->discount;
            if($rents->status == "Confirmed")
            {
                Alert::warning('You have already paid for this property');
                return redirect()->route('tenant.view.allProperty');
            }
            if($rentPrice != $amt)
            {
                Alert::warning('Please Insert the full amount to continue');
                return redirect()->route('tenant.view.allProperty');
            }
        }
        $payment->status = "Unpaid";
        $payment->payment_mode = "Online";
        $payment->payment_type = $request->payment_type;
        $payment->month = $request->month;
        $payment->save();

        $successUrl = url('/tenants/property/rent/pay/eSewa/success');
        $failureUrl = url('/tenants/property/rent/pay/esewa/failure');

        $conn = new Config($successUrl, $failureUrl);

        $esewa = new Client($conn);
        $esewa->process($pid, $amt, 0, 0, 0);
    }
    public function esewaSuccess()
    {
        $pid = $_GET['oid'];
        $refId = $_GET['refId'];
        $amount = $_GET['amt'];
        $payment = RentPayment::where('rented_id', $pid)->latest()->first();
        $payment->status = "Paid";
        if($payment->payment_type == "Deposit")
        {
            $rent = $payment->rentedProperty;
            $rent->status = "Confirmed";
            $rent->update();
        }
        $payment->update();
        Alert::success("Payment Successful");
        return redirect()->route('tenant.view.allProperty');
    }
    public function esewaFailure()
    {
        $pid = $_GET['pid'];
        $payment = RentPayment::where('rented_id', $pid)->latest()->first();
        $payment->delete();
        Alert::error('Payment Failed! Error While Paying');
        return redirect()->route('tenant.view.allProperty');
    }
}
