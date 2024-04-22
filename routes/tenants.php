<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Landlord\MessageController;
use App\Http\Controllers\Tenant\FriendController;
use App\Http\Controllers\Tenant\HousingController;
use App\Http\Controllers\Tenant\MaintenanceController;
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
        Route::get('/{slug}/press-media',[UserController::class, 'newsAndMedia'])->name('tenant.press-media.single');
        Route::get('/customer-review',[TenantController::class, 'customerReview'])->name('tenant.customer-review');
        Route::get('/contact', [TenantController::class, 'contactPage'])->name('tenant.contact');
        Route::post('/success/contact', [UserController::class, 'updateContact'])->name('tenant.get.contact');
        Route::get('/profile', [TenantController::class, 'profile'])->name('tenant.profile');
        Route::put('/update/profile', [AuthController::class, 'updateProfile'])->name('tenant.account');
        Route::get('/search/property-types', [TenantController::class, 'searchProperty'])->name('tenant.search.property');
        Route::get('/forums/{slug}', [TenantController::class, 'forumDetail'])->name('tenant.forum.detail');
        Route::get('/{slug}/pdf',[PDFController::class, 'generatePDF'])->name('forum.generatePDF');
        Route::get('/{slug}/property',[HousingController::class, 'propertyDetail'])->name('tenant.propertyDetail');
        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('tenant.change.password');
        Route::post('/change-password/try', [AuthController::class, 'changeTryPassword'])->name('tenant.try.change.password');
        Route::get('/change-email', [AuthController::class, 'changeEmail'])->name('tenant.change.email');
        Route::post('/change-email/try', [AuthController::class, 'changeTryEmail'])->name('tenant.try.change.email');
        Route::post('/de-active/account', [AuthController::class, 'deactiveAccount'])->name('tenant.deactive.email');

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
            Route::post('/add/maintenance/form', [MaintenanceController::class, 'store'])->name('tenant.maintenance.store');
            Route::get('/friends', [FriendController::class, 'view'])->name('tenant.view.friends');
            Route::get('/send/message', [MessageController::class, 'sendTenantMessage'])->name('tenant.sendMessage');
            Route::post('/send-message', [MessageController::class, 'sendMessages'])->name('tenant.sendMessages');
            Route::post('/mark-messages-as-read', [MessageController::class, 'markAsRead'])->name('tenant.mark_messages_as_read');
            Route::post('/delete-messages', [MessageController::class, 'deleteMessage'])->name('tenant.message.delete');
            Route::post('/view/friends', [TenantController::class, 'seeFriends'])->name('tenant.viewFriend');
            Route::post('/unfriend', [TenantController::class, 'unfriend'])->name('tenant.unfriend');
            Route::post('/addingFriend', [TenantController::class, 'addingFriend'])->name('tenant.addingFriend');
            Route::post('/submit/rating', [TenantController::class, 'submitRating'])->name('submit.rating');
            Route::delete('/delete/{id}/review', [TenantController::class, 'deleteReview'])->name('delete.review');

            Route::get('/add/maintenance', [MaintenanceController::class, 'create'])->name('tenant.maintenance.add');
            Route::get('/view/{id}/maintenance', [MaintenanceController::class, 'view'])->name('tenant.maintenance.view');
            Route::get('/cancel/{id}/maintenance', [MaintenanceController::class, 'cancel'])->name('tenant.maintenance.cancel');
            Route::get('/delete/{id}/maintenance', [MaintenanceController::class, 'destroy'])->name('tenant.maintenance.destroy');
            Route::post('/users/add-friend', [FriendController::class, 'addFriend'])->name('user.addFriend');
            Route::post('/users/update-friend-request', [FriendController::class, 'updateFriendRequest'])->name('user.updateFriendRequest');
            Route::post('/search/maintenance', [MaintenanceController::class, 'search'])->name('tenant.maintenance.search');

        });
    });
});


