<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingServiceController;
use App\Http\Controllers\KennelSpaceController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
});
// pets
Route::get('/pets', [PetController::class, 'index']);
Route::get('/pets/create', [PetController::class, 'create']);

// services
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/create', [ServiceController::class, 'create']);

// bookings
Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/bookings/create', [BookingController::class, 'create']);

// kennel spaces
Route::get('/kennel-spaces', [KennelSpaceController::class, 'index']);
Route::get('/kennel-spaces/create', [KennelSpaceController::class, 'create']);

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
