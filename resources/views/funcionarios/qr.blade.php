@extends('layouts/master')

@section('hojas-estilo')
@endsection

@section('contenido-principal')
<div class="row my-3">
  <div class="col">
    <h1><b>VERIFICACIÓN QR</b></h1>
  </div>
</div>
<div class="col-lg-6 offset-lg-3">
  <div class="card mt-5">
    <div class="card-body">
      <h3>{{$validacion}}</h3>
      <h3 for="nombre">{{$funcionario->nombre!=null?'Nombre: '.$funcionario->nombre:''}}</h3>
      <br>
      <h3 for="nombre">{{$funcionario->apellidos!=null?'Apellidos: '.$funcionario->apellidos:''}}</h3>
      <br>
      <h3 for="nombre">{{$funcionario->rut!=null?'Rut: '.$funcionario->rut:''}}</h3>
      <br>
      <h3 for="nombre">{{$funcionario->cargo!=null?'Cargo: '.$funcionario->cargo:''}}</h3>
      <br>
      <h3 for="nombre">{{$funcionario->unidad!=null?'Unidad: '.$funcionario->unidad:''}}</h3>


    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection
