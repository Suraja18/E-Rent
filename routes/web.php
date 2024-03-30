<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/users.php';
require __DIR__ . '/tenants.php';
require __DIR__ . '/landlords.php';

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
Route::get('/register', [AuthController::class, 'registerUser'])->name('user.register');
Route::post('/register-complete', [AuthController::class, 'registerComplete'])->name('user.completeRegister');
Route::post('/login', [AuthController::class, 'login'])->name('user.loginSuccess');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');