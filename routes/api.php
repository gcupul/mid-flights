<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\AirportController;
use App\Http\Controllers\API\FlightController;
use App\Http\Controllers\API\SeatController;
use App\Http\Controllers\API\ReservationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::get('airports', AirportController::class); //obtiene la lista de los aeropuertos
Route::post('flights', FlightController::class); // obtiene la lista de los vuelos relacionados con el origen y destino seleccionado

Route::middleware('auth:sanctum')->group( function () {
    Route::post('seats', SeatController::class);
    Route::controller(ReservationController::class)->group(function(){
        Route::post('reservation', 'reservation');
        Route::post('payReservation', 'payReservation');
    });
});
