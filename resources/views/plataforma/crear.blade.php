@extends('layout')
@section('content')


@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 14)

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Plataforma
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 ">
            <div class="kt-portlet__body">
                <form action="insertarPlataforma" method="post">
                @csrf
                    <div class="form-group {{ $errors->has('plataforma') ? ' has-error' : '' }}">
                        <label>Plataforma</label>
                        <input type="text" class="form-control" placeholder="Ingrese plataforma" name="plataforma">
                        @if ($errors->has('plataforma'))
                        <span class="help-block">
                            <strong>{{ $errors->first('plataforma') }}</strong>
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