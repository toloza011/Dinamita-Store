@extends('layout')
@section('url','Catalogo de Videojuegos')
@section('content')
<!----Catalogo Subcripciones--------->
@if($contSubs>0)
<div class="row">
    <div class="container container-fluid">
        <div class="col-md-12">
            <div style="margin-top:4%;margin-bottom:20px" class="col-md-4">

                <h5 style="color:black">Filtrar por plataforma: </h5>
                <select style="width:300px" class="form-control" name="tablas" id="mySelect">
                    <option value="0">Todos</option>
                    @foreach ($InfoPlataformaS as $categoria)
                    @if($Plataforma->nombre_plataforma == $categoria->nombre_plataforma)
                    <option value="{{$categoria->id_plataforma}}" selected>{{$categoria->nombre_plataforma}}</option>
                    @else
                    <option value="{{$categoria->id_plataforma}}">{{$categoria->nombre_plataforma}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="container">
                <h1 style="color:black;margin-left:10px"> <b>{{$Plataforma->nombre_plataforma}}</b></h1>
            </div>
        </div>
    </div>
</div>



<div class="container container-fluid">
    <div class="row">
        <div class="col-md-12" style='margin-bottom: 20px'>
            @foreach($Subs as $subcripcion)
            <div class="col-sm-4 col-md-3">
                <div style="height:350px;" class="thumbnail">
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
                        <div class="row text-center ">
                            <div class="col-md-6">
                                <a href="{{route('reviewSub',$subcripcion->id_subscripcion)}}" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Reseña</a>
                            </div>
                            @if($request->session()->has('identificador'))
                            <div class="col-md-6">
                                <a href="{{route('carrito2', $subcripcion->id_subscripcion)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                            </div>
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
        </div>
    </div>
</div>
<!---- FIN Catalogo Subcripciones--------->
@else
@if($contJuegos>0)
<!----Catalogo Juegos--------->

<div class="row">
    <div class="container container-fluid">
        <div class="col-md-12">
            <div style="margin-top:4%;margin-bottom:20px" class="col-md-4">
                <h5 style="color:black">Filtrar por plataforma: </h5>
                <select style="width:300px" class="form-control" name="tablas" id="mySelect">
                    <option value="0">Todos</option>
                    @foreach ($InfoPlataformaJ as $categoria)
                    @if($Plataforma->nombre_plataforma == $categoria->nombre_plataforma)
                    <option value="{{$categoria->id_plataforma}}" selected>{{$categoria->nombre_plataforma}}</option>
                    @else
                    <option value="{{$categoria->id_plataforma}}">{{$categoria->nombre_plataforma}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="container">
                <h1 style="color:black;margin-left:10px"> <b>{{$Plataforma->nombre_plataforma}}</b></h1>
            </div>

        </div>
    </div>
</div>




<div class="container container-fluid">
    <div class="row">
        <div class="col-md-12" style='margin-bottom: 20px'>
            @foreach($Juegos as $juego)
            <div class="col-sm-4 col-md-3">
                <div style="height:350px;" class="thumbnail">
                    @foreach($InfoPlataformaJ as $plataforma)
                    @if($juego->id_plataforma == $plataforma->id_plataforma )
                    <?php $x = $plataforma->nombre_plataforma ?>
                    @endif
                    @endforeach
                    <h4 class="text-center"><span class="badge badge-dark">{{$x}}</span></h4>
                    <img src="{{$juego->url_juego}}" class="img-responsive caratula">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-7 col-xs-7">
                                <h5>{{$juego->nombre_juego}}</h5>
                            </div>
                            <div class="col-md-5 col-xs-5 price">
                                <h4>
                                    <label>${{$juego->precio_juego}}</label></h4>
                            </div>
                        </div>
                        <div class="row text-center ">
                            <div class="col-md-6">
                                <a href="{{route('review',$juego->id_juego)}}" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Reseña</a>
                            </div>
                            @if($request->session()->has('identificador'))
                            <div class="col-md-6">
                                <a href="{{route('carrito', $juego->id_juego)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                            </div>
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
        </div>
    </div>
</div>
@endif
@endif
<!---- FIN Catalogo JUEGOS--------->

<script>
    $("#mySelect").change(function() {

        var x = $("#mySelect").val();
        if (x == "0") {
            url = '{{ route("subcripciones") }}';
            window.location.href = url;
        } else {

            ruta(x);
        }
    });


    function ruta(id) {


        url = '{{ route("plataforma", ":id") }}';

        url = url.replace(':id', id);

        location.href = url;

    }
</script>


@endsection