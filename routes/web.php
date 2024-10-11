<?php

use App\Http\Controllers\AccomodationsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/accomodations', function (){
//     return view('pages.accomodations');
// });

Route::get('/accomodations', [AccomodationsController::class, 'get_accomodations'])->name('listAccomodations');

Route::get('/bookings', [BookingsController::class, 'get_bookings_accomodation'])->name('bookingsByAccomodation');

Route::post('/save_accomodation', [AccomodationsController::class, 'save'])->name('saveAccomodation');

Route::get('/formulario', [BookingsController::class, 'getForm'])->name('formBooking');

Route::post('/save_booking', [BookingsController::class, 'save'])->name('saveBooking');

Route::patch('/status_booking/{id}', [BookingsController::class, 'updateStatus'])->name('statusBooking');

Route::get('/calendar', [CalendarController::class, 'get_calendar']);

Route::get('/reporte', [PDFController::class, 'index']);

/**
 * la funcion url() => hace referencia a la uri de la ruta
 * la funcion route() => hace referencia a la accion de una ruta y tiene un nombre
 */