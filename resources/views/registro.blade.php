@extends('layout')

@section('content')

<form action="{{route('registro')}}" method= "POST" >
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type="text" name="nombre" >
<input type="email" name="correo">
<input type="password" name="contraseña">
<input type="submit" value="registrate chichigan" >
</form>





@endsection
