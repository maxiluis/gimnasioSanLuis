<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CuotaController extends Controller
{
    //
    public function formAgregarPago(int $alumno_id)
    {
        //$cuotas= DB::table('cuotas')->join('alumnos','cuotas.alumno_id','=','alumnos.id')->where('cuotas.alumno_id','=',$alumno_id)->get();
        $cuotas=DB::table('alumnos')->where('id','=',$alumno_id)->get();
        return view('layouts.cuotasalumno',compact('cuotas'));
        //return $cuotas;
    }

    public function store(Request $request)
    {
        $cuota = new Cuota();
        $cuota->vencimiento=$request->vencimiento;
        $cuota->fechapago=date('Y-m-d');
        $cuota->descripcion=$request->descripcion;
        $cuota->precio=$request->precio;
        $cuota->alumno_id=$request->alumno;
        $cuota->save();
        return redirect()->back()->with('success','Cuota actualizada');
    }

    public function ver(int $id)
    {
        return DB::table('cuotas')->join('alumnos','cuotas.alumno_id','=','alumnos.id')->where('cuotas.alumno_id','=',$id)->get();
        
    }


}
