<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
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
    });
});