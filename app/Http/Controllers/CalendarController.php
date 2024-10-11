<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;

class CalendarController extends Controller
{
    public function get_calendar(){
        //obtener todas las reservaciones confirmadas
        //nombre del alojamiento y el monto total
        $calendar = Bookings::join('accomodations','bookings.accomodation_id','=', 'accomodations.id')->select('bookings.*','accomodations.name as accomodation')->where('status','CONFIRMED')->get();

        //guardando reservaciones para el calendario
        $bookings = [];
        foreach($calendar as $item){
            $bookings[] = [
                'title' => $item->booking,
                'start' => $item->check_in_date . 'T11:00:00',
                'end' => $item->check_out_date . 'T13::59:59',
                'total_amount' => $item->total_amount,
                'accomodation' => $item->accomodation
            ];
        }

        //return view('pages.calendar', array('bookings' => $bookings));
        return view('pages.calendar', compact('bookings'));
    }
}
