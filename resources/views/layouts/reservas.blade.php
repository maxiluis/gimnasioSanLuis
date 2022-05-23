@extends("layouts.administrador")
@section('title', 'Listado de Alumnos')
@section('content')
<div class="container">
<div class="row">
   
        <form method="post" action="{{url('buscarReserva')}}">
            @csrf
            <div class="col-sm">
            <div class="form-group">
                    <label class="label">Seleccione clase</label>
                    <select name="clase" id="clase" class="form-control">
                        @foreach ($clases as $clase)
                            <option value="{{$clase->id}}">{{$clase->descripcion}}</option>    
                        @endforeach
            </div>
                    </select>
                    <label class="input-group-btn" for="txtDate">Fecha</label>
            <input id="txtDate" type="text" name="fecha" class="form-control date-input" readonly="readonly" />
            </div>
            <button type="submit" class="btn btn-danger">Busca Reservas</button>
        </form>
        <br>
        <h5>Reservas del dia: </h5><h6>{{date('Y-m-d')}}</h6>
        <h5>Cantidad de inscriptos<h6>{{$cantidad}}</h6>
        <h5>Lugares disponibles<h6>{{$cantidad}}</h6>    
        @if(Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de clase</th>
                <th class="text-center">Fecha de reserva</th>
                <th class="text-center">Eliminar</th>
            </tr>
            </thead>
            <tbody>
                @isset($reservas)
                @foreach($reservas as $reserva)
                <tr>
                    <td>{{$reserva->nombre." ".$reserva->apellido}}</td>
                    <td>{{$reserva->fecha}}</td>
                    <td>{{$reserva->created_at}}</td>
                    <td>
                        <a class="btn btn-warning" href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="" method="post">
                           @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
                @endisset
                
              
            </tbody>
        </table>

    </div>
</div>
</div>
<br>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<script type="text/javascript">
    $(function () {
        $("#txtDate").datepicker({
            format: "yyyy-mm-dd",
            locale: 'es',
            language: 'es',
            startDate: "0",
            todayHighlight: "true",
            autoclose:"true",
            daysOfWeekDisabled: [0, 6]});
    });
</script>
@endsection