<?php

namespace App\Http\Controllers;

use App\Models\citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class citasController extends Controller
{
    //
    public function createCitas(Request  $request){
        //    validacion 
        // De esta forma nos aseguramos que el monto ingresado se un 
        // numero positivo 
        $validate= Validator::make($request->all(),
              [
                'persona_id'=>'required',
                'medico'=>'required',
                'fechaHConsulta'=>'required',
              ]);
              if ($validate->fails()){
                return response()->json([
                'status'=>false,
                'message'=>'Existen campos vacios',
                'errors'=>$validate->errors()
                ],401);
              }
              
                $registro = citas::create([
                    'persona_id'=>$request->persona_id,
                    'medico'=>$request->medico,
                    'fechaHConsulta'=>$request->fechaHConsulta
        
                ]);
    
             
              return response()->json([
                'message'=>'Cita creada correctamente',
                'data'=>$registro
              ],201);
            
            
    }

    public function cargarCitas(){
        $registro = citas::all();
        return response()->json(['registro'=>$registro], 200);
    }
}
