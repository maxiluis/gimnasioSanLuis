<!DOCTYPE html>
<html lang="es">
   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <title>@yield('INICIO')</title>
</head>
<body>
    <header class="container-fluid bg-danger d-flex justify-content-center">
        <p class="text-light mb-0 p-2 fs-6">Contacto: 2664562211</p>
    </header>
    <br>

    <form class="container " method="post" action="reserva">
        @csrf
        
        <div class="form-group">
            <label for="dni">Ingrese DNI</label>
            <input type="dni" name="dni" class="form-control" id="dni" placeholder="Ingrese DNI">
        </div>
        <div class="form-group">
            <label for="clase">Selecciona tu clase</label>
            <select class="form-control" id="clase" name="clase">
                @foreach ($clases as $c)
                    <option value="{{$c->id}}">{{$c->nombre." ".$c->horario}}</option>
                @endforeach    
            </select>
        </div>
        <div class="form-group">
            <label class="input-group-btn" for="txtDate">Fecha</label>
            <input id="txtDate" type="text" name="fecha" class="form-control date-input" readonly="readonly" />
            
        </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>


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
@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

    
 </body>
</html>