@extends('layout')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


@if($request->session()->has('identificador'))
<?php $idUser = $request->session()->get('identificador'); ?>

@if($idUser == 4)


<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="kt-portlet">
    <div class="kt-portlet__body">
        <h4 class="box-title" align="center">Listado de Categoria</h4>
        <div align="right">
            <a href="{{route('create')}}" class="btn btn-dark">Registrar Categoria</a>
        </div>
        <br>
        <!--begin: Datatable -->
        <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-responsive table-hover table-checkable dataTable no-footer dtr-inline" id="listCategoria" role="grid" aria-describedby="kt_table_1_info" style="width: 1536px;">
                        <thead>
                            <th width="2000">Nombre</th>
                            <th width="200">Editar</th>
                            <th width="200">Eliminar</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@else
                @empty($asd)
                <form action="{{route('home')}}" method="GET" id='return-form1'>
                    <input type="hidden">
                </form>
                <script>
                    document.getElementById('return-form1').submit();
                </script>
                @endempty
                @endif
                @else
                <form action="{{route('home')}}" method="GET" id='return-form'>
                    <input type="hidden" >
                </form>
                <script>
                    document.getElementById('return-form').submit();
                </script>
                @endif





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
            "ajax": "{{ route('getCategoria') }}",
            "columns": [{
                    data: 'nombre_categoria',
                    name: 'nombre_categoria'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
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
@endsection
