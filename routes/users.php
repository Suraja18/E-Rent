<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Users.index');
})->name('user.index');

Route::get('/about',[UserController::class, 'aboutPage'])->name('user.about');
Route::get('/contact',[UserController::class, 'contacts'])->name('user.contact');
Route::get('/frequently-asked-questions',[UserController::class, 'FAQS'])->name('user.faqs');
Route::get('/{slug}/use-cases',[UserController::class, 'useCases'])->name('user.use-case');
Route::get('/press-and-media',[UserController::class, 'SocialNews'])->name('user.press-media');
Route::get('/{slug}/press-media',[UserController::class, 'newsAndMedia'])->name('user.press-media.single');
Route::get('/customer-review',[UserController::class, 'customerReview'])->name('user.customer-review');
Route::get('/user-role',[UserController::class, 'userRoles'])->name('user.user-role');
Route::get('/help-centre',[UserController::class, 'helpCentre'])->name('user.helpCentre');
Route::post('/success/contact', [UserController::class, 'updateContact'])->name('users.get.contact');
Route::get('/services', [UserController::class, 'allService'])->name('user.services');
Route::get('/{slug}/user-role', [UserController::class, 'userRoleDetail'])->name('user.role.detail');
Route::get('/{userSlug}/{slug}/help-centre',[UserController::class, 'helpCentreFind'])->name('user.help.centre.find');
Route::get('/user/{slug}/policy', [UserController::class, 'policyView'])->name('user.policy');