@extends("layouts.administrador")
@section('title', 'Pagos')
@section('content')
<div class="row">
   

    <div class="col-12">
        <form method="POST" action="{{url('/nuevopago')}}">
            @csrf
            <div class="form-group">
                <br>
                @foreach ($cuotas as $item)
                <label class="label">Nombre Alumno</label>
                <input name="nombre" class="form-control"
                       type="text" value="{{$item->nombre." ".$item->apellido}}" disabled >
                       <br>
                       <label class="label">DNI Alumno</label>
                <input name="dni" class="form-control"
                       type="text" value="{{$item->dni}}" disabled >
                       <label class="label">Codigo Interno</label>
                <input name="alumno" id="alumno" class="form-control"
                       type="text" value="{{$item->id}}" readonly >
                       <br>
                       <label class="label">Descripcion</label>
                        <select name="descripcion" id="descripcion" class="form-control">
                            <option value="2">2 clases</option>
                            <option value="3">3 clases</option>
                            <option value="5">5 clases</option>
                            <option value="8">8 clases</option>
                            <option value="12">12 clases</option>
                            <option value="20">20 clases</option>
                            <option value="30">30 clases</option>
                        </select>
                        <br>
                       <label class="dni">Dinero</label>
                <input required autocomplete="off" name="precio" class="form-control"
                       type="text" placeholder="Ingrese dinero">
                       <br>
                       <label class="label">Vencimiento</label>
                        <input id="txtDate" type="text" name="vencimiento" class="form-control date-input" readonly="readonly" />
                      
                
            </div>
            <br>
            @endforeach
            <button type="submit" class="btn btn-success">Actualizar Cuota</button>
        </form>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
</div>
<br>
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