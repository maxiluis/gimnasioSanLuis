<?php

namespace App\Http\Controllers;
use App\Models\Clase;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaseController extends Controller
{
    public function index()
    {
        
        $clases= DB::table('clases')->join('profesors','clases.profesor_id','=','profesors.id')->get();
        return view('layouts.clases',compact('clases'));
        
    }

    public function formAgregarClase()
    {
        $profesores=Profesor::all();
        return view('layouts.nuevaclase',compact('profesores'));
    }

    public function store(Request $request){
        $clase = new Clase();
        $clase->descripcion=$request->descripcion;
        $clase->horario=$request->horario;
        $clase->profesor_id=$request->profesor;
        $clase->cupo=$request->cupo;
        $clase->save();
        return redirect(url('/clases'));
    }



}
