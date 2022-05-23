@extends("layouts.administrador")
@section('title', 'Nuevo Alumno')
@section('content')
<div class="row">
    <div class="col-12">
        
        <form method="POST" action="{{url('/nuevaClase')}}">
            @csrf
            <div class="form-group">
                <br>
                <label class="label">Clase</label>
                <input required autocomplete="off" name="descripcion" class="form-control"
                       type="text" placeholder="Clase">
                       <br>
                       <label class="label">Cupo</label>
                       <input required autocomplete="off" name="cupo" class="form-control"
                              type="text" placeholder="Cupo">
                       <label class="label">Descripcion</label>
                <input required autocomplete="off" name="horario" class="form-control"
                       type="text" placeholder="Horario">
                       <br>
                       <label class="dni">Profesor</label>
                       <select name="profesor" id="profesor" class="form-control">
                           @foreach ($profesores as $profesor)
                               <option value="{{$profesor->id}}">{{$profesor->nombre." ".$profesor->apellido}}</option>
                           @endforeach
                       </select>

            </div>
            <br>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a class="btn btn-primary" href="{{url("clases")}}">Volver al listado</a>
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