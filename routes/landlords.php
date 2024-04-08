<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Landlord\ApproveController;
use App\Http\Controllers\Landlord\BuildingController;
use App\Http\Controllers\Landlord\ForumController;
use App\Http\Controllers\Landlord\HomeSellController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Landlord\PaymentController;
use App\Http\Controllers\Landlord\RentController;
use App\Http\Controllers\Landlord\UnitController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landlord', 'session.logout'])->group(function () {
    Route::prefix('landlords')->group(function () {
        Route::get('/', [LandlordController::class, 'dashboard'])->name('landlord.dashboard');
        Route::get('/profile', [LandlordController::class, 'profile'])->name('landlord.profile');
        Route::put('/update/profile', [AuthController::class, 'updateProfile'])->name('landlord.account');
        Route::get('/contact', [LandlordController::class, 'Contact'])->name('landlord.contact');
        Route::post('/success/contact', [UserController::class, 'updateContact'])->name('landlord.get.contact');

        //For Complete Profile Landlord
        Route::middleware(['checkComplete'])->group(function () {
            Route::resource('/building', BuildingController::class);
            Route::get('/get-floors/{id}', [LandlordController::class, 'getFloors']);
            Route::resource('/unit', UnitController::class)->only(["index", "store", "edit", "update", "destroy"]);
            Route::resource('/house-sell', HomeSellController::class)->only(["index", "store", "edit", "update", "destroy"]);
            Route::resource('/rent', RentController::class);
            Route::resource('/forum', ForumController::class);
            Route::resource('/approve', ApproveController::class);
            Route::resource('/payment', PaymentController::class);
            Route::post('/get-buildings', [PaymentController::class, 'getBuildings'])->name('get.buildings');
            Route::post('/get-rented-properties', [PaymentController::class, 'getRentedProperties'])->name('get.rented_properties');

            Route::post('/mark-notification-read/{notification}', [NotificationController::class,'markNotificationRead'])->name('mark.notification.read');
        });
    });
});