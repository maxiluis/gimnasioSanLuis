@extends("layouts.administrador")
@section('title', 'Listado de Alumnos')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="row">
                <div class="col-sm">
                    <a href="{{url('nuevoAlumno')}}" class="btn btn-success mb-2">Agregar Alumno</a>
                </div>
                <div class="col-sm">
                    <form method="post" action="{{url('buscarAlumno')}}">
                    @csrf
                    
                    <div class="form-group">
                    </div>
                        <input required autocomplete="off" name="dni" class="form-control mb-2" type="number" placeholder="DNI">
                    </div>
                    <div class="col-sm">
                    <button type="submit" class="btn btn-danger">Buscar Alumno</button>
                    </div>
            </form>
            <br>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Nuevo Pago</th>
                        <th>Ficha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $a)
                        <tr>
                            <td>{{$a->nombre." ".$a->apellido}}</td>
                            <td>{{$a->dni}}</td>
                            <td>{{$a->telefono}}</td>
                            <td>
                                <a class="btn btn-warning" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{url('borrarAlumno/'.$a->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{url('agregarPago/'.$a->id)}}" class="btn btn-success mb-2">
                                    <i class="fa fa-comment-dollar"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('verficha/'.$a->id)}}" class="btn btn-info mb-2">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
@endsection