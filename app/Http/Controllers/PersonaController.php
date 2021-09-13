<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrarNombre($nombre){
        return "Nombre : ".ucfirst($nombre);
    }
}
