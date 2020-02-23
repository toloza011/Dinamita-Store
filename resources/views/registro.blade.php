@extends('layout')
@section('url','Registro')
@section('content')

<div class="container-fluid">
<div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>Ingrese sus datos: </h4>

      <form class="form-horizontal style-form" method="post" action="{{route('registro')}}">
        @csrf
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

          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
            <input class="btn btn-success" type="submit" value="Registrar">
            <a class="btn btn-warning" href="">Cancelar</a>
            </div>
          </div>
        </form>
    </div>
</div>
</div>
</div>



@endsection
