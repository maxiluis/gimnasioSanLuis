@extends("layouts.administrador")
@section('title', 'Nuevo Profesor')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <form method="POST" action="{{url('/agregarProfesor')}}">
                @csrf
                <div class="form-group">
                    <br>
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="nombre" class="form-control" type="text" placeholder="Nombre">
                    <br>
                    <label class="label">Apellido</label>
                    <input required autocomplete="off" name="apellido" class="form-control" type="text" placeholder="Apellido">
                    <br>
                    <label class="dni">DNI</label>
                    <input required autocomplete="off" name="dni" class="form-control" type="number" placeholder="DNI">
                    <br>
                    <label class="label">Telefono</label>
                    <input required autocomplete="off" name="telefono" class="form-control" type="number" placeholder="Telefono">
                </div>
                <br>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-id-card" aria-hidden="true"></i> Agregar Profe
                </button>
                <a class="btn btn-primary" href="{{url("profesores")}}"><i class="fa fa-list" aria-hidden="true"></i> Volver al listado</a>
            </form>
        </div>
    </div>
</div>
<br>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ \Session::get('success')}}</li>
        </ul>
    </div>
@endif
@endsection