<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function dashboard()
    {
        return view('Landlords.index');
    }
}
