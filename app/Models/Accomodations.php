<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodations extends Model
{
    use HasFactory;
    //asignamos el nombre de la tabla de la bd
    protected $table = "accomodations";
}
