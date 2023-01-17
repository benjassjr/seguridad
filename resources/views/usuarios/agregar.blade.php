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
  <title>Agregar Usuario</title>


</head>

<body>
  <!--Usuario-->
  <div class="row mr-0 text-right">
    <div class="col-12">
      Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
    </div>
  </div>
  <!--Usuario-->
  <div class="row">
    <div class="col">
      <h3>Agregar Usuario</h3>
    </div>
  </div>
  <br> <br>
  <div class="row">
    <!--formulario-->
    <div class="col-12 col-lg-4 order-lg-1 offset-lg-4">
      <div class="card">
        <div class="card-header bg-dark">
          <h4>Añadir Usuario</h4>
        </div>
        <div class="card-body">
          <!--errores-->
          @if ($errors->any())
          <div class="alert alert-warning">
            <p>Por favor solucione los siguientes problemas:</p>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <!--/errores-->

          <form method="POST" action="{{route('usuarios.store')}}">
            @csrf
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" placeholder="Indique su nombre" name="nombre" min="3" required
                class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
            </div>
            <div class="form-group">
              <label for="rut">Rut:</label>
              <input type="rut" id="rut" name="rut"
                placeholder="Indique RUT sin puntos, con guión y con digito verificador" required
                class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" id="password" placeholder="Contraseña" required name="password" min="3"
                class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
            </div>
            <div class="form-group">
              <label for="password2">Repetir Contraseña:</label>
              <input type="password" id="password2" placeholder="Repita su contraseña" required name="password2" min="3"
                class="form-control @error('password2') is-invalid @enderror" value="{{old('password2')}}">
            </div>
            <div class="form-group">
              <label for="rol">Rol:</label>
              <select id="rol" name="rol" class="form-control">
                @foreach ($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                  <button type="reset" class="btn btn-secondary btn-block">Cancelar</button>
                </div>
                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                  <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/formulario-->
  </div>
  <div class="row">
    <div class="col">
      <a href="{{route('usuarios.index')}}" class="btn btn-info">Volver a Usuarios</a>
    </div>
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
