<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PressController;
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
    });
});