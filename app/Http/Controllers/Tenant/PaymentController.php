<?php

namespace App\Http\Controllers\Tenant;

// require '../vendor/autoload.php';
require __DIR__ . '../../../../../vendor/autoload.php';

use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\EsewaRequest;
use App\Models\RentedProperty;
use App\Models\RentPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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
            $rentPrice = $rents->rentProperty->price - $rents->discount;
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
        if($payment->payment_type == "Deposit" || $payment->payment_type == "Sell")
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
    public function khaltiPay(EsewaRequest $request)
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
            $rentPrice = $rents->rentProperty->price - $rents->discount;
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
        $payment->status = "Paid";
        $payment->payment_mode = "Online";
        $payment->payment_type = $request->payment_type;
        $payment->month = $request->month;
        if($payment->payment_type == "Deposit" || $payment->payment_type == "Sell")
        {
            $rent = $payment->rentedProperty;
            $rent->status = "Confirmed";
            $rent->update();
        }
        $payment->save();
        Alert::success("Payment Successful");
        return redirect()->route('tenant.view.allProperty');
    }
    public function paypalPay(EsewaRequest $request)
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
            $rentPrice = $rents->rentProperty->price - $rents->discount;
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

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
        $paypalToken = $provider->getAccessToken();
        $orderResponse = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" =>  round($request->amt_paid / 133.58403, 2)
                    ]
                ]
            ]
        ]);
        session()->put('REID', $payment->id);
        if(isset($orderResponse['id']) && $orderResponse['id'] != null)
        {
            foreach($orderResponse['links'] as $link)
            {
                if($link['rel'] === 'approve')
                {
                    return redirect()->away($link['href']);
                }
            }
        }else{
            return redirect()->route('paypal.cancel');
        }
    }
    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            $payment = RentPayment::find(session()->get('REID'));
            $payment->status = "Paid";
            $payment->update();
            if($payment->payment_type == "Deposit" || $payment->payment_type == "Sell")
            {
                $rent = $payment->rentedProperty;
                $rent->status = "Confirmed";
                $rent->update();
            }
            unset($_SESSION['REID']);
            session()->forget('REID');
            Alert::success("Payment Successful");
            return redirect()->route('tenant.view.allProperty');
        }else{
            return redirect()->route('paypal.cancel');
        }
    }
    public function paypalFailure(Request $request)
    {
        $payment = RentPayment::find(session()->get('REID'));
        $payment->delete();
        unset($_SESSION['REID']);
        session()->forget('REID');
        Alert::error("Payment Cancelled");
        return redirect()->route('tenant.view.allProperty');
    }
    public function stripePay(EsewaRequest $request)
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
            $rentPrice = $rents->rentProperty->price - $rents->discount;
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
        session()->put('RID', $payment->id);
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        $orderResponse = $stripe->checkout->sessions->create([
        'line_items' => [
            [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => ['name' => $request->building_id],
                'unit_amount' => round(($request->amt_paid / 133.58403), 2)*100,
            ],
            'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('stripe.cancel'),
        ]);
        if(isset($orderResponse->id) && $orderResponse->id != null)
        {
            return redirect($orderResponse->url);
        }else{
            return redirect()->route('stripe.cancel');
        }
    }
    public function stripeSuccess(Request $request)
    {
        if(isset($request->session_id)){
            $payment = RentPayment::find(session()->get('RID'));
            $payment->status = "Paid";
            $payment->update();
            if($payment->payment_type == "Deposit" || $payment->payment_type == "Sell")
            {
                $rent = $payment->rentedProperty;
                $rent->status = "Confirmed";
                $rent->update();
            }
            unset($_SESSION['RID']);
            session()->forget('RID');

            Alert::success("Payment Successful");
            return redirect()->route('tenant.view.allProperty');
        } else{
            return redirect()->route('stripe.cancel');
        }
    }
    public function stripeFailure(Request $request)
    {
        $payment = RentPayment::find(session()->get('RID'));
        $payment->delete();
        unset($_SESSION['RID']);
        session()->forget('RID');
        Alert::error("Payment Cancelled");
        return redirect()->route('tenant.view.allProperty');
    }
    public function index()
    {
        $payments = RentPayment::with(['rentedProperty.tenant'])
            ->whereHas('rentedProperty', function ($query) {
                $query->where('tenant_id', Auth::id());
            })
            ->where('tenantVisible', 'Yes')
            ->get();
    
        $count = $payments->count();
        $data = ['payments' => $payments, 'count' => $count];
    
        return view('Tenants.payment-history', $data);
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
        return view('Tenants.invoice', $data);
    }
    public function destroy(RentPayment $payment)
    {
        $payment->tenantVisible = "No";
        $payment->update();
        Alert::success('Payment has been deleted.');
        return redirect()->route('tenant.payment_history');
    }
    
}
