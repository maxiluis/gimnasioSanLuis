@extends("layouts.administrador")
@section('title', 'Lista de Profesores')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{url('nuevoprofesor')}}" class="btn btn-success mb-2">
                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Profe
            </a>
            <br>
            <table class="table  table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $p)
                        <tr>
                            <td>{{$p->nombre." ".$p->apellido}}</td>
                            <td>{{$p->dni}}</td>
                            <td>{{$p->telefono}}</td>
                            <td>
                                <a class="btn btn-warning" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{url('borrarProfesor/'.$p->id)}}" method="post">
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
</div>
<br>
@if (\Session::has('success'))
    <div class="alert alert-success">
        {{\Session::get('success')}}
    </div>
@endif
@endsection