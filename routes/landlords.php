<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Landlord\BuildingController;
use App\Http\Controllers\Landlord\HomeSellController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Landlord\RentController;
use App\Http\Controllers\Landlord\UnitController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landlord', 'session.logout'])->group(function () {
    Route::prefix('landlords')->group(function () {
        Route::get('/', [LandlordController::class, 'dashboard'])->name('landlord.dashboard');
        Route::get('/profile', [LandlordController::class, 'profile'])->name('landlord.profile');
        Route::put('/update/profile', [AuthController::class, 'updateProfile'])->name('landlord.account');

        //For Complete Profile Landlord
        Route::middleware(['checkComplete'])->group(function () {
            Route::resource('/building', BuildingController::class);
            Route::get('/get-floors/{id}', [LandlordController::class, 'getFloors']);
            Route::resource('/unit', UnitController::class)->only(["index", "store", "edit", "update", "destroy"]);
            Route::resource('/house-sell', HomeSellController::class)->only(["index", "store", "edit", "update", "destroy"]);
            Route::resource('/rent', RentController::class);
        });
    });
});