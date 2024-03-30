<?php

use App\Http\Controllers\Landlord\BuildingController;
use App\Http\Controllers\Landlord\LandlordController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landlord', 'session.logout'])->group(function () {
    Route::prefix('landlords')->group(function () {
        Route::get('/', [LandlordController::class, 'dashboard'])->name('landlord.dashboard');
        Route::resource('/building', BuildingController::class);
    });
});