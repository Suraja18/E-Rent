<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin', 'session.logout'])->group(function () {
    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/banner', [AdminController::class, 'banners'])->name('admin.banners');
        Route::post('/banner/store', [AdminController::class, 'bannerStore'])->name('admin.banners.store');
    });
});