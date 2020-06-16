<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Perritos;
use App\Models\Raza as ModelRaza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    function addPerrito(Request $request){
        $rules = [
            'raza_id' => 'required',
            'sexo' => 'required',
            'nombre' => 'required',
            'tamano_id' => 'required',
            'fecha_nacimiento' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        Perritos::create(
            [
                'raza_id'=>intval($request->raza_id),
                'sexo_id'=>intval($request->sexo),
                'nombre'=>$request->nombre,
                'tamano_id'=>intval($request->tamano_id),
                'fecha_nacimiento'=>$request->fecha_nacimiento,
                'senas_particulares'=>$request->senas_particulares,
            ]
        );
        return response()->json(["complete"=>true]);
    }
    function editPerrito(Request $request){
        $rules = [
            'raza_id' => 'required',
            'sexo' => 'required',
            'nombre' => 'required',
            'tamano_id' => 'required',
            'fecha_nacimiento' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $perrito = Perritos::find($request->idPerrito);
        $perrito->raza_id= intval($request->raza_id);
        $perrito->sexo_id=intval($request->sexo);
        $perrito->nombre=$request->nombre;
        $perrito->tamano_id=intval($request->tamano_id);
        $perrito->fecha_nacimiento=$request->fecha_nacimiento;
        $perrito->senas_particulares=$request->senas_particulares;
        if ($perrito->save()){
            return response()->json(["complete"=>true]);
        }
        return response()->json(["complete"=>false]);
    }
    function deletePerrito($id){
        $perrito = Perritos::find($id);
        $perrito->delete();
        return response()->json(["complete"=>true]);
    }
}
