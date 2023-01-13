@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Usuarios</title>


</head>

<body>
  <!--Usuario-->
  <div class="row mr-0 text-right">
    <div class="col-12">
      <!-- Identificacion de usuario -->
      Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
    </div>
  </div>
  <!--Usuario-->
  <div class="row">
    <div class="col">
      <!-- Titulo -->
      <h3>Actividad Usuarios</h3>
    </div>
  </div>

  <div class="row">

    <!--tabla-->
    <div class="col-12 col-lg-8 mt-1 mt-lg-0 offset-lg-1">
      <table data-toggle="table" data-pagination="true" data-page-size="10" data-search="true"
        class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <!-- Encabezados -->
            <th data-sortable="true">Nº</th>
            <th data-sortable="true">Rut</th>
            <th data-sortable="true">Nombre</th>
            <th data-sortable="true">Actividad</th>
            <th data-sortable="true">IP</th>
            <th data-sortable="true">Mac</th>
            <th>Activar/Desactivar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $num=>$usuario)
          <tr>
            <!-- Filas -->
            <td>{{$num+1}}</td>
            <td>{{$usuario->rut}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{date('d-m-Y H:i:s',strtotime($usuario->ultimo_login))}}</td>
            <td>{{$ip}}</td>
            <td>{{$desktop}}</td>
            <td>
              <div class="d-flex justify-content-center">


                <!-- Activar -->
                @if(Auth::user()->id!=$usuario->id)
                <form method="POST" action="{{route('usuarios.activaractividad',$usuario->id)}}">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top"
                    title="{{$usuario->activo?'Desactivar':'Activar'}} Usuario">
                    <i class="fas fa-user-{{$usuario->activo?'slash':'check'}}"></i>
                  </button>
                </form>
                @endif
                <!-- Activar -->
              </div>
            </td>

          </tr>


          @endforeach
        </tbody>
      </table>
    </div>
    <!--/tabla-->
  </div>

</body>

</html>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
  integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('js')
<script>
< script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin = "anonymous" >
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
  integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="{{asset('js/bootstrap-table-es-CL.js')}}">
</script>
</script>
@stop
