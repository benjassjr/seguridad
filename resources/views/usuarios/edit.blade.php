<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <!--Usuario-->
  <div class="row m-0" style="background-color: white; color: #5722e9">
    <div class="col-8">
      Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
    </div>
    <div class="col-3 text-right d-none d-lg-block">
      <small>Ultimo inicio de sesion: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las
        {{date('H:i:s',strtotime(Auth::user()->ultimo_login))}}</small>
    </div>
    <div class="col-1 text-right d-none d-lg-block">
      <a style="color: #5722e9" href="{{route('usuarios.logout')}}">Cerrar Sesión</a>
    </div>
  </div>
  <!--Usuario-->
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5722e9">
    <img class="img-navbar" src="{{ asset('images/logo.png') }}" width="70" height="70" style="margin-right: 1rem">
    <a class="navbar-brand" href="{{route('home.index')}}">Seguridad</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item @if(Route::current()->getName()=='home.index') active @endif">
          <a class="nav-link" href="{{route('home.index')}}">Inicio</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Configuración
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Gate::allows('usuarios-listar'))
            <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
            @endif
            <a class="dropdown-item" href="https://lacruz.cl/">Municipalidad de la Cruz</a>
            <a class="dropdown-item d-lg-none" href="{{route('usuarios.logout')}}">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <!--Navbar-->
  <h3>Editar Usuario</h3>
  <hr>
  <div class="row">

    <!--Formulario edicion-->
    <div class="col-lg-6 offset-lg-3">
      <div class="card">
        <div class="card-header">Editar Usuario</div>
        <div class="card-body">
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
          <form method="POST" action="{{route('usuarios.update',$usuario->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" required name="nombre"
                class="form-control @error('nombre') is-invalid @enderror" value="{{$usuario->nombre}}">
            </div>
            <div class="form-group">
              <label for="rut">Rut:</label>
              <input type="rut" id="rut" name="rut" required class="form-control @error('rut') is-invalid @enderror"
                value="{{$usuario->rut}}">
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" id="password" required name="password"
                class="form-control @error('password') is-invalid @enderror">
            </div>
            <div class="form-group">
              <label for="password2">Repetir Contraseña:</label>
              <input type="password" id="password2" required name="password2"
                class="form-control @error('password2') is-invalid @enderror">
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
                  <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
                </div>
                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                  <button type="submit" class="btn btn-info btn-block">Editar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--Formulario edicion-->
  </div>
  <div class="row">
    <div class="col">
      <a href="{{route('usuarios.index')}}" class="btn btn-info">Volver a Usuarios</a>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
  </script>
</body>

</html>