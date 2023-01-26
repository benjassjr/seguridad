@extends('layouts/master')

@section('hojas-estilo')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js">
<link rel="stylesheet" type="text/css"
  href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('contenido-principal')

<div class="row mt-5 mt-lg-0">
  <div class="col">
    <!-- Titulo -->
    <h3>Actividad Usuarios</h3>
  </div>
</div>

<div class="row mt-5">

  <!--tabla-->
  <div class="col-12 col-lg-8 mt-1 mt-lg-0 offset-lg-1">
    <table id="datatable" data-toggle="table" data-pagination="true" data-page-size="10" data-search="true"
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
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="{{asset('js/datatable.js')}}">
</script>
@endsection
