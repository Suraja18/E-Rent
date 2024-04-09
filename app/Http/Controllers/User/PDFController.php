<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Forums;
use App\Models\RentedProperty;
use App\Models\RentPayment;
use App\Models\RentProperty;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function generatePDF(string $slug)
    {
        $data = ['forum' => Forums::where('slug', $slug)->first()];
        $pdf = Pdf::loadView('Users.PDF.forum-detail', $data);
        return $pdf->download($slug.'.pdf');
    }
    public function generateUserPropertyDetailPDF(string $slug)
    {
        $property  = RentProperty::where('slug', $slug)->first();
        if(!$property){
            $building = Building::where('slug', $slug)->firstOrFail();
            $property = RentProperty::where('building_id', $building->id)->firstOrFail();
        }
        $rented_property = RentedProperty::where('rent_id', $property->id)->orWhere('tenant_id', Auth::id())->whereNull('deleted_at')->first();
        $data = ['property' => $property, 'property_rent' => $rented_property];
        $pdf = Pdf::loadView('Users.PDF.user-property-detail', $data);
        return $pdf->download($building->name.'.pdf');
    }
    public function generateInvoicePDF(string $id)
    {
        $payment = RentPayment::findOrFail($id);
        $rented = $payment->rentedProperty;
        $paymentrent = RentPayment::where('rented_id', $payment->rented_id)->first();
        $paymentrents = RentPayment::where('rented_id', $payment->rented_id)->where('created_at', '<', $payment->created_at)->get();
        $paymentlast = RentPayment::where('rented_id', $payment->rented_id)->where('created_at', '<', $payment->created_at)->latest()->first();
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
        if($paymentlast)
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
        $pdf = Pdf::loadView('Users.PDF.invoice', $data);
        return $pdf->download($payment->id.'.pdf');
    }
}
