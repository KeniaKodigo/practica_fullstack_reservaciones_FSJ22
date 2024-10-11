<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function index(){

        $year = Carbon::now()->year; //fecha actual
        $date = Carbon::now();
        /**
         * whereMonth
         * whereYear
         */
        $total_bookings = Bookings::whereYear('check_out_date', $year)->sum('total_amount');

        //mostrando la info de reservaciones + alojamiento + usuario
        $detail = Bookings::join('accomodations','bookings.accomodation_id','=', 'accomodations.id')->join('users', 'bookings.user_id', '=', 'users.id')->select('bookings.*','accomodations.name as accomodation', 'users.name as user')->whereYear('check_out_date', $year)->get();

        $data = [
            'date' => $date,
            'year' => $year,
            'detail' => $detail,
            'total_bookings' => $total_bookings
        ];

        //indicamos la vista para el pdf
        $pdf = FacadePdf::loadView('pages.pdf', $data);
        //visualizar el pdf
        /**
         * download => el pdf se descarga de manera automatica
         * stream => permite visualizarlo y si en dado caso descargarlo
         */
        return $pdf->stream('reservaciones.pdf');
    }
}
