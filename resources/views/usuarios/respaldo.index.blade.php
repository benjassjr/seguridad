<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Usuarios</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
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
  <div class="row">
    <div class="col">
      <h3>Usuarios</h3>
    </div>
  </div>

  <div class="row">
    <!--formulario-->
    <div class="col-12 col-lg-4 order-lg-1">
      <div class="card">
        <div class="card-header">
          Agregar Usuario
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
                  <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
                </div>
                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                  <button type="submit" class="btn btn-info btn-block">Aceptar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/formulario-->

    <!--tabla-->
    <div class="col-12 col-lg-8 mt-1 mt-lg-0">
      <table data-toggle="table" data-pagination="true" data-page-size="5" data-search="true"
        class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th data-sortable="true">Nº</th>
            <th data-sortable="true">Rut</th>
            <th data-sortable="true">Nombre</th>
            <th data-sortable="true">Fecha Creación</th>
            <th data-sortable="true">Rol</th>
            <th data-sortable="true">Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $num=>$usuario)
          <tr>
            <td>{{$num+1}}</td>
            <td>{{$usuario->rut}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{date('d-m-Y H:i:s',strtotime($usuario->created_at))}}</td>
            <td>{{$usuario->rol->nombre}}</td>
            <td>{{$usuario->activo?'Si':'No'}}</td>
            <td>
              <div class="d-flex justify-content-center">
                <!-- Borrar -->
                @if(Auth::user()->id!=$usuario->id)
                <span data-toggle="tooltip" data-placement="top" title="Borrar Usuario">
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                    data-target="#usuarioBorrarModal{{$usuario->id}}">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </span>
                @endif
                <!-- Borrar -->
                <!-- Editar -->
                <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-sm btn-warning mx-1"
                  data-toggle="tooltip" data-placement="top" title="Editar Usuario">
                  <i class="far fa-edit"></i>
                </a>
                <!-- Editar -->
                <!-- Activar -->
                @if(Auth::user()->id!=$usuario->id)
                <form method="POST" action="{{route('usuarios.activar',$usuario->id)}}">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top"
                    title="{{$usuario->activo?'Desactivar':'Activar'}} Usuario">
                    <i class="fas fa-user-{{$usuario->activo?'slash':'check'}}"></i>
                  </button>
                </form>
                @endif
                <!-- Activar -->
              </div>
              <!-- Modal Borrar Usuario -->
              <div class="modal fade" id="usuarioBorrarModal{{$usuario->id}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrar Usuario</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 2rem"></i>
                        ¿Desea borrar al usuario {{$usuario->nombre}}?
                      </div>
                    </div>
                    <div class="modal-footer">
                      <form method="POST" action="{{route('usuarios.destroy',$usuario->id)}}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Borrar Usuario</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>

          </tr>


          @endforeach
        </tbody>
      </table>
    </div>
    <!--/tabla-->
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
  <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
  <script src="{{asset('js/bootstrap-table-es-CL.js')}}"></script>
</body>

</html>