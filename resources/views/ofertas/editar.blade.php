@extends('layout')
@section('content')
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Modificar Juego:{{$nombre_juego->nombre_juego}}
            </h3>

        </div>
    </div>
    <h3 class="kt-portlet__head-title" style="margin-left:20px">
        {{$nombre_juego->stock_juego}} Copias del juego
    </h3>
    <div class="row col-12">
        <form action="{{route('updateStockk', $nombre_juego->id_juego )}}" method="post">
            @csrf
            <div class="col-md-6 ">
                <div class="kt-portlet__body">

                    <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                        <label>Agregar Codigo</label>
                        <input type="text" class="form-control" placeholder="Ingrese Codigo" id="codigo" name="codigo">

                    </div>

                </div>

            </div>

            <div class="row" align="center">
                <div class="col-md-8">
                    <div class="form-group">


                        <input style="margin-top:45px" type="submit" value="Agregar Codigo" class="btn btn-dark" id="caja">

                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="row col-12">
        <div class="col-6">
            <form action="{{route('updateNombreJ', $nombre_juego->id_juego )}}" method="get">
                <div class="col-md-8 ">

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
                <div class="row" align="center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input style="margin-top:45px" type="submit" value="Modificar Categoria" class="btn btn-dark" id="caja">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4">
            <form action="{{route('updatePrecioJ', $nombre_juego->id_juego )}}" method="get">
                <div class="col-md-10 ">

                    <div class="kt-portlet__body">

                        <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                            <label>Precio(CLP)</label>
                            <input type="number" class="form-control" placeholder="Ingrese precio" id="precio" name="precio" value="{{$nombre_juego->precio_juego}}">
                            @if ($errors->has('$nombre_juego'))
                            <span class="help-block">
                                <strong>{{ $errors->first('$nombre_juego') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input style="margin-top:45px" type="submit" value="Modificar precio" class="btn btn-dark" id="caja">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row col-12">
        <div class="col-md-5 ">
            <form action="{{route('agregarImagenJ', $nombre_juego->id_juego )}}" method="POST" enctype="multipart/form-data" files="true">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group {{ $errors->has('nombre_juego') ? ' has-error' : '' }}">
                        <label>Agregar Imagen</label>
                        <input accept="image/*" type="file" name="imagen">
                    </div>
                </div>
        </div>
        <div class="row" align="center">
            <div class="col-md-8">
                <div class="form-group">
                    <input style="margin-top:45px" type="submit" value="Agregar Imagen" class="btn btn-dark">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>







@endsection