<?php

use App\Http\Controllers\Landlord\BuildingController;
use App\Http\Controllers\Landlord\HomeSellController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Landlord\UnitController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landlord', 'session.logout'])->group(function () {
    Route::prefix('landlords')->group(function () {
        Route::get('/', [LandlordController::class, 'dashboard'])->name('landlord.dashboard');
        Route::resource('/building', BuildingController::class);
        Route::resource('/unit', UnitController::class)->only(["index", "store", "destroy"]);
        Route::resource('/house-sell', HomeSellController::class)->only(["index", "store", "edit", "update", "destroy"]);
    });
});