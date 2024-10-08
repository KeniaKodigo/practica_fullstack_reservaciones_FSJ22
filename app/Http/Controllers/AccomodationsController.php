<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class AccomodationsController extends Controller
{
    //metodo para obtener todos los alojamientos
    public function get_accomodations(){
        $accomodations = Accomodations::all();

        return view('pages.accomodations', array("details" => $accomodations));
    }

    //metodo para registrar un alojamiento
    public function save(Request $request){
        //validando la entrada de datos

        //se utiliza cuando trabajamos con vistas
        $request->validate([
            'accomodation' => 'required|string|max:50',
            'address' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        //subir imagen a cloudinary y lo guardamos en la carpeta "accomodations"
        $uploadImage = $request->file('image')->storeOnCloudinary('accomodations');
        //solicitamos la ruta de la imagen que se subio a cloudinary
        $urlImage = $uploadImage->getSecurePath();

        //insertarmos la informacion
        $accomodation = new Accomodations();
        $accomodation->name = $request->input('accomodation');
        $accomodation->address = $request->input('address');
        $accomodation->description = $request->input('description');
        //guardamos la ruta de la imagen
        $accomodation->image = $urlImage;
        $accomodation->save();

        //redireccionamos a la misma pagina
        return redirect()->route('listAccomodations');
    }
}
