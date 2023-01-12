@extends('adminlte::page')

@section('title', 'Seguridad')

@section('content_header')

@stop

@section('content')
<!--Usuario-->
<div class="row mr-0 text-right">
  <div class="col-12">
    Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
  </div>
</div>
<!--Usuario-->
<div class="row">
  <div class="col">
    <h2>Seguridad</h2>
  </div>
</div>

<div class="card mt-5">
  <div class="card-header">
    <h1 class="card-title"><b> Portal de Bienvenida</b></h1>
  </div>
  <div class="card-body">
    <p>Home</p>
  </div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
</script>
@stop