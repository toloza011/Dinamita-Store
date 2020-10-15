@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 14)



<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Usuario
            </h3>
        </div>
    </div>

    <div class="row">
        <form action="{{route('updateUsuario', $usuario->id )}}" method="get">
            <div class="col-md-12 ">

                <div class="kt-portlet__body">

                    <div class="form-group {{ $errors->has('usuario') ? ' has-error' : '' }}">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="nombre" value="{{$usuario->name}}">
                        @if ($errors->has('$usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('$usuario') }}</strong>
                        </span>
                        @endif
                    </div>

                   
                    <div class="form-group {{ $errors->has('usuario') ? ' has-error' : '' }}">
                        <label>Correo</label>
                        <input type="text" class="form-control" placeholder="Ingrese email" id="nombre" name="email" value="{{$usuario->email}}">
                        @if ($errors->has('$usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('$usuario') }}</strong>
                        </span>
                        @endif
                    </div>



                </div>



            </div>
            


            <div class="row" align="center">
                <div class="col-md-8">
                    <div class="form-group">


                        <input style="margin-top:45px" type="submit" value="Modificar Usuario" class="btn btn-dark" id="caja">

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@else
                <form action="{{route('home')}}" method="GET" id='return-form1'>
                    <input type="hidden">
                </form>
                <script>
                    document.getElementById('return-form1').submit();
                </script>
                @endif
                @else
                <form action="{{route('home')}}" method="GET" id='return-form'>
                    <input type="hidden" >
                </form>
                <script>
                    document.getElementById('return-form').submit();
                </script>
                @endif


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>







@endsection