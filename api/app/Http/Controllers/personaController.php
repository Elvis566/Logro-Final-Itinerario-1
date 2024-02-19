<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class personaController extends Controller
{
    //
    public function createPersona(Request  $request) {
        //    validacion 
        // De esta forma nos aseguramos que el monto ingresado se un 
        // numero positivo 
        $validate= Validator::make($request->all(),
              [
                'nombre'=>'required',
                'apellido'=>'required',
                'DNI'=>'required',
                'telefono'=>'required',
                'email'=>'required|email|unique:personas,email',
                'especialidad'=>'',
                'tipos_personas'=>'required',
              ]);
              if ($validate->fails()){
                return response()->json([
                'status'=>false,
                'message'=>'Existen campos vacios',
                'errors'=>$validate->errors()
                ],401);
              }
              
                $registro = personas::create([
                    'nombre'=>$request->nombre,
                    'apellido'=>$request->apellido,
                    'DNI'=>$request->DNI,
                    'telefono'=>$request->telefono,
                    'email'=>$request->email,
                    'especialidad'=>$request->especialidad,
                    'tipos_personas'=>$request->tipos_personas
        
                ]);
    
             
              return response()->json([
                'message'=>'Persona creada correctamente',
                'data'=>$registro
              ],201);
            
            
        }

        public function traerDoc(){
            
            // Realizar la búsqueda de registros con la fecha proporcionada
            $registros = personas::where('tipos_personas', 2)->get();
            return response()->json(['doctores' => $registros], 200);
        }

        public function traerEspecialidad(){
            
          $especialidad = DB::table('personas')
          ->where('personas.tipos_personas', 2)
          ->groupBy('personas.especialidad')
          ->orderBy('personas.especialidad')
          ->select('personas.especialidad')
          ->get();
      return response()->json(['datos'=> $especialidad]);
      }

        public function traerPacientes(){
            
          // Realizar la búsqueda de registros con la fecha proporcionada
          $registros = personas::where('tipos_personas', 1)->get();
          return response()->json(['pacientes' => $registros], 200);
      }
        
}
