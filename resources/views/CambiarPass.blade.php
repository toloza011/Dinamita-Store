@extends('layout')
@section('content')
<style>
	#buscador{
    	display: none;
  	}
  	#buscarxd{
    	display:none;
  	}
</style>
<form action="{{route('UpdatePass',$id2)}}" method="post">
<div class="container">
   @csrf
<div class="col-md-6 offset-3">

<div class="form-group">
    <div class="row">
        <label style="margin-top:25px" for="pass">Nueva contraseña</label>
        <input type="text" class="form-control" name="pass" placeholder="Ingrese su nueva contraseña">
    </div>
     </div>
<div class="form-group">
    <div class="row">
    <label for="passc">Confirmar contraseña</label>
    <input type="text" class="form-control" name="passc" placeholder="Confirme su nueva contraseña">
    </div>
</div>
<div class="form-group offset-3">
<input type="submit" href="" style="border-radius:25px;background-color:black" class="btn btn-success" value="Cambiar Contraseña">
</div>
</div>
</div>
</form>



@endsection
