<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function activeIndex()
    {
        $landlordId = Auth::id();

        $activeTenants = User::whereHas('rentedProperties', function ($query) {
            $query->whereNull('deleted_at')
                ->where('status', 'Confirmed');
        })->whereHas('rentedProperties.building', function ($query) use ($landlordId) {
            $query->where('landlord', $landlordId);
        })->where('role', 'tenant')->get();
    }
}
