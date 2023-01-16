@extends('adminlte::page')

@section('title', 'Funcionarios')

@section('content_header')
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Funcionarios</title>


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
      <h3>Funcionarios</h3>
    </div>
  </div>

  <div class="row">

    <!--tabla-->
    <div class="col-12 col-lg-10 offset-lg-1 mt-1 mt-lg-0">
      <table data-toggle="table" data-pagination="true" data-page-size="10" data-search="true"
        class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th data-sortable="true">Nº</th>
            <th data-sortable="true">Nombre</th>
            <th data-sortable="true">Apellidos</th>
            <th data-sortable="true">Cargo</th>
            <th data-sortable="true">Unidad</th>
            <th data-sortable="true">Rut</th>
            <th data-sortable="true">Slug</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($funcionarios as $num=>$funcionario)
          <tr data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">
            <td>{{$num+1}}</td>
            <td>{{$funcionario->nombre}}</td>
            <td>{{$funcionario->apellidos}}</td>
            <td>{{$funcionario->cargo}}</td>
            <td>{{$funcionario->unidad}}</td>
            <td>{{$funcionario->rut}}</td>
            <td>{{$funcionario->slug}}</td>
            <!-- <td>
               <div class="d-flex justify-content-center">

                Editar
                <a href="{{route('funcionarios.edit',$funcionario->id)}}" class="btn btn-sm btn-warning mx-1"
                  data-toggle="tooltip" data-placement="top" title="Editar Usuario">
                  <i class="far fa-edit"></i>
                </a>
                Editar

              </div> -->

            <!-- </td> -->
          </tr>
          <!-- Modal Borrar Usuario -->
          <div class="modal fade" id="funcionarioBorrarModal{{$funcionario->id}}" tabindex="-1"
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
                        <form method="POST" action="{{route('funcionarios.update',$funcionario->id)}}"
                          enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="row">
                            <div class="form-group col-lg-6">
                              <label for="nombre">Nombre:</label>
                              <input type="text" id="nombre" required name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                value="{{$funcionario->nombre}}">
                            </div>
                            <div class="form-group col-lg-6">
                              <label for="apellidos">Apellidos:</label>
                              <input type="apellidos" id="apellidos" name="apellidos" required
                                class="form-control @error('apellidos') is-invalid @enderror"
                                value="{{$funcionario->apellidos}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6">
                              <label for="cargo">Cargo:</label>
                              <input type="cargo" id="cargo" required name="cargo"
                                class="form-control @error('cargo') is-invalid @enderror"
                                value="{{$funcionario->cargo}}">
                            </div>
                            <div class="form-group col-lg-6">
                              <label for="unidad">Unidad:</label>
                              <select id="unidad" name="unidad" class="form-control">
                                @foreach ($unidades as $unidad)
                                <option value="{{$unidad->unidad}}">{{$unidad->unidad}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6">
                              <label for="rut">Rut:</label>
                              <input type="text" id="rut" required name="rut"
                                class="form-control @error('rut') is-invalid @enderror" value="{{$funcionario->rut}}">
                            </div>
                            <div class="form-group col-lg-6">
                              <label for="slug">Slug:</label>
                              <input type="slug" id="slug" name="slug" required
                                class="form-control @error('slug') is-invalid @enderror" value="{{$funcionario->slug}}">
                            </div>
                          </div>
                      </div>

                      <div class="modal-footer">
                        <form method="POST" action="{{route('funcionarios.update',$funcionario->id)}}"
                          enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Aceptar</button>
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
