@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Landing Page HTML | AlexCG Design</title>
</head>

<body>
  <header class="hero">
    <div class="textos-hero">
      <h1>Seguridad La Cruz</h1>
      <p>Bienvenido <b>{{Auth::user()->nombre}}</b></p>
    </div>
    <div class="svg-hero" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
          style="stroke: none; fill: #fff;"></path>
      </svg></div>
  </header>


  <section class="wave-contenedor website">
    <img src="{{ asset('images/ilustracion1.jpg') }}" alt="">
    <div class="contenedor-textos-main">
      <h2 class="titulo left">Municipalidad de la Cruz</h2>
      <p class="parrafo">La Municipalidad de La Cruz es liderada por la alcaldesa Filomena Navia Hevia y el honorable
        concejo municipal, quienes ponen su capacidades y disposición al servicio de todos los vecinos y vecinas de esta
        comuna.</p>
      <a href="https://www.lacruz.cl" class="cta">Visitar Página Web</a>
    </div>
  </section>

  <section class="info">
    <div class="contenedor">
      <h2 class="titulo left">Sigamos Avanzando</h2>
      <p>Ilustre Municipalidad de la Cruz</p>
    </div>
  </section>

  <section class="cards contenedor">
    <h2 class="titulo">Nuestras Redes Sociales</h2>
    <div class="content-cards">
      <article class="card">
        <i class="fab fa-facebook"></i>
        <h3>Facebook</h3>
        <p>Contamos con página de facebook.</p>
        <a href="https://es-la.facebook.com/LACRUZ.CL/" class="cta">Visitar</a>
      </article>
      <article class="card">
        <i class="fab fa-instagram"></i>
        <h3>Instagram</h3>
        <p>Por supuesto un perfil de instagram.</p>
        <a href="https://www.instagram.com/municipalidadlacruz/?hl=es" class="cta">Visitar</a>
      </article>
      <article class="card">
        <i class="fab fa-twitter"></i>
        <h3>Twitter</h3>
        <p>Además de cuenta de twitter.</p>
        <a href="https://twitter.com/muni_lacruz" class="cta">Visitar</a>
      </article>
    </div>
  </section>

  <section class="galeria">
    <div class="contenedor">
      <h2 class="titulo">Nuestra Comuna</h2>
      <article class="galeria-cont">
        <img src="{{ asset('images/uno.jpg') }}" alt="">
        <img src="{{ asset('images/dos.jpg') }}" alt="">
        <img src="{{ asset('images/tres.jpg') }}" alt="">
        <img src="{{ asset('images/cuatro.jpg') }}" alt="">
        <img src="{{ asset('images/cinco.jpg') }}" alt="">
        <img src="{{ asset('images/seis.jpg') }}" alt="">
      </article>
    </div>
  </section>

  <section class="info-last">

    <div class="contenedor last-section">
      <div class="contenedor-textos-main">
        <h2 class="titulo left">Participa en nuestra próxima actividad</h2>
        <p class="parrafo">Este 04 de marzo vivamos todas y todos las 2da. Versión del Festival del Cantar Vecinal La
          Cruz 2023. </p>
        <a href="https://www.lacruz.cl" class="cta">Bases e inscripciones aquí</a>
      </div>
      <img src="{{ asset('images/ilustracion.jpg') }}" alt="">
    </div>

    <div class="svg-wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
          style="stroke: none; fill: #601BB8;"></path>
      </svg></div>
  </section>


</body>

</html>
@stop

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/estilolang.css') }}">
<link rel="stylesheet" href="/css/admin_custom.css">
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
<script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
</script>
</script>
@stop