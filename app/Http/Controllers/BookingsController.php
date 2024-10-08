<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Bookings;
use App\Models\User;
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

    //metodo para retornar el formulario de registro
    public function getForm(){
        //retornamos la vista y traemos la informacion de los alojamientos y usuarios
        $accomodations = Accomodations::select('id','name as accomodation')->get();
        $users = User::select('id','name as user')->get();

        //dd($accomodations);
        //$saludo = "Hola mundo!";

        return view('pages.register_booking', array(
            'accomodations' => $accomodations,
            'users' => $users
        ));
    }

    //metodo para guardar la reservacion
    public function save(Request $request){

        //se utiliza cuando trabajamos con vistas
        $request->validate([
            'booking' => 'required|string|max:10',
            'in_date' => 'required|date_format:Y-m-d',
            'out_date' => 'required|date_format:Y-m-d|after_or_equal:in_date',
            'total_amount' => 'required|numeric',
            'accomodation' => 'required',
            'user' => 'required'
        ]);
    }
}
