@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 4)

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Modificar Suscripcion:{{$sus->nombre_plataforma}}
            </h3>

        </div>
    </div>
    <div class="row">
        <h3 class="kt-portlet__head-title" style="margin-left:40px">
            {{$sus->stock_suscripcion}} Copias de la suscripcion
        </h3>
        <div class="row col-12">
            <div class="col-6">
                <form action="{{route('updateStockk2', $sus->id_subscripcion)}}" method="post">
                    @csrf
                    <div class="col-md-10">
                        <div class="kt-portlet__body">
                            <label>Agregar Codigo</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese Codigo" id="codigo" name="codigo" required>
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
            </div>
            </form>
        </div>





        <div class="row col-12">
            <div class="col-6">
                <form action="{{route('updateSus', $sus->id_subscripcion)}}" method="post" enctype="multipart/form-data" files="true">
                    @csrf
                    <div class="col-md-10 ">
                        <div class="kt-portlet__body">
                            <label>Plataforma</label>
                            <div class="form-group  ">
                                <select class=" form-control  js-example-basic-multiple" name="tipo" id="tipo">
                                    <option value="{{$sus->id_plataforma}}">{{$sus->nombre_plataforma}}</option>
                                    @foreach($InfoPlataformaAll as $item)
                                    @if($sus->id_plataforma != $item->id_plataforma)
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
                        <label>Precio(CLP)</label>
                        <div class="form-group ">

                            <input type="number" class="form-control" placeholder="Ingrese precio" id="precio" name="precio" value="{{$sus->precio_subscripcion}}">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <div class="col-6">
                    <div class="col-md-10 ">
                        <div class="kt-portlet__body">
                            <label>Descripcion</label>
                            <div class="form-group ">

                                <input type="text" class="form-control" placeholder="Ingrese descripcion" id="descripcion" name="descripcion" value="{{$sus->tipo_subscripcion}}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-md-10 ">
                        <div class="kt-portlet__body">
                            <label>Cambiar Imagen</label>
                            <div class="form-group  ">

                                <input accept="image/*" type="file" name="imagen">
                            </div>
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


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>




@endsection