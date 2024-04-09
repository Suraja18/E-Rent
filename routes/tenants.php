<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Tenant\HousingController;
use App\Http\Controllers\Tenant\PaymentController;
use App\Http\Controllers\Tenant\RentController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\PDFController;
use App\Http\Controllers\User\UserController;
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
        Route::post('/success/contact', [UserController::class, 'updateContact'])->name('tenant.get.contact');
        Route::get('/profile', [TenantController::class, 'profile'])->name('tenant.profile');
        Route::put('/update/profile', [AuthController::class, 'updateProfile'])->name('tenant.account');
        Route::get('/search/property-types', [TenantController::class, 'searchProperty'])->name('tenant.search.property');
        Route::get('/forums/{slug}', [TenantController::class, 'forumDetail'])->name('tenant.forum.detail');
        Route::get('/{slug}/pdf',[PDFController::class, 'generatePDF'])->name('forum.generatePDF');
        Route::get('/{slug}/property',[HousingController::class, 'propertyDetail'])->name('tenant.propertyDetail');
        

         //For Complete Profile Landlord
        Route::middleware(['checkComplete'])->group(function () {
            Route::get('/{slug}/property/rent',[HousingController::class, 'showDetail'])->name('tenant.showDetail');
            Route::post('/property/rent/success',[RentController::class, 'rentStore'])->name('tenant.store.rent');
            Route::get('/property/rented',[RentController::class, 'viewAllProperty'])->name('tenant.view.allProperty');
            Route::get('/property/{slug}/rented/view',[HousingController::class, 'showDetail'])->name('tenant.display.property');
            Route::get('/property/rented/view/{slug}/pdf',[PDFController::class, 'generateUserPropertyDetailPDF'])->name('tenant.property.generatePDF');
            Route::delete('/property/rented/delete/{slug}', [RentController::class, 'propertyDelete'])->name('tenant.property.delete');
            Route::put('/property/rented/cancel/{slug}', [RentController::class, 'propertyCancel'])->name('tenant.property.cancel');
            Route::put('/property/rented/check-out/{slug}', [RentController::class, 'propertyCheckout'])->name('tenant.property.checkout');
            Route::post('/mark-notification-read/{notification}', [NotificationController::class,'markNotificationRead'])->name('tenant.mark.notification.read');
            Route::get('/property/{slug}/make/payment', [HousingController::class,'makePayment'])->name('tenant.make.payment');
            Route::post('/property/rent/pay/esewa',[PaymentController::class, 'esewaPay'])->name('tenant.esewa.pay');
            Route::post('/property/rent/pay/khalti',[PaymentController::class, 'khaltiPay'])->name('tenant.khalti.pay');
            Route::get('/property/rent/pay/eSewa/success',[PaymentController::class, 'esewaSuccess']);
            Route::get('/property/rent/pay/esewa/failure',[PaymentController::class, 'esewaFailure']);
            Route::post('/property/view/rented', [RentController::class, 'viewRentedProperty'])->name('tenant.property.status.search');
            Route::get('/property/payment/history', [PaymentController::class, 'index'])->name('tenant.payment_history'); 
            Route::get('/property/{payment}/payment/history', [PaymentController::class, 'show'])->name('tenant.payment_history.show'); 
            Route::delete('/property/{payment}/payment/history/delete', [PaymentController::class, 'destroy'])->name('tenant.payment.destroy'); 
            Route::get('/property/payment/pdf/{id}', [PDFController::class, 'generateInvoicePDF'])->name('tenant.payment.pdf.download');
        });
    });
});


