@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 14)

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Juego
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="kt-portlet__body">
                <form action="insertarJuego" method="POST" enctype="multipart/form-data" files="true" >
                    @csrf
                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control " placeholder="Ingrese nombre" id="nombre" name="nombre" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label>Precio</label>
                            <input type="number" class="form-control" placeholder="Ingrese precio" name="precio" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label>Categoria</label>
                            <select class="form-control  js-example-basic-multiple" multiple="multiple" placeholder="Ingrese categoria" name="categoria[]" required>
                                @foreach($InfoCategoria as $item)
                                <option value="{{$item->id_categoria}}">{{$item->nombre_categoria}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label>Plataforma</label>
                            <select name="plataforma" id="plataforma" class="form-control  js-example-basic-multiple" placeholder="Ingrese plataforma">
                                @foreach($InfoPlataformaJ as $item)
                                <option value="{{$item->id_plataforma}}">{{$item->nombre_plataforma}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label>imagen</label>
                            <input type="file" class="form-control " placeholder="Ingrese imagen" name="imagen" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label>Descripcion</label>
                            <input type="text" class="form-control " placeholder="Ingrese descripcion" name="descripcion" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">

                            <div class="col-md-8" align="center">
                                <div class="form-group">
                                    <input type="submit" value="registrar Juego" class="btn btn-dark" is="caja">
                                </div>
                            </div>

                    </div>

                </form>
            </div>
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

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


    @endsection
