<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Clase;
use App\Models\Reserva;
use Hamcrest\Core\HasToString;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    //
    public function index()
    {
        $clases=Clase::all();
        return view('layouts.plantilla',compact('clases'));
    }

    public function confirmaReserva(Request $request)
    {  
        $cantidadAlumnos = count( DB::table('reservas')->where('clase_id','=',$request->clase)->where('fecha','=',$request->fecha)->get()); 
        $cupoClase =  DB::table('clases')->where('id','=',$request->clase)->get();
        if ($cantidadAlumnos >= $cupoClase[0]->cupo) {
            return redirect()->back()->with('success','La clase se encuentra llena');
        } else {
            if (empty(DB::table('alumnos')->where('dni', '=', $request->dni)->first())) { //controla que exista alumno
                return redirect()->back()->with('success','El DNI no se encuentra registrado');
            }else{
                $alumno = DB::table('alumnos')->where('dni', '=', $request->dni)->first();
                $cuota = DB::table('cuotas')->where('alumno_id','=',$alumno->id)->orderBy('id','asc')->take(1)->get();
                $cuota->toArray();
               // return $cuota[0]->vencimiento;
                //return  $request->fecha;
                if ($request->fecha > $cuota[0]->vencimiento) { //controla que el pase no este vencido
                    return redirect()->back()->with('success','A la fecha seleccionada tu pase esta vencido');
                }else {
                   $reservas =  DB::table('reservas')->where('alumno_id','=',$alumno->id)->where('fecha','=',$request->fecha)->get();        
                   foreach($reservas as $reserva){ //controlo que el alumno no este 2 veces en la misma clase
                        if($reserva->clase_id == $request->clase){
                            return redirect()->back()->with('success','Ya te inscribiste a la clase seleccionada');
                        }
                   }
                    $reserva = new Reserva();
                    $reserva->fecha = $request->fecha;
                    $reserva->alumno_id = $alumno->id;
                    $reserva->clase_id= $request->clase;
                    $reserva->save();
                    return redirect()->back()->with('success','Inscripcion Correcta');
                }           
            }            
        }
    }

    public function listar()
    {
        $reservas = DB::table('reservas')->join('clases','reservas.clase_id','=','clases.id')->join('alumnos','reservas.alumno_id','=','alumnos.id')
        ->where('fecha','=',date('Y-m-d'))->get();
       $clases = DB::table('clases')->get();
       $cantidad=count($reservas);
       return view('layouts.reservas',compact('reservas','clases','cantidad'));
    }

    public function buscar(Request $request)
    {
        $reservas = DB::table('reservas')->join('clases','reservas.clase_id','=','clases.id')->join('alumnos','reservas.alumno_id','=','alumnos.id')
        ->where('fecha','=',$request->fecha)->where('clase_id','=',$request->clase)->get();
        $cantidad = count($reservas);
        $clases = DB::table('clases')->get();
        return view('layouts.reservas',compact('reservas','clases','cantidad'));
    }
}
