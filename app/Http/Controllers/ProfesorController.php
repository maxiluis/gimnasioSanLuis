<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProfesorController extends Controller
{
    //
    public function index()
    {
        # code...
        $profesores=Profesor::all();
        return view('layouts.profesores',compact('profesores'));
    }

    public function formAgregarProfesor()
    {
        # code...
        return view('layouts.nuevoprofesor');
    }

    public function store(Request $request)
    {
        $profesor=DB::table('profesors')->where('dni','=',$request->dni)->get();  
        if($profesor->isNotEmpty()){
           return redirect()->back()->with('success','Alumno(a) ya se encuentra registado(a)');
        }
            $nuevoProfesor= new Profesor();
            $nuevoProfesor->nombre=$request->nombre;
            $nuevoProfesor->apellido=$request->apellido;
            $nuevoProfesor->dni=$request->dni;
            $nuevoProfesor->telefono=$request->telefono;
            $nuevoProfesor->save();
            return redirect()->back()->with('success', 'Profesor(a) agredado(a) correctamente');
        
         
    }

    public function delete(Request $request)
    {
        DB::table('profesors')->where('id', '=', $request->id)->delete();
        return redirect()->back()->with('success', 'Profesor(a) eliminado(a) correctamente');
    }
}
