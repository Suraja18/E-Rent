<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HelpCentreController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\PressController;
use App\Http\Controllers\Admin\Question\FrequentlyController;
use App\Http\Controllers\Admin\Question\TenantController;
use App\Http\Controllers\Admin\RatesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RolesDescController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UseCase\CaseController;
use App\Http\Controllers\Admin\UseCase\DescController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Landlord\EmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin', 'session.logout'])->group(function () {
    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::put('/update/profile', [AuthController::class, 'updateProfile'])->name('admin.account');
        Route::get('/banner', [AdminController::class, 'banners'])->name('admin.banners');
        Route::post('/banner/store', [AdminController::class, 'bannerStore'])->name('admin.banners.store');
        Route::get('/about/intro', [AboutController::class, 'intro'])->name('admin.intro');
        Route::post('/about/intro/store', [AboutController::class, 'aboutStore'])->name('admin.intro.store');
        Route::get('/about/infinity', [AboutController::class, 'infinity'])->name('admin.infinity');
        Route::post('/about/infinity/store', [AboutController::class, 'infinityStore'])->name('admin.infinity.store');
        Route::get('/about/infinity/images', [AboutController::class, 'images'])->name('admin.infinity.images');
        Route::post('/about/infinity/images/store', [AboutController::class, 'imagesStore'])->name('admin.infinity.images.store');
        Route::delete('/about/infinity/images/{id}/delete', [AboutController::class, 'imagesDestroy'])->name('admin.infinity.images.destroy');
        Route::get('/about/history', [AboutController::class, 'history'])->name('admin.history');
        Route::post('/about/history/store', [AboutController::class, 'aboutHistory'])->name('admin.history.store');
        Route::get('/company', [AdminController::class, 'company'])->name('admin.company');
        Route::post('/company/store', [AdminController::class, 'companyStore'])->name('admin.company.store');
        Route::resource('/press', PressController::class);
        Route::get('/web/rates', [RatesController::class, 'index'])->name('admin.rates.index');
        Route::post('/web/rates/store', [RatesController::class, 'store'])->name('admin.rates.store');
        Route::resource('/service', ServiceController::class)->only(['index', 'store', 'edit', 'update', 'destroy' ]);
        Route::get('/advertising', [RatesController::class, 'advertising'])->name('admin.advertising.index');
        Route::post('/advertising', [RatesController::class, 'advertisingStore'])->name('admin.advertising.store');
        Route::resource('/roles', RolesController::class);
        Route::resource('/roles-desc', RolesDescController::class);
        Route::resource('/frequently', FrequentlyController::class);
        Route::resource('/question', TenantController::class);
        Route::resource('/help-centre', HelpCentreController::class);
        Route::resource('/use-case', CaseController::class)->except(['show']);
        Route::resource('/case', DescController::class)->except(['show']);
        Route::get('/web/rating', [AdminController::class, 'getRating'])->name('admin.rating.index');
        Route::delete('/web/{id}/rating/delete', [AdminController::class, 'deleteRating'])->name('admin.rating.destroy');
        Route::get('/all-contact', [AdminController::class, 'Contact'])->name('admin.contact.index');
        Route::post('/update-read-status', [AdminController::class, 'updateReadStatus'])->name('contact.read');
        Route::delete('/contact/{id}/delete', [AdminController::class, 'deleteContact'])->name('admin.contact.destroy');
        Route::get('/{id}/email',[EmailController::class, 'sendEmailByEmail'])->name('admin.email.send.id');
        Route::get('/email',[EmailController::class, 'sendEmail'])->name('admin.email.send');
        Route::post('/email/success',[EmailController::class, 'successEmail'])->name('admin.email.success');
        Route::get('{email}/contact', [AdminController::class, 'contactView'])->name('admin.contact.view');
        Route::resource('/policy', PolicyController::class);

        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    });
});