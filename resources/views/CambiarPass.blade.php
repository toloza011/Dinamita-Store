@extends('layout')
@section('content')
<form action="{{route('UpdatePass')}}" method="post">
<div class="container">
<form action="" method="get">
    @csrf
<div class="col-md-6">

<div class="form-group">
    <div class="row">
        <label for="pass">Nueva contraseña</label>
        <input type="text" class="form-control" name="pass" placeholder="Ingrese su nueva contraseña">
    </div>
     </div>
<div class="form-group">
    <div class="row">
    <label for="passc">Confirmar contraseña</label>
    <input type="text" class="form-control" name="passc" placeholder="Confirme su nueva contraseña">
    </div>
</div>
<div class="form-group">
<input type="submit" href="" class="btn btn-success" value="Cambiar Contraseña">
</div>
</div>
</div>
</form>



@endsection
