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
Route::get('/booking-daily', [App\Http\Controllers\ReservationController::class, 'daily'])->name('daily');
Route::get('/booking-transport', [App\Http\Controllers\ReservationController::class, 'transport'])->name('transport');
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/transport-aeroport', [App\Http\Controllers\AeroportController::class, 'index'])->name('aeroport');
Route::post('/booking', 'ReservationController@store')->name('reservation.store');
Route::post('/booking', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
