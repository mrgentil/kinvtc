<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;


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

//Route::get('/', function () {
//    return view('layouts.main');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cars', [App\Http\Controllers\VehiculeController::class, 'index'])->name('cars');
Route::get('/cars/{slug}', [App\Http\Controllers\VehiculeController::class, 'show'])->name('cars.show');
Route::get('/vehicules/{id}', [App\Http\Controllers\ServiceController::class, 'show'])->name('vehicules.show');
Route::post('/reservation-first', [App\Http\Controllers\ServiceController::class, 'reservationFirst'])->name('vehicules.reservations');
Route::post('/reservation-connected', [App\Http\Controllers\ServiceController::class, 'processReservationConnected'])->name('reservation.connected');
Route::post('/reservation-guest', [App\Http\Controllers\ServiceController::class, 'processReservationGuest'])->name('reservation.guest');

Route::post('/aeroport-reservation-connected', [App\Http\Controllers\AeroportController::class, 'processReservationConnected'])->name('reservation-aeroport.connected');
Route::post('/aeroport-reservation-guest', [App\Http\Controllers\AeroportController::class, 'processReservationGuest'])->name('reservation-aeroport.guest');
Route::get('/confirmation-reservation/{reservationId}', [App\Http\Controllers\ServiceController::class, 'showReservationConfirmation'])->name('confirmation-reservation');
Route::get('/aeroport-confirmation-reservation/{reservationId}', [App\Http\Controllers\AeroportController::class, 'showReservationConfirmation'])->name('aeroport-confirmation-reservation');
Route::get('/search-vehicles', [App\Http\Controllers\AeroportController::class, 'searchVehicles'])->name('search-vehicles');
Route::get('/aeroport-reservation-first', [App\Http\Controllers\AeroportController::class, 'reservationAeroportFirst'])->name('aeroports.reservations');

Route::get('/booking-daily', [App\Http\Controllers\ReservationController::class, ' daily'])->name('daily');
Route::get('/booking-transport', [App\Http\Controllers\ReservationController::class, 'transport'])->name('transport');
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/transport-aeroport', [App\Http\Controllers\AeroportController::class, 'index'])->name('aeroport');
Route::post('/booking', 'ReservationController@store')->name('reservation.store');
Route::post('/booking', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation');
Route::match(['get', 'post'], '/vehicules', [App\Http\Controllers\ServiceController::class, 'vehicules'])->name('vehicules');
Route::match(['get', 'post'], '/vehicules-aeroport', [App\Http\Controllers\AeroportController::class, 'aeroport'])->name('vehicules-aeroport');
Route::get('/vehicules-aeroport/{id}', [App\Http\Controllers\AeroportController::class, 'show'])->name('vehicules-aeroport.show');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-bookings', [App\Http\Controllers\ReservationController::class, 'getBookingByMe'])->name('booking');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
//    Route::get('/my-favorite', [App\Http\Controllers\HomeController::class, 'getFrequentlyReservedVehicles'])->name('favorites');
    Route::post('/update-profile', [App\Http\Controllers\UserController::class, 'update'])->name('update-profile');
    Route::post('/annuler-reservation/{reservation}', [App\Http\Controllers\ReservationController::class, 'annulerReservation'])->name('annuler-reservation');
    Route::post('/valider-reservations', [App\Http\Controllers\ReservationController::class, 'validerReservations'])->name('valider-reservations');
    Route::get('/valider-reservations', [App\Http\Controllers\ReservationController::class, 'getReservationEnAttente'])->name('attente-reservations');
    Route::get('/reservations-confirmees/{userId}', [App\Http\Controllers\ReservationController::class, 'getReservationConfirmee'])->name('confirme-reservations');
    Route::get('/add-vehicule-aeroport', [App\Http\Controllers\AeroportController::class, 'create'])->name('create');
    Route::post('/add-vehicule-aeroport', [App\Http\Controllers\AeroportController::class, 'store'])->name('store');

    //Route::post('/all-validate-reservations', [App\Http\Controllers\ReservationController::class, 'gReservationConfirmee'])->name('confirme-reservations');


});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
