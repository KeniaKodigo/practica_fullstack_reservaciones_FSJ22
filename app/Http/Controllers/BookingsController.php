<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    //metodo para mostrar reservaciones por alojamiento
    public function get_bookings_accomodation(Request $request){
        //consulta para mostrar el id y el nombre del alojamiento
        $accomodations = Accomodations::select('id','name')->get();

        if($request->has('select_accomodations')){
            $id_accomodation = $request->input('select_accomodations');

            $bookings = Bookings::join('accomodations','bookings.accomodation_id','=','accomodations.id')->where('bookings.accomodation_id',$id_accomodation)->select('bookings.*','accomodations.name as accomodation')->get();
        }else{
            $bookings = [];
        }

        return view('pages.bookings', array(
            "accomodations" => $accomodations,
            "bookings" => $bookings
        ));
    }
}
