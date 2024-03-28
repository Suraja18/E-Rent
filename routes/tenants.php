<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Tenant\TenantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['tenant'])->group(function () {
    Route::prefix('tenants')->group(function () {
        Route::get('/', [TenantController::class, 'dashboard'])->name('tenant.dashboard');
    });
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
