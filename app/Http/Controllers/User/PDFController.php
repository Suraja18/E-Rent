<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Forums;
use App\Models\RentedProperty;
use App\Models\RentProperty;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
}
