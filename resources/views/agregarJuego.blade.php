@extends('layout')
@section('content')

<div class="container" Style="width:200px; height:100px">
    <form>
        <select class="form-control" name="tablas" id="mySelect">
            <option selected value="0">Seleccionar Tabla</option>
            <option value="1">Categorias</option>
            <option value="2">Plataformas</option>
            <option value="3">Juegos</option>
            <option value="4">Subscripciones</option>
        </select>
    </form>
</div>
<a href="{{route('getTable')}}">asdasdasdasdasdasd</a>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="kt-portlet">
    <div class="kt-portlet__body">
        <h4 class="box-title" align="center">Listado de Categorias</h4>
        <div align="right">
            <a href="#" class="btn btn-dark">+</a>
        </div>
        <br>
        <!--begin: Datatable -->
        <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-responsive table-hover table-checkable dataTable no-footer dtr-inline" id="listClients" role="grid" aria-describedby="kt_table_1_info" style="width: 1536px;">
                        <thead>
                            <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" width="320">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" width="320">Nombre Categoría</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

<script>
    $("#mySelect").change(function() {
        var str;
        var asd = '/getTable';
        str = $('#mySelect').val();
        if(str == '1'){
            oTable = $('#listClients').DataTable({
                /* ------------- AQUí IRÍA LA RUTA -------------- */
            }); 
        } 
    });







/* 
    $("#mySelect").change(function() {
        var str;
        str = $('#mySelect').val();
        switch (str) {
            case '1':
                console.log('¡¡¡WTF!!!')
                $.ajax("{{ route('getTable') }}") ;
                columns = [{
                        data: 'id_categoria',
                        name: 'id_categoria'
                    },
                    {
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
                break;
            case '2':
                console.log(str)
                break;
            case '3':
                console.log(str)
                break;
            case '4':
                console.log(str)
                break;
            default:
                console.log('default')
                break;
        }

    });*/
</script>
@endsection