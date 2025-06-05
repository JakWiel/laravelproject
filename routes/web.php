<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KennelSpaceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/book-service', [HomeController::class, 'openBookingModal']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// pets
Route::get('/pets', [PetController::class, 'index']);
Route::get('/pets/create', [PetController::class, 'create']);
Route::post('/pets/create', [PetController::class, "addToDB"]);
Route::get('/pets/edit/{id}', [PetController::class, 'edit']);
Route::post('/pets/edit/{id}', [PetController::class, 'update']);
Route::delete('/pets/delete/{id}', [PetController::class, "delete"]);

// services
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/create', [ServiceController::class, 'create']);
Route::post('/services/create', [ServiceController::class, "addToDB"]);
Route::get('/services/edit/{id}', [ServiceController::class, 'edit']);
Route::post('/services/edit/{id}', [ServiceController::class, 'update']);
Route::delete('/services/delete/{id}', [ServiceController::class, "delete"]);

// bookings
Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/bookings/create', [BookingController::class, 'create']);
Route::post('/bookings/create', [BookingController::class, "addToDB"]);
Route::get('/bookings/edit/{id}', [BookingController::class, 'edit']);
Route::post('/bookings/edit/{id}', [BookingController::class, 'update']);
Route::delete('/bookings/delete/{id}', [BookingController::class, "delete"]);

// kennel spaces
Route::get('/kennel-spaces', [KennelSpaceController::class, 'index']);
Route::get('/kennel-spaces/create', [KennelSpaceController::class, 'create']);
Route::post('/kennel-spaces/create', [KennelSpaceController::class, "addToDB"]);
Route::get('/kennel-spaces/edit/{id}', [KennelSpaceController::class, 'edit']);
Route::post('/kennel-spaces/edit/{id}', [KennelSpaceController::class, 'update']);
Route::delete('/kennel-spaces/delete/{id}', [KennelSpaceController::class, "delete"]);

// users
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/search', [UserController::class, 'search']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, "addToDB"]);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/edit/{id}', [UserController::class, 'update']);
Route::delete('/users/delete/{id}', [UserController::class, "delete"]);

// booking services
Route::get('/booking-services', [BookingServiceController::class, 'index']);
Route::get('/booking-services/create', [BookingServiceController::class, 'create']);
Route::post('/booking-services/create', [BookingServiceController::class, "addToDB"]);
Route::get('/booking-services/edit/{id}', [BookingServiceController::class, 'edit']);
Route::post('/booking-services/edit/{id}', [BookingServiceController::class, 'update']);
Route::delete('/booking-services/delete/{id}', [BookingServiceController::class, "delete"]);

// login
Route::get('/login', function () {
    return view('home.login');
});
Route::get('/register', function () {
    return view('home.register');
});
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [LoginController::class, 'register']);
// Route::get('/logout', function () {
//     session()->forget('user');
//     return redirect('/login');
// })->name('logout');