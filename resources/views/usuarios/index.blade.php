@extends('layouts/master')

@section('hojas-estilo')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js">
<link rel="stylesheet" type="text/css"
  href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('contenido-principal')
<!--Usuario-->
<div class="row mr-0 text-right">
  <div class="col-12">
    Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
  </div>
</div>
<!--Usuario-->

<div class="row mt-3 mt-lg-0">
  <div class="col">
    <h3>Usuarios</h3>
  </div>
</div>

<div class="row">
  <div class="col">
    <a href="{{route('agregar.index')}}" class="btn btn-success ml-lg-5 mt-lg-5 mt-4 mb-4"> <i class="fas fa-plus"></i>
      Agregar Usuario
    </a>
  </div>
</div>
<div class="row">
  <!--tabla-->
  <div class="col-12 col-lg-8 mt-1 offset-lg-1 mt-lg-0">
    <table id="datatable" data-toggle="table" data-pagination="true" data-page-size="10" data-search="true"
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
          <td data-toggle="modal" data-target="#usuarioEditarModal{{$usuario->id}}">{{$usuario->rut}}</td>
          <td data-toggle="modal" data-target="#usuarioEditarModal{{$usuario->id}}">{{$usuario->nombre}}</td>
          <td data-toggle="modal" data-target="#usuarioEditarModal{{$usuario->id}}">
            {{date('d-m-Y H:i:s',strtotime($usuario->created_at))}}</td>
          <td data-toggle="modal" data-target="#usuarioEditarModal{{$usuario->id}}">{{$usuario->rol->nombre}}</td>
          <td data-toggle="modal" data-target="#usuarioEditarModal{{$usuario->id}}">{{$usuario->activo?'Si':'No'}}
          </td>
          <td>
            <div class="d-flex justify-content-center">
              <!-- Borrar -->
              @if(Auth::user()->id!=$usuario->id)
              <span data-toggle="tooltip" data-placement="top" title="Borrar Usuario">
                <button type="button" class="btn btn-sm btn-danger mx-1" data-toggle="modal"
                  data-target="#usuarioBorrarModal{{$usuario->id}}">
                  <i class="far fa-trash-alt"></i>
                </button>
              </span>
              @endif
              <!-- Borrar -->
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
          </td>

        </tr>
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
        <!-- Modal Editar Usuario -->
        <div class="modal fade" id="usuarioEditarModal{{$usuario->id}}" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos Funcionario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <!-- errores -->
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
                      <form method="POST" action="{{route('usuarios.update',$usuario->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                          <div class="form-group col-lg-6">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" required name="nombre"
                              class="form-control @error('nombre') is-invalid @enderror" value="{{$usuario->nombre}}">
                          </div>
                          <div class="form-group col-lg-6">
                            <label for="rut">Rut:</label>
                            <input type="rut" id="rut" name="rut" required
                              class="form-control @error('rut') is-invalid @enderror" value="{{$usuario->rut}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                            <label for="password">Contraseña:</label>
                            <input type="password" id="password" required name="password"
                              class="form-control @error('password') is-invalid @enderror">
                          </div>
                          <div class="form-group col-lg-6">
                            <label for="password2">Repetir Contraseña:</label>
                            <input type="password" id="password2" required name="password2"
                              class="form-control @error('password2') is-invalid @enderror">
                          </div>
                        </div>
                        <div class="form-group col-lg-6 offset-lg-3">
                          <label for="rol">Rol:</label>
                          <select id="rol" name="rol" class="form-control">
                            @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="modal-footer mt-5">
                          <button type="reset" class="btn col-lg-2 btn-secondary btn-block">Cancelar</button>
                          <button type="submit" class="btn col-lg-2 btn-primary btn-block">Aceptar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
      </tbody>
    </table>
  </div>
  <!--/tabla-->
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="{{asset('js/datatable.js')}}">
</script>
@endsection