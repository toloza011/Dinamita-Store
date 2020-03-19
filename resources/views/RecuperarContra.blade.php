@extends('layout')
@section('url','Recuperar Contraseña')
@section('content')
<link rel="stylesheet" href="{{asset('css/buscador.css')}}">
<?php
$comprobar=true;
?>
<div class="card card-danger">

    <div  class="row mt-5">
       		<div class="col-md-12">
					<div class="text-center" style="font-size:large;">
					<h2 style="text-transform:uppercase; font-size:30px;">Recuperar<br><b id="ola">contraseña</b></h2>
					</div>
       		</div>
       </div>

    <div class="card-body col-md-12 offset-3" >
    <form action="{{route('EnviarDatos')}}" method="post">
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

          <div class="col-md-6 offset-3 mt-4">
            <div class="form-group">
                <input type="submit" class="btn btn-danger btn-lg btn-block" style="border-radius:25px;background-color:rgb(231, 76, 60)">
              <a value="Cancelar" href="{{route('home')}}" class="btn btn-danger btn-lg btn-block" style="border-radius:25px;background-color:black">Cancelar</a>
            </div>
          </div>
        </div>
    </form>
    </div>
</div>



@endsection
