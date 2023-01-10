@extends('adminlte::page')

@section('title', 'Seguridad')

@section('content_header')
<h1>Seguridad</h1>
@stop

@section('content')
<!--Usuario-->
<div class="row mr-0 text-right">
  <div class="col-12">
    Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
  </div>
</div>
<!--Usuario-->
<div class="card">
  <div class="card-header">
    <h1 class="card-title">Hola Mundo</h1>
  </div>
  <div class="card-body">
    <p>AdminTest</p>
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
