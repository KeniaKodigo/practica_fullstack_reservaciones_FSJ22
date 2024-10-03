<?php

use App\Http\Controllers\AccomodationsController;
use App\Http\Controllers\BookingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/accomodations', function (){
//     return view('pages.accomodations');
// });

Route::get('/accomodations', [AccomodationsController::class, 'get_accomodations']);

Route::get('/bookings', [BookingsController::class, 'get_bookings_accomodation'])->name('bookingsByAccomodation');

/**
 * la funcion url() => hace referencia a la uri de la ruta
 * la funcion route() => hace referencia a la accion de una ruta y tiene un nombre
 */