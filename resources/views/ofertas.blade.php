@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="js/slider2.js"></script>


<div class="container-fluid">
<div class="row mt-2" style="background-image:url('assets/media/bg/halo2.jpg');  background-size: 1250px 200px; background-repeat:no-repeat; ">
    <div class="col-md-6 offset-3">
        <div class="row justify-content-center" align="center" style="margin-top:30px">
            <i class="fas fa-bolt mt-3" style="font-size:70px; color:yellow"></i>
            <h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:65px">O</h1>
            <h1 style="font-family: fantasy;color:black;font-size:65px">FERTAS</h1>
        </div>
        <div class="row justify-content-center" align="center" >
        <h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:65px">R</h1>
        <h1 style="font-family: fantasy;color:black;font-size:65px">ELAMPAGO</h1>
        </div>
    </div>
</div>

<!---fin filtros---->
<br>
@foreach($InfoOfertas as $InfoOfertas)
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="row justify-content-center" align="center" style="margin-top:30px"> 
            <h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:65px">O</h1>
            <h1 style="font-family: fantasy;color:black;font-size:65px">FERTAS</h1>
            <h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:65px" class="ml-3"> D</h1>
            <h1 style="font-family: fantasy;color:black;font-size:65px">E</h1>
            <h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:65px" class="ml-3"> L</h1>
            <h1 style="font-family: fantasy;color:black;font-size:65px">A</h1>
            <h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:65px" class="ml-3"> S</h1>
            <h1 style="font-family: fantasy;color:black;font-size:65px">EMANA</h1>
        <h1 style="font-family: fantasy;color:black;font-size:65px">{{$InfoOfertas->nombre_oferta}}</h1>

        </div>
    </div>
</div>
<!---catalogo de productos--->
<div  class="container container-fluid">
    <div class="row">
        <div class="col-md-12">
            @foreach($ofertas as $juego)
            <?php $valorOferta = $juego->precio_juego - (($juego->descuento * $juego->precio_juego) / 100); ?>
            <div class="col-sm-4 col-md-3">
                <div style="height:380px;" class="thumbnail">
                    <h4 class="text-center"><span class="badge badge-dark">{{$juego->nombre_plataforma}}</span></h4>
                    <img src="{{asset($juego->url_juego)}}" class="img-responsive caratula">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-8 col-xs-8">
                                <h5>{{$juego->nombre_juego}}</h5>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 price">
                                <h5 align='right'>
                                    @foreach($ofertas as $item)
                                    @if($juego->id_juego == $item->id_juego)
                                    <?php $juego->precio_juego = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);    ?>
                                    @endif
                                    @endforeach
                                    <label>${{$juego->precio_juego}}</label>
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-xs-8">
                                <h5>Stock</h5>
                            </div>
                            @if($juego->stock_juego == 0)
                            <div class="col-md-4 col-xs-4 price" align='right'>
                                <h5 style='color: red'><label>{{$juego->stock_juego}}</label></h5>
                            </div>
                            @else
                            <div class="col-md-4 col-xs-4 price" align='right'>
                                <h5><label>{{$juego->stock_juego}}</label></h5>
                            </div>
                            @endif
                        </div>
                        <div class="row text-center ">
                            <div class="col-md-6">
                                <a href="{{route('review',$juego->id_juego)}}" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Reseña</a>
                            </div>
                            @if($request->session()->has('identificador'))
                            <div class="col-md-6">
                                <a href="{{route('carrito',$juego->id_juego)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
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
@endforeach
<br>


<!---fin catalogo--->

@stop
