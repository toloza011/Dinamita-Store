@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 4)



<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Suscripcion
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="kt-portlet__body">
                <form action="insertarSus" method="POST" enctype="multipart/form-data" files="true">
                    @csrf
                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label>Plataforma</label>
                            <div class="form-group  ">
                                <select class=" form-control  js-example-basic-multiple" name="plataforma" id="plataforma">
                                    <option value="0">Seleccione Plataforma</option>
                                    @foreach($PlataformasAll as $item)
                                    <option value="{{$item->id_plataforma}}">{{$item->nombre_plataforma}}</option>
                                
                                    @endforeach
                                </select>
                            </div>
                          
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
                            <label>imagen</label>
                            <input type="file" class="form-control " placeholder="Ingrese imagen" name="imagen" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label>Tipo</label>
                            <input type="text" class="form-control " placeholder="Ingrese descripcion" name="descripcion" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="col-6 offset-5">
                            <div class="form-group">
                                <input type="submit" value="registrar Suscripcion" class="btn btn-dark" is="caja">
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