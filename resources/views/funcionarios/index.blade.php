@extends('layouts/master')

@section('hojas-estilo')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js">
<link rel="stylesheet" type="text/css"
  href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('contenido-principal')
<div class="row my-3">
  <div class="col">
    <h3>Funcionarios</h3>
  </div>
</div>

<div class="row">

  <!--tabla-->
  <div class="col-12 col-lg-12  mt-1 mt-lg-0">
    <table id="datatable" data-toggle="table" data-pagination="true" data-page-size="10" data-search="true"
      class="table table-bordered table-striped table-hover display responsive nowrap">
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
        <tr>
          <td>{{$num+1}}</td>
          <td data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">{{$funcionario->nombre}}
          </td>
          <td data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">
            {{$funcionario->apellidos}}</td>
          <td data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">{{$funcionario->cargo}}
          </td>
          <td data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">{{$funcionario->unidad}}
          </td>
          <td data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">{{$funcionario->rut}}</td>
          <td data-toggle="modal" data-target="#funcionarioBorrarModal{{$funcionario->id}}">{{$funcionario->slug}}
          </td>
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
                              class="form-control @error('cargo') is-invalid @enderror" value="{{$funcionario->cargo}}">
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
                        <button type="reset" class="btn btn-secondary">Cancelar</button>
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
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="{{asset('js/datatable.js')}}">
</script>
@endsection
