@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 4)


<div class="kt-portlet" style="margin-bottom:100px">
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
                                <input type="text" class="form-control" width="1500px" placeholder="Ingrese Codigo" id="codigo" name="codigo" required>

                            </div>

                        </div>

                    </div>

                    <div class="row" align="center">
                        <div class="col-8">
                            <div class="form-group">
                                <input style="margin-top:51px;margin-left:-45px" type="submit" value="Agregar Codigo" class="btn btn-dark" id="caja">

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
                <div class="kt-portlet__body">
                    <label>Categorias</label>
                    <div hidden>
                        <select name="categoriasJuego[]" multiple="multiple">
                            @foreach($juegoCategorias as $item)
                            <option value="{{$item->id_categoria}}" selected>{{$item->nombre_categoria}}</option>
                            @endforeach

                        </select>
                    </div>
                    <?php $aux = 0; ?>
                    <select class="form-control  js-example-basic-multiple" multiple="multiple" placeholder="Ingrese categorias" name="categorias[]" required>
                        @foreach($juegoCategorias as $item)
                        <option value="{{$item->id_categoria}}" selected>{{$item->nombre_categoria}}</option>
                        @endforeach
                        @foreach($InfoCategoria as $x)
                        <?php $aux = 0; ?>
                        <?php $aux2 = 0 ?>
                        @foreach($categoriasDanger as $danger)
                        @if($x->id_categoria == $danger->id_categoria)
                        <?php $aux2 = 1 ?>
                        @endif
                        @endforeach
                        @foreach($juegoCategorias as $item)
                        @if($item->id_categoria == $x->id_categoria)
                        <?php $aux = 1; ?>
                        @endif
                        @endforeach
                        @if($aux == 0 && $aux2 ==0)
                        <option value="{{$x->id_categoria}}">{{$x->nombre_categoria}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row col-12">
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
            <div class="col-6">
                <div class="col-md-10 ">
                    <div class="form-group">
                        <input style="margin-right:100px;" type="submit" value="Guardar" class="btn btn-dark btn-lg" id="caja">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

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
    <input type="hidden">
</form>
<script>
    document.getElementById('return-form').submit();
</script>
@endif

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>







@endsection