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
      <div class="contenedor">
        <a href="https://es-la.facebook.com/LACRUZ.CL/">
          <i class="im fab-facebook fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/municipalidadlacruz/?hl=es">
          <i class="im fab-instagram fab fa-instagram"></i>
        </a>
        <a href="https://twitter.com/muni_lacruz">
          <i class="im fab-twitter fab fa-twitter"></i>
        </a>
        <a href="https://www.youtube.com/channel/UC9IavHMutzVhCsFN2NGEE6A">
          <i class="im fab-youtube fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>

</body>

</html>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="{{ asset('css/stylehome.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
  integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
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