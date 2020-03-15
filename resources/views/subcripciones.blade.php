@extends('layout')
@section('url','Subcripciones')
@section('content')
<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">
<div class="row">
    <div class="container container-fluid">
        <div class="col-md-12">
            <div style="margin-top:4%" class="col-md-4">
                <h5 style="color:black">Filtrar por plataforma: </h5>
                <select style="width:300px" class="form-control" name="tablas" id="mySelect">
                    <option value="0" selected>Todos</option>
                    @foreach ($InfoPlataformaS as $categoria)
                    <option value="{{$categoria->id_plataforma}}">{{$categoria->nombre_plataforma}}</option>
                    @endforeach
                </select>

            </div>

        </div>
    </div>
</div>
<!---catalogo de productos--->
<div class="container container-fluid">
    <div class="row">
        <div style="margin-top:18px" class="col-md-12">
            @foreach($InfoSubcripcion as $subcripcion)
            <div class="col-sm-4 col-md-3">
                <div style="height:380px;" class="thumbnail">
                    @foreach($InfoPlataformaS as $plataforma)
                    @if($subcripcion->id_plataforma == $plataforma->id_plataforma )
                    <?php $x = $plataforma->nombre_plataforma ?>
                    @endif
                    @endforeach
                    <h4 class="text-center"><span class="badge badge-dark">{{$x}}</span></h4>
                    <img src="{{$subcripcion->url_subscripcion}}" class="img-responsive caratula">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-7 col-xs-7">
                                <h5>{{$subcripcion->tipo_subscripcion}}</h5>
                            </div>
                            <div class="col-md-5 col-xs-5 price">
                                <h4>
                                    <label>${{$subcripcion->precio_subscripcion}}</label></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-xs-8">
                                <h5>Stock</h5>
                            </div>
                            @if($subcripcion->stock_suscripcion == 0)
                            <div class="col-md-4 col-xs-4 price" align='right'>
                                <h5 style='color: red'><label>{{$subcripcion->stock_suscripcion}}</label></h5>
                            </div>
                            @else
                            <div class="col-md-4 col-xs-4 price" align='right'>
                                <h5><label>{{$subcripcion->stock_suscripcion}}</label></h5>
                            </div>
                            @endif
                        </div>
                        <div class="row text-center ">
                            <div class="col-md-6">
                                <a href="{{route('reviewSub',$subcripcion->id_subscripcion)}}" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Reseña</a>
                            </div>
                            @if($request->session()->has('identificador'))
                                @if($subcripcion->stock_suscripcion != 0 && $request->session()->get('identificador') != 4)
                                    <div class="col-md-6">
                                        <a href="{{route('carrito2', $subcripcion->id_subscripcion)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <a style="background-color:rgb(231, 76, 60); color:white" class="btn btn-danger btn-abrir-popup btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                                    </div>
                                @endif
                            @else
                                <div class="col-md-6">
                                    <a href="{{route('login')}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                                </div>
                            @endif
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="overlay" id="overlay">
                <div class="popup" id="popup">
                    <img alt="Logo" src="/assets/media/logos/x.png"/>
                    <?php
                        if($request->session()->get('identificador') == 4)
                        $texto = 'Función Comprar No Disponible Para La Cuenta';
                        else
                        $texto = 'Stock No Disponible';
                    ?>
                    <h4>{{$texto}}</h4>
                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup btn btn-danger btn-product">Aceptar</a>
                </div>
            </div>
            <script src="js/popup.js"></script>
        </div>
    </div>
</div>


<script>
    $("#mySelect").change(function() {

        var x = $("#mySelect").val();
  
        ruta(x);
    });


    function ruta(id) {


        url = '{{ route("plataforma", ":id") }}';

        url = url.replace(':id', id);

        location.href = url;

    }
</script>
@endsection