<?php

use App\Http\Controllers\citasController;
use App\Http\Controllers\personaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/addCreate',[personaController::class, 'createPersona']); //crear una persona
Route::post('addCitas',[citasController::class, 'createCitas']);//agregar cita a la base de datos 
Route::get('/cargarDoc',[personaController::class, 'traerDoc']);//cargar los doctores
Route::get('/cargarPacientes',[personaController::class, 'traerPacientes']);//cargar los pacientes
Route::get('/cargarCitas',[citasController::class,'cargarCitas']);//carga las citas del dia
Route::get('/cargarEspecialidad',[personaController::class, 'traerEspecialidad']);//carga las especialdades
