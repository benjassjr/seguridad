@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<body>
  <div class="titulo banner">
    <!--Usuario-->
    <div class="row mr-0 text-right">
      <div class="col-12">
        Bienvenido <b>{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</b>
      </div>
    </div>
    <!--Usuario-->
    <div class="content">
      <h1>Seguridad La Cruz</h1>
      <p>Página web desarrollada por practicantes informáticos</p>
      <div>
        <a href="{{route('funcionarios.index')}}">
          <button type="button">
            <div class="spanb"></div>Funcionarios
          </button>
        </a>
        <a href="https://www.lacruz.cl">
          <button type="button">
            <div class="spanb"></div>Municipalidad La Cruz
          </button>
        </a>
      </div>
    </div>
  </div>

</body>

</html>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="{{ asset('css/stylehome.css') }}">

@stop

@section('js')
<script>
</script>
@stop
