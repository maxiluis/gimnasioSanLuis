@extends("layouts.administrador")
@section('title', 'Nuevo Alumno')
@section('content')
<div class="row">
    <div class="col-12">
        
        <form method="POST" action="{{url('/agregarAlumno')}}">
            @csrf
            <div class="form-group">
                <br>
                <label class="label">Nombre Alumno</label>
                <input required autocomplete="off" name="nombre" class="form-control"
                       type="text" placeholder="Nombre">
                       <br>
                       <label class="label">Apellido Alumno</label>
                <input required autocomplete="off" name="apellido" class="form-control"
                       type="text" placeholder="Apellido">
                       <br>
                       <label class="dni">DNI Alumno</label>
                <input required autocomplete="off" name="dni" class="form-control"
                       type="text" placeholder="DNI">
                       <br>
                       <label class="label">Telefono Alumno</label>
                <input required autocomplete="off" name="telefono" class="form-control"
                       type="text" placeholder="Telefono">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a class="btn btn-primary" href="{{url("alumnos")}}">Volver al listado</a>
        </form>
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
@endsection