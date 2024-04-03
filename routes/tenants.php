<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Tenant\TenantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['tenant', 'session.logout'])->group(function () {
    Route::prefix('tenants')->group(function () {
        Route::get('/', [TenantController::class, 'dashboard'])->name('tenant.dashboard');
        Route::get('/about', [TenantController::class, 'aboutPage'])->name('tenant.about');
        Route::get('/all-landlord',[TenantController::class, 'landlordList'])->name('tenant.landlord');
        Route::get('/all-property',[TenantController::class, 'propertyList'])->name('tenant.property-list');
        Route::get('/property-types',[TenantController::class, 'propertyTypes'])->name('tenant.property-types');
        Route::get('/add-friend',[TenantController::class, 'addFriend'])->name('tenant.add-friend');
        Route::get('/maintenance-request',[TenantController::class, 'maintenanceRequest'])->name('tenant.maintenanceRequest');
        Route::get('/landlord-forum',[TenantController::class, 'landlordForum'])->name('tenant.landlord-forum');
        Route::get('/press-and-media',[TenantController::class, 'pressMedia'])->name('tenant.press-media');
        Route::get('/customer-review',[TenantController::class, 'customerReview'])->name('tenant.customer-review');
        Route::get('/contact', [TenantController::class, 'contactPage'])->name('tenant.contact');
        Route::get('/profile', [TenantController::class, 'profile'])->name('tenant.profile');
        Route::put('/update/profile', [AuthController::class, 'updateProfile'])->name('tenant.account');

         //For Complete Profile Landlord
        Route::middleware(['checkComplete'])->group(function () {

        });
    });
});


