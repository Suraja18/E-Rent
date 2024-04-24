<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PressController;
use App\Http\Controllers\Admin\RatesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RolesDescController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin', 'session.logout'])->group(function () {
    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
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
    });
});