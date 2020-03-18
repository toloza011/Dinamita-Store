@extends('layout')
@section('url','Recuperar Contraseña')
@section('content')
<?php
$comprobar=true;
?>
<div class="card card-danger">
    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(./assets/media/misc/bg-1.jpg)">
        <div class="kt-user-card__avatar">
            <img class="" alt="Pic" src="{{asset('assets/media/bg/300_25.png')}}" />
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        </div>
        <div class="mt-3 ml-3">
            <h1>Recuperar Contraseña</h1>
        </div>
    </div>
    <div class="card-body">
    <form action="{{route('EnviarDatos')}}" method="get">
        @csrf
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="my-addon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input class="form-control" required id="email" name="email" placeholder="Ingrese su email">
                </div>
            </div>

          <div class="col-md-6 mt-4">
            <div class="form-group">
                <input type="submit" value="Enviar Correo" class="btn btn-success btn-lg btn-block">
              <a value="Cancelar" href="{{route('home')}}" class="btn btn-danger btn-lg btn-block">Cancelar</a>
            </div>
          </div>
        </div>
    </form>
    </div>
</div>



@endsection
