@extends('layout')
@section('content')

@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 14)


<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Modificar Oferta: {{$oferta->nombre_oferta}}
            </h3>

        </div>
    </div>
    <form action="{{route('updateOferta', $oferta->id_oferta)}}" method="post">
        @csrf
        <div class="row">

            <div class="row col-12">

                <div class="col-6">
                    <div class="col-md-10 ">
                        <div class="kt-portlet__body">
                            <label>Nombre</label>
                            <div class="form-group ">

                                <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="nombre" value="{{$oferta->nombre_oferta}}" required>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="kt-portlet__body">
                        <label>Juegos</label>
                        <div hidden>
                            <select name="juegosOferta[]" multiple="multiple">
                                @foreach($juegosofertas as $item)
                                <option value="{{$item->id_juego}}" selected>{{$item->nombre_juego}}</option>
                                @endforeach

                            </select>
                        </div>
                        <?php $aux = 0; ?>
                        <select class="form-control  js-example-basic-multiple" multiple="multiple" placeholder="Ingrese juegos" name="juegos[]">
                            @foreach($juegosofertas as $item)
                            <option value="{{$item->id_juego}}" selected>{{$item->nombre_juego}}</option>
                            @endforeach
                            @foreach($juegosAll as $x)
                            <?php $aux = 0; ?>
                            <?php $aux2 = 0 ?>
                            @foreach($juegosDanger as $danger)
                            @if($x->id_juego == $danger->id_juego)
                            <?php $aux2 = 1 ?>
                            @endif
                            @endforeach
                            @foreach($juegosofertas as $item)
                            @if($item->id_juego == $x->id_juego)
                            <?php $aux = 1; ?>
                            @endif
                            @endforeach
                            @if($aux == 0 && $aux2 ==0)
                            <option value="{{$x->id_juego}}">{{$x->nombre_juego}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-6">
                        <div class="col-md-10 ">
                            <div class="kt-portlet__body">
                                <label>Descripcion</label>
                                <div class="form-group ">

                                    <input type="text" class="form-control" placeholder="Ingrese descripcion" id="descripcion" name="descripcion" value="{{$oferta->descripcion_oferta}}" required>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-md-10 ">
                            <div class="kt-portlet__body">
                                <label>Fecha Fin</label>
                                <div class="form-group  ">

                                    <input type="date" class="form-control" id="fecha_f" name="fecha_f" value="{{$oferta->fecha_fin}}" required>
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



    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <div class="kt-portlet" style="margin-bottom:60px">
        <div class="kt-portlet__body">
            <h4 class="box-title" align="center">Juegos</h4>
            <br>
            <!--begin: Datatable -->
            <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped- table-bordered table-responsive table-hover table-checkable dataTable no-footer dtr-inline" id="listCategoria" role="grid" aria-describedby="kt_table_1_info" style="width: 1536px;">
                            <thead>

                                <th width="1500">Nombre</th>
                                <th width="500">Descuento</th>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script type="text/javascript">
        $(document).ready(function() {
            $.noConflict();
            oTable = $('#listCategoria').DataTable({
                responsive: true,
                "processing": false,
                "serverSide": true,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": "{{ route('getJuegosOferta', $oferta->id_oferta) }}",
                "columns": [{
                        data: 'nombre_juego',
                        name: 'nombre_juego'
                    },
                    {
                        data: 'action2',
                        name: 'action2',
                        orderable: false,
                        searchable: false
                    },



                ]

            });

        });
    </script>







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











@endsection