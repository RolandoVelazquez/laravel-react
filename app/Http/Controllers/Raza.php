<?php

namespace App\Http\Controllers;

use App\Models\Perritos;
use App\Models\Raza as ModelRaza;
use Illuminate\Http\Request;

class Raza extends Controller
{
    function getRazas(){
        $razas = ModelRaza::all();
        return view('vistas.razas', compact('razas'));
    }
    function getXRaza(ModelRaza $raza){
        $nombre_raza = $raza->raza;
        $perritos = $raza->getPerritos;
        return view('vistas.perrosxraza', compact('perritos','nombre_raza'));
    }
}
