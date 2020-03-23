@extends('layout')
@section('url','Configuracion de usuario')
@section('content')
<link rel="stylesheet" href="{{asset('css/buscador.css')}}">
<div class="card card-danger mt-3">
    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x mt-3" style="background-image: url(./assets/media/misc/bg-1.jpg)">
        <div class="kt-user-card__avatar">
            <img class="" alt="Pic" src="{{asset('assets/media/bg/300_25.png')}}" />
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        </div>
        <div class="mt-3 ml-3">
            <h1>{{$nameUser}}</h1>
        </div>
    </div>
    <div class="card-body">
    <form action="{{route('updateUser',$User->id)}}" method="get">
        @csrf
      <div class="row offset-3" >
          <div class="col-md-6">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                <input type="text" name="nombre" value="{{$User->name}}" placeholder="Ingrese su nombre" class="form-control">
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="my-addon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" value={{$User->email}} id="email" name="email" placeholder="Ingrese su email">
                </div>
            </div>
            

            </div>
            <div class="form-group offset-2">
                <input type="submit" value="Guardar" class="btn btn-danger btn-lg btn-block" style="border-radius:25px;background-color:rgb(231, 76, 60); height:50px; width:300px; ">
            <a type="submit" value="Cancelar" href="{{route('home')}}" class="btn btn-dark btn-lg btn-block " style="border-radius:25px;background-color:black; width:300px; color:white;">Cancelar</a>
            </div>
        </div>
         
        </div>
    </form>
    </div>
</div>

@stop
