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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Styles -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

  <!-- Ionic icons -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
  <!-- Page Content -->
  <div id="content" class="bg-grey w-100">

    <section class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-8">
            <h1 class="font-weight-bold mb-0">Bienvenido <b>{{Auth::user()->nombre}}</b>
            </h1>
            <p class="lead text-muted">({{Auth::user()->rol->nombre}})</p>
          </div>

        </div>
      </div>
    </section>

    <section class="bg-mix py-3">
      <div class="container">
        <div class="card rounded-0">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 col-md-6 d-flex stat my-3">
                <div class="mx-auto">
                  <h4 class="text-muted">N° Funcionarios</h4>
                  <br>
                  <h3 class="font-weight-bold text-success"><i class="icon ion-md-arrow-dropup-circle"></i>
                    {{count($funcionarios)}}
                  </h3>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 d-flex stat my-3">
                <div class="mx-auto">
                  <h4 class="text-muted">N° Usuarios</h4>
                  <br>
                  <h3 class="font-weight-bold text-success"><i class="icon ion-md-arrow-dropup-circle"></i>
                    {{count($usuarios)}}</h3>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 d-flex stat my-3">
                <div class="mx-auto">
                  <h4 class="text-muted">Última Actividad</h4>
                  <br>
                  @foreach ($usuarios as $num=>$usuario)
                  <h6 class=" font-weight-bold text-success"><i class="icon ion-md-person"></i> {{$usuario->nombre}}
                    {{date('d/n/y H:i',strtotime($usuario->ultimo_login))}}</h6>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 my-3">
            <div class="card rounded-0">
              <div class="card-header bg-light">
                <h6 class="font-weight-bold mb-0">Nuevos Usuarios</h6>
              </div>
              <div class="card-body">
                <canvas id="myChart" width="300" height="150"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-4 my-3">
            <div class="card rounded-0">
              <div class="card-header bg-light">
                <h6 class="font-weight-bold mb-0">Funcionarios</h6>
              </div>
              <div class="card-body pt-2">
                <div class="d-flex border-bottom py-2">
                  <div class="d-flex mr-3">
                    <h2 class="align-self-center mb-0"><i class="icon ion-md-briefcase"></i></h2>
                  </div>
                  <div class="align-self-center">
                    <h6 class="d-inline-block mb-0">{{$funcionario1->nombre}}</h6><span
                      class="badge badge-success ml-2">{{$funcionario1->slug}}</span>
                    <small class="d-block text-muted">{{$funcionario1->cargo}}</small>
                  </div>
                </div>
                <div class="d-flex border-bottom py-2">
                  <div class="d-flex mr-3">
                    <h2 class="align-self-center mb-0"><i class="icon ion-md-briefcase"></i></h2>
                  </div>
                  <div class="align-self-center">
                    <h6 class="d-inline-block mb-0">{{$funcionario2->nombre}}</h6><span
                      class="badge badge-success ml-2">{{$funcionario2->slug}}</span>
                    <small class="d-block text-muted">{{$funcionario2->cargo}}</small>
                  </div>
                </div>
                <div class="d-flex border-bottom py-2">
                  <div class="d-flex mr-3">
                    <h2 class="align-self-center mb-0"><i class="icon ion-md-briefcase"></i></h2>
                  </div>
                  <div class="align-self-center">
                    <h6 class="d-inline-block mb-0">{{$funcionario3->nombre}}</h6><span
                      class="badge badge-success ml-2">{{$funcionario3->slug}}</span>
                    <small class="d-block text-muted">{{$funcionario3->cargo}}</small>
                  </div>
                </div>
                <div class="d-flex border-bottom py-2">
                  <div class="d-flex mr-3">
                    <h2 class="align-self-center mb-0"><i class="icon ion-md-briefcase"></i></h2>
                  </div>
                  <div class="align-self-center">
                    <h6 class="d-inline-block mb-0">{{$funcionario4->nombre}}</h6><span
                      class="badge badge-success ml-2">{{$funcionario4->slug}}</span>
                    <small class="d-block text-muted">{{$funcionario4->cargo}}</small>
                  </div>
                </div>
                <div class="d-flex border-bottom py-2 mb-3">
                  <div class="d-flex mr-3">
                    <h2 class="align-self-center mb-0"><i class="icon ion-md-briefcase"></i></h2>
                  </div>
                  <div class="align-self-center">
                    <h6 class="d-inline-block mb-0">{{$funcionario5->nombre}}</h6><span
                      class="badge badge-success ml-2">{{$funcionario5->slug}}</span>
                    <small class="d-block text-muted">{{$funcionario5->cargo}}</small>
                  </div>
                </div>
                <a href="{{route('funcionarios.index')}}" class="btn btn-primary w-100">Ver todos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

</body>

</html>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
  integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
@stop

@section('js')
<script>
< script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin = "anonymous" >
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
  integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Diciembre 2022', 'Enero 2023', 'Febrero 2023', 'Marzo 2023'],
    datasets: [{
      label: 'Nuevos usuarios',
      data: [1, 2, 0.05, 0.05],
      backgroundColor: [
        '#12C9E5',
        '#12C9E5',
        '#111B54',
        '#111B54'
      ],
      maxBarThickness: 30,
      maxBarLength: 2
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }


});
</script>
</script>
@stop
