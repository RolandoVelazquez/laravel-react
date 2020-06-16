<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Raza as ModelRaza;
use Illuminate\Http\Request;

class Raza extends Controller
{
    function getRazas(){
        $razas = ModelRaza::all();
        return response()->json($razas);
    }
    function getInfoRazas(){
        $razas = ModelRaza::all('id', 'raza');
       foreach ($razas as $raza){
           foreach ($raza->getPerritos as $perros){
               $perros->getSexo;
               $perros->getRaza;
               $perros->getTamano;
           }
       }

        return response()->json($razas);
    }
}
