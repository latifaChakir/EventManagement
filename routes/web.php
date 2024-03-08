<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidateEventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/error', function () {
    return view('404_error');
});




Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'create'])->name('auth.register.post');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login.post');
Route::get('/logout', [AuthController::class, 'logout']);

//PASSWORD RESETTING
Route::get('/forgetpassword', [AuthController::class, 'forgetpassword']);
Route::post('/resetpasswordPost', [AuthController::class, 'sendemail']);
Route::post('/newpasswordPost', [AuthController::class, 'addpassword']);
Route::get('/resetwithemail/{token}', [AuthController::class, 'reset'])->name('resetwithemail');
////FONCTIONNALITIES
Route::resource('categories', CategoryController::class)->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');
Route::get('contact', [UserController::class,'contact'])->middleware('admin');
Route::get('validatEvent', [ValidateEventController::class, 'validateEvent'])->middleware('admin');
Route::get('Refused/{id}', [ValidateEventController::class, 'refusedEvent'])->middleware('admin');
Route::get('Accepted/{id}', [ValidateEventController::class, 'AcceptedEvent'])->middleware('admin');
Route::get('dashboard', [ValidateEventController::class, 'afficheStatistics'])->middleware('admin');

Route::middleware('jwt.check')->group(function () {
    Route::resource('events', EventController::class)->middleware('organisateur');
    Route::get('reservation', [EventController::class, 'accepteEvents'])->middleware('organisateur');
    Route::get('/approved/{id}', [EventController::class, 'approved'])->middleware('organisateur');
    Route::get('/rejected/{id}', [EventController::class, 'rejected'])->middleware('organisateur');
    Route::get('statistics', [EventController::class, 'afficheStatistics'])->middleware('organisateur');
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('organisateur');
    Route::get('/profileAdmin', [AuthController::class, 'profile'])->middleware('admin');


});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/filter', [HomeController::class, 'filter']);
Route::get('/eventDetail/{id}', [HomeController::class, 'afficherDet']);
Route::get('/ticket/{id}', [TicketController::class, 'generate'])->middleware('jwt.check');
Route::get('/pdf/{idEvent}', [TicketController::class,'pdf'])->name('generate.pdf')->middleware('jwt.check');

Route::get('/checkout/{id}', [StripeController::class , 'checkout'])->middleware('jwt.check');
Route::get('/success/{event}', [StripeController::class , 'success'])->name('success');

