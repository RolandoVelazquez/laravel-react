<?php

namespace App\Http\Controllers;

use App\Models\Tamano as ModelTamano;
use Illuminate\Http\Request;

class Tamano extends Controller
{
    function getTamano(){
        $tamano = ModelTamano::all();
        return view('vistas.tamano', compact('tamano'));
    }
    function getXTamano(ModelTamano $tamano){
        $nombre_tamano = $tamano->tamano;
        $perritos = $tamano->getPerritos;
        return view('vistas.perrosxtamano', compact('perritos','nombre_tamano'));
    }
}
