@extends('layout')
@section('content')

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Registro de Plataforma
            </h3>
        </div>
    </div>

    <div class="row">
        <form action="{{route('updatePlataforma', $nombre_plataforma->id_plataforma )}}" method="get">
            <div class="col-md-6 ">

                <div class="kt-portlet__body">

                    <div class="form-group {{ $errors->has('nombre_plataforma') ? ' has-error' : '' }}">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="nombre" value="{{$nombre_plataforma->nombre_plataforma}}">
                        @if ($errors->has('$nombre_plataforma'))
                        <span class="help-block">
                            <strong>{{ $errors->first('$nombre_plataforma') }}</strong>
                        </span>
                        @endif
                    </div>




                </div>



            </div>


            <div class="row" align="center">
                <div class="col-md-8">
                    <div class="form-group">


                        <input style="margin-top:45px" type="submit" value="Modificar Plataforma" class="btn btn-dark" id="caja">

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>







@endsection