<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    //
    public function index()
    {
        $alumnos=Alumno::all();
        return view('layouts.alumnos',compact('alumnos'));
    }
    public function store( Request $request)
    {
        $alumno=DB::table('alumnos')->where('dni','=',$request->dni)->get();  
        if($alumno->isNotEmpty()){
           return redirect()->back()->with('success','Alumno(a) ya se encuentra registado(a)');
        }
        $nuevoAlumno=new Alumno();
        $nuevoAlumno->nombre = $request->nombre;
        $nuevoAlumno->apellido = $request->apellido;
        $nuevoAlumno->dni = $request->dni;
        $nuevoAlumno->telefono = $request->telefono;
        $nuevoAlumno->save();
        return redirect()->back()->with('success', 'Alumno(a) agredado(a) correctamente');
    }

    public function formAgregarAlumno()
    {
        return view('layouts.nuevoalumno');
    }

    public function delete(Request $request)
    {
        DB::table('alumnos')->where('id', '=', $request->id)->onDelete();
        return redirect()->back()->with('success', 'Alumno(a) eliminado(a) correctamente');
    }

    public function buscar(Request $request)
    {
        $alumnos=DB::table('alumnos')->where('dni','=',$request->dni)->get();
        if(count($alumnos)>0){
            return view('layouts.alumnos',compact('alumnos'));
        }
        return redirect()->back()->with('success','La busqueda no obtuvo resultados');
    }

    public function ver(int $id)
    {
        return DB::table('cuotas')->join('alumnos','cuotas.alumno_id','=','alumnos.id')->where('cuotas.alumno_id','=',$id)->get();
        
    }
}
