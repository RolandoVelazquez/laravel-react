<?php

namespace App\Http\Controllers;

use App\Models\Sexo as ModelSexo;
use Illuminate\Http\Request;

class Sexo extends Controller
{
    function getSexo(){
        $sexos = ModelSexo::all();
        return view('vistas.sexo', compact('sexos'));
    }
    function getXSexo(ModelSexo $sexo){
        $nombre_sexo = $sexo->sexo;
        $perritos = $sexo->getPerritos;
        return view('vistas.perrosxsexo', compact('perritos','nombre_sexo'));
    }
}
