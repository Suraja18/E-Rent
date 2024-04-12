<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function create()
    {
        return view('Tenants.Maintainance.add');
    }
    public function store(Request $request)
    {
        return $request;
    }
}
