<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tamano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TamanoController extends Controller
{
    function addTamano(Request $request){
        $rules = [
            'tamano'=>'required',
            'descripcion'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        Tamano::create(
            [
                'tamano'=>$request->tamano,
                'descripcion'=>$request->descripcion
            ]
        );

        return response()->json(["complete"=>true]);
    }

    function editTamano(Request $request){
        $rules = [
            'tamano'=>'required',
            'descripcion'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $tamano = Tamano::find($request->id);

        $tamano->tamano= $request->tamano;
        $tamano->descripcion = $request->descripcion;

        if ($tamano->save()){
            return response()->json(["complete"=>true]);
        }
        return response()->json(["complete"=>false]);
    }

    function deleteTamano($id){
        $tamano = Tamano::find($id);

        $tamano->delete();
        return response()->json(["complete"=>true]);
    }
}
