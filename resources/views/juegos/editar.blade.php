@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 4)


<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Modificar Juego:{{$nombre_juego->nombre_juego}}
            </h3>

        </div>
    </div>
    <div class="row">
        <h3 class="kt-portlet__head-title" style="margin-left:45px">
            {{$nombre_juego->stock_juego}} Copias del juego
        </h3>
        <div class="row col-12">
            <div class="col-6">
                <form action="{{route('updateStockk', $nombre_juego->id_juego )}}" method="post" enctype="multipart/form-data" files="true">
                    @csrf
                    <div class="col-md-10">
                        <div class="kt-portlet__body">

                            <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                                <label>Agregar Codigo</label>
                                <input type="text" class="form-control" width="1500px" placeholder="Ingrese Codigo" id="codigo" name="codigo">

                            </div>

                        </div>

                    </div>

                    <div class="row" align="center">
                        <div class="col-8">
                            <div class="form-group">
                                <input style="margin-top:45px" type="submit" value="Agregar Codigo" class="btn btn-dark" id="caja">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6">
                <div class="col-md-10 ">
                    <form action="{{route('updateJuegos', $nombre_juego->id_juego )}}" method="POST" enctype="multipart/form-data" files="true">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                                <label>Nombre</label>
                                <input type="text" class="form-control" width="1500px" placeholder="Ingrese nombre" id="nombre" name="nombre" value="{{$nombre_juego->nombre_juego}}">
                                @if ($errors->has('$nombre_juego'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('$nombre_juego') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-6">
                <div class="col-md-10 ">
                    <div class="kt-portlet__body">

                        <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                            <label>Precio(CLP)</label>
                            <input type="number" class="form-control" width="1500px" placeholder="Ingrese precio" id="precio" name="precio" value="{{$nombre_juego->precio_juego}}">
                            @if ($errors->has('$nombre_juego'))
                            <span class="help-block">
                                <strong>{{ $errors->first('$nombre_juego') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6">
                <div class="col-md-10">
                    <div class="kt-portlet__body">
                        <label>Plataforma</label>
                        <div class="form-group  ">
                            <select class=" form-control  js-example-basic-multiple" name="tipo" id="tipo" width="1500px">
                                <option value="{{$nombre_juego->id_plataforma}}">{{$nombre_juego->nombre_plataforma}}</option>
                                @foreach($PlataformasAll as $item)
                                @if($nombre_juego->id_plataforma != $item->id_plataforma)
                                <option value="{{$item->id_plataforma}}">{{$item->nombre_plataforma}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="col-md-10 ">
                    <div class="kt-portlet__body">
                        <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                            <label>Agregar Imagen</label>
                            <input accept="image/*" type="file" name="imagen">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6 offset-5">
                <div class="form-group">
                    <input align="center" type="submit" value="Guardar" class="btn btn-dark btn-lg" id="caja">
                </div>
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