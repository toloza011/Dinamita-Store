@extends('layout')
@section('url','Registro')
@section('content')
<style>
  .btn-dark{
    border-radius: 30px;
    padding: 10px 20px 10px 20px;
  } 
  .btn-danger{
    border-radius: 30px;
    padding: 10px 20px 10px 20px;
    background-color:rgb(231, 76, 60);
  } 
  #buscador{
    display: none;
  }
  #buscarxd{
    display:none;
  }
</style>
<div class="container">
  
</div>
<div class="container">
<div class="row mt">
    <div class="col-lg-12">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-offset-2 col-md-6 mt-3" >
              <div class="kt-login__container center-block" >
                <div class="kt-login__logo" style="margin-top: 1vh">
                  <a href="#">
                    <img src="{{asset('./assets/media/logos/imagenLogin.png')}}" style="height:150px;" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <form class="form-horizontal style-form" method="post" action="{{route('registro')}}">
        @csrf
    <div class="col-md-6">
        <div class="form-group">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" value="" name="nombre" required>

        </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Correo</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" value="" name="correo" required>

            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" value="" name="contraseña" required>

            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
            <input  class="btn btn-danger btn-product" type="submit" value="Registrar">
            <a  class="btn btn-dark btn-product" href="">Cancelar</a>
          </div>
          </div>
          </div>
          


        </div>
        </form>
    </div>
</div>




@endsection
