@extends("layouts.administrador")
@section('title', 'Clases')
@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{url('/agregarClases')}}" class="btn btn-success mb-2">Agregar Clase</a>
        <br>
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
                <th class="text-center">Clase</th>
                <th class="text-center">Horario</th>
                <th class="text-center">Profesor</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clases as $clase)
                <tr>
                    <td>{{$clase->descripcion}}</td>
                    <td>{{$clase->horario}}</td>
                    <td>{{$clase->nombre." ".$clase->apellido}}</td>
                    <td>
                        <a class="btn btn-warning" href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{}}" method="post">
                           @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

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