@extends('layout')
@section('content')

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Oferta
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="kt-portlet__body">
                <form action="insertarOferta" method="POST" enctype="multipart/form-data" files="true">
                    @csrf
                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control " placeholder="Ingrese nombre" name="nombre" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Ingrese descripcion" name="descripcion" required>
                            @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categoria') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="row col-12">
                        <div class="form-group col-6">
                            <label>Fecha Fin</label>
                            <input type="date" class="form-control " name="fecha_f" required>
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





    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


    @endsection