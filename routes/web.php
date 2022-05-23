<?php

use App\Http\Controllers\AdministradorContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\ProfesorController;
use App\Models\Clase;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ReservaController::class, 'index']);
Route::post('/reserva',[ReservaController::class, 'confirmaReserva']);
Route::get('/admin',[AlumnoController::class,'index']);
Route::get('/profesores',[ProfesorController::class,'index']);
Route::get('/nuevoprofesor',[ProfesorController::class,'formAgregarProfesor']);
Route::post('/agregarProfesor',[ProfesorController::class,'store']);
Route::post('/borrarProfesor/{id}',[ProfesorController::class,'delete']);
Route::get('/alumnos',[AlumnoController::class,'index']);
Route::get('/nuevoAlumno',[AlumnoController::class,'formAgregarAlumno']);
Route::post('/agregarAlumno',[AlumnoController::class,'store']);
Route::post('/borrarAlumno/{id}',[AlumnoController::class,'delete']);
Route::post('/buscarAlumno',[AlumnoController::class,'buscar']);
Route::get('/agregarPago/{alumno_id}',[CuotaController::class,'formAgregarPago']);
Route::post('/nuevopago',[CuotaController::class,'store']);
Route::get('/verficha/{id}',[AlumnoController::class,'ver']);
Route::get('clases',[ClaseController::class,'index']);
Route::get('agregarClases',[ClaseController::class,'formAgregarClase']);
Route::post('nuevaClase',[ClaseController::class,'store']);
Route::get('listarReservas',[ReservaController::class,'listar']);
Route::post('buscarReserva',[ReservaController::class,'buscar']);
