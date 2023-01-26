@extends('layouts/master')

@section('hojas-estilo')

@endsection
@section('contenido-principal')
<div class="row mt-4 mt-lg-0">
  <div class="col">
    <h3>Agregar Usuario</h3>
  </div>
</div>
<br>
<div class="row">
  <!--formulario-->
  <div class="col-12 col-lg-4 order-lg-1 offset-lg-4">
    <div class="card">
      <div class="card-header bg-dark">
        <h4>Nuevo Usuario</h4>
      </div>
      <div class="card-body">
        <!--errores-->
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
        <!--/errores-->

        <form method="POST" action="{{route('usuarios.store')}}">
          @csrf
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Indique su nombre" name="nombre" min="3" required
              class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
          </div>
          <div class="form-group">
            <label for="rut">Rut:</label>
            <input type="rut" id="rut" name="rut"
              placeholder="Indique RUT sin puntos, con guión y con digito verificador" required
              class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Contraseña" required name="password" min="3"
              class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
          </div>
          <div class="form-group">
            <label for="password2">Repetir Contraseña:</label>
            <input type="password" id="password2" placeholder="Repita su contraseña" required name="password2" min="3"
              class="form-control @error('password2') is-invalid @enderror" value="{{old('password2')}}">
          </div>
          <div class="form-group">
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" class="form-control">
              @foreach ($roles as $rol)
              <option value="{{$rol->id}}">{{$rol->nombre}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                <button type="reset" class="btn btn-secondary btn-block">Cancelar</button>
              </div>
              <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/formulario-->
</div>
<div class="row">
  <div class="col">
    <a href="{{route('usuarios.index')}}" class="btn btn-info">Volver a Usuarios</a>
  </div>
</div>
@endsection
@section('scripts')

@endsection