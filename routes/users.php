<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Users.index');
})->name('user.index');

Route::get('/about',[UserController::class, 'aboutPage'])->name('user.about');
Route::get('/contact',[UserController::class, 'contacts'])->name('user.contact');
Route::get('/frequently-asked-questions',[UserController::class, 'FAQS'])->name('user.faqs');
Route::get('/press-and-media',[UserController::class, 'SocialNews'])->name('user.press-media');
Route::get('/customer-review',[UserController::class, 'customerReview'])->name('user.customer-review');
Route::get('/all-landlord',[UserController::class, 'landlordList'])->name('user.landlord');
Route::get('/all-property',[UserController::class, 'propertyList'])->name('user.property-list');
Route::get('/property-types',[UserController::class, 'propertyTypes'])->name('user.property-types');
Route::get('/user-role',[UserController::class, 'userRoles'])->name('user.user-role');