<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Landlord\ApproveController;
use App\Http\Controllers\Landlord\BuildingController;
use App\Http\Controllers\Landlord\EmailController;
use App\Http\Controllers\Landlord\ForumController;
use App\Http\Controllers\Landlord\HomeSellController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Landlord\MaintenanceController;
use App\Http\Controllers\Landlord\MessageController;
use App\Http\Controllers\Landlord\PaymentController;
use App\Http\Controllers\Landlord\RentController;
use App\Http\Controllers\Landlord\TenantController;
use App\Http\Controllers\Landlord\UnitController;
use App\Http\Controllers\Tenant\FriendController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\PDFController;
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
            Route::resource('/payment', PaymentController::class)->only(["index", "create", "store", "show", "destroy"]);
            Route::post('/get-buildings', [PaymentController::class, 'getBuildings'])->name('get.buildings');
            Route::post('/get-rented-properties', [PaymentController::class, 'getRentedProperties'])->name('get.rented_properties');

            Route::get('/active-tenants', [TenantController::class, 'activeIndex'])->name('landlord.tenant.active.index'); 
            Route::get('/already-rented', [TenantController::class, 'alreadyRented'])->name('landlord.property.rent.index');
            Route::get('/{id}/already-rented/{amt}/notify', [TenantController::class, 'notifyRented'])->name('landlord.property.rent.notify');
            Route::get('/deposited-tenants', [TenantController::class, 'depositTenants'])->name('landlord.tenant.deposit');
            Route::get('/vacant-property', [TenantController::class, 'vacantProperty'])->name('landlord.property.rent.vacant');
            Route::get('/request/maintenance', [MaintenanceController::class, 'index'])->name('landlord.maintenance.index');
            Route::get('/complete/request/maintenance', [MaintenanceController::class, 'complete'])->name('landlord.maintenance.complete');
            Route::get('/view/{id}/maintenance', [MaintenanceController::class, 'view'])->name('landlord.maintenance.view');
            Route::get('/progress/{id}/maintenance', [MaintenanceController::class, 'progress'])->name('landlord.maintenance.progress');
            Route::get('/completed/{id}/maintenance', [MaintenanceController::class, 'completed'])->name('landlord.maintenance.completed');
            Route::get('/cancel/{id}/maintenance', [MaintenanceController::class, 'cancel'])->name('landlord.maintenance.cancel');
            Route::get('/delete/{id}/maintenance', [MaintenanceController::class, 'destroy'])->name('landlord.maintenance.destroy');
            Route::get('/{id}/email',[EmailController::class, 'sendEmailByID'])->name('landlord.email.send.id');
            Route::get('/email',[EmailController::class, 'sendEmail'])->name('landlord.email.send');
            Route::post('/email/success',[EmailController::class, 'successEmail'])->name('landlord.email.success');
            Route::get('/add-friends', [LandlordController::class, 'addFriends'])->name('landlord.add.friends');
            Route::get('/friends', [LandlordController::class, 'view'])->name('landlord.view.friends');
            Route::post('/users/add-friend', [FriendController::class, 'addFriend'])->name('landlord.addFriend');
            Route::post('/users/update-friend-request', [FriendController::class, 'updateFriendRequest'])->name('landlord.updateFriendRequest');
            Route::get('/send/message', [MessageController::class, 'sendMessage'])->name('landlord.sendMessage');
            Route::post('/send-message', [MessageController::class, 'sendMessages'])->name('landlord.sendMessages');


            Route::get('/payment/pdf/{id}', [PDFController::class, 'generateInvoicePDF'])->name('landlord.payment.pdf.download');
            Route::post('/mark-notification-read/{notification}', [NotificationController::class,'markNotificationRead'])->name('mark.notification.read');
        });
    });
});