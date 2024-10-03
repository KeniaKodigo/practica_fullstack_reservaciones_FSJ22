<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use Illuminate\Http\Request;

class AccomodationsController extends Controller
{
    //metodo para obtener todos los alojamientos
    public function get_accomodations(){
        $accomodations = Accomodations::all();

        return view('pages.accomodations', array("details" => $accomodations));
    }
}
