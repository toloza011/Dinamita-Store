@extends('layout')
@section('url','Review Producto')
@section('content')
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    @if(isset($responseCode))
        @if($responseCode == 0)
            <div align='center' style='margin-top: 40px'>
                <h1><strong>¡Compra Realizada con Exito!</strong></h1>
                <div style='margin-top: 50px; margin-bottom: 60px'>
                    <h5>La compra a sido realizada exitosamente, los datos de los productos están</h5>
                    <h5>organizados en la siguiente tabla.</h5>
                </div>
                <div class='row'>
                    <div class='col-md-3'>
                    </div>
                    <div class='col-md-6' >
                        <form action="<?php echo $urlRedirection ?>" method="POST" >
                            <input type="hidden" name='token_ws' value='<?php echo $tokenWs ?>'>
                            <input type="submit" style="background-color:rgb(231, 76, 60); border-radius: 30px" class="btn btn-danger col-md-12 btn-lg" value= 'Inspeccionar compra'/>
                        </form>
                    </div>
                    <div class='col-md-3'>
                    </div>
                </div>
                
                <div class="dataTables_wrapper">
                    <div class="row">
                        <div style='margin-left: 250px; margin-top: 50px; width: 800px'>
                            <table class=" table table-striped- table-bordered table-responsive table-hover table-checkable dataTable no-footer dtr-inline" id="listCategoria" role="grid" aria-describedby="kt_table_1_info" style="width: 1536px;">
                                <thead>
                                    <th style='width: 400px'>Producto</th>
                                    <th style='width: 200px'>Precio</th>
                                    <th style='width: 200px'>Key</th>
                                </thead>
                                @for($i = 0; $i<$flag;$i++)
                                    <tboddy>
                                        <td>{{$nom[$i]}}</td>
                                        <td>${{$pre[$i]}}</td>
                                        <td>{{$key[$i]}}</td>
                                    </tbody>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div align='center' style='margin-top: 40px'>
                <h1><strong>¡Error al Realizar el Pago!</strong></h1>
                <div style='margin-top: 50px'>
                    <h5>Problemas al realizar pago, porfavor asegurece de insertar bien los datos</h5>
                    <h5>y/o contar con fondos necesarios, para realizar la transacción.</h5>
                </div>
                <a href="{{route('pagar')}}" class="btn btn-danger mt-5 mb-5 btn-lg" style='background-color:rgb(231, 76, 60); border-radius: 50px; width: 500px' ><h4><strong>Volver a pagar</strong></h4></a>
            </div>
        @endif
    @else
        @if(isset($precio))
            <div align='center' style='margin-top: 40px'>
                <h1><strong>¡Compra Realizada con Exito!</strong></h1>
                <div style='margin-top: 50px; margin-bottom: 60px'>
                    <h5>La compra a sido realizada exitosamente, los datos de los productos están</h5>
                    <h5>organizados en la siguiente tabla.</h5>
                </div>
                
                <div class="dataTables_wrapper">
                    <div class="row">
                        <div style='margin-left: 250px; margin-top: 50px; width: 800px'>
                            <table class=" table table-striped- table-bordered table-responsive table-hover table-checkable dataTable no-footer dtr-inline" id="listCategoria" role="grid" aria-describedby="kt_table_1_info" style="width: 1536px;">
                                <thead>
                                    <th style='width: 400px'>Producto</th>
                                    <th style='width: 200px'>Precio</th>
                                    <th style='width: 200px'>Key</th>
                                </thead>
                                @for($i = 0; $i<$flag;$i++)
                                    <tboddy>
                                        <td>{{$nom[$i]}}</td>
                                        <td>${{$pre[$i]}}</td>
                                        <td>{{$key[$i]}}</td>
                                    </tbody>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <form action="{{route(home)}}" method="GET" id='return-form1'>
                @csrf
            </form>
            <script>
                document.getElementById('return-form1').submit();
            </script>
        @endif
    @endif
@endsection