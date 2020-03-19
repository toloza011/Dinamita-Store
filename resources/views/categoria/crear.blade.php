@extends('layout')
@section('content')

<?php $idUser = $request->session()->get('identificador'); ?>

@empty($asd)
@if($idUser != 4)
<form action="{{route('home')}}" method="GET" id='return-form1'>
                    <input type="hidden">
                </form>
                <script>
                    document.getElementById('return-form1').submit();
                </script>
@endif
 @endempty
@if($request->session()->has('identificador'))

@if($idUser == 4)

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Categoria
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="kt-portlet__body">
                <form action="insertar" method="post">
                    @csrf
                    <div class="form-group {{ $errors->has('categoria') ? ' has-error' : '' }}">
                        <label>Categoria</label>
                        <input type="text" class="form-control" placeholder="Ingrese categoria" name="categoria">
                        @if ($errors->has('rut'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoria') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="row" align="center">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="submit" value="registrar" class="btn btn-dark" is="caja">
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
                    <input type="hidden" >
                </form>
                <script>
                    document.getElementById('return-form').submit();
                </script>
                @endif


                <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>




                @endsection
