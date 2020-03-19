@extends('layout')
@section('url','Subcripciones')
@section('content')
<?php

    require_once '../vendor/autoload.php';

    use Transbank\Webpay\Webpay;
    use Transbank\Webpay\Configuration;
    $tot=0;
    foreach($asd as $juego){
        foreach($ofertas as $item){
            if($juego->id_juego == $item->id_juego){
                $juego->precio_juego = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);
            }
        }
        $tot += $juego->precio_juego;
    }
    foreach($asd2 as $qwe){
        $tot+=$qwe->precio_subscripcion;
    }

    if($tot != 0){
        $transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))->getNormalTransaction();
        $amount = $tot;
        $sessionId = 'sessionId';
        $buyOrder = $orden;
        echo '<script>window.localStorage.setItem("buyOrder",' .  $buyOrder  . ' );</script>';
        $returnUrl = 'http://127.0.0.1:8000/retorno.blade.php';
        $finalUrl = 'http://127.0.0.1:8000/final.blade.php';

        $initResult = $transaction->initTransaction(
            $amount, $buyOrder, $sessionId, $returnUrl, $finalUrl
        );
        $formAction = $initResult->url;
        $tokenWs = $initResult->token;
    }else{
        $formAction = 'http://127.0.0.1:8000/respuesta';
    }

?>
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<div>
    <h1 class="flaticon2-shopping-cart-1" style='margin-left: 50px'><strong> CARRITO</strong></h1>
</div>
<div class='row'>
    <div class='col-md-6' style='margin-bottom: 40px'>
        <div class="container container-fluid" data-scroll="true" data-height="700" data-mobile-height="200">
            @if($asd != null)
            <h3 style='margin: 30px'><strong><u>JUEGOS</u></strong></h3>
            @endif
            <div class="row">
                <div class="col-md-12">
                    @foreach($asd as $juego)
                    <div class="col-sm-4 col-md-6">
                        <div style="height:380px;" class="thumbnail">
                            <h4 class="text-center"><span class="badge badge-dark">{{$juego->nombre_plataforma}}</span></h4>
                            <img src="{{asset($juego->url_juego)}}" class="img-responsive caratula">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-8 col-xs-8">
                                        <h5>{{$juego->nombre_juego}}</h5>
                                    </div>
                                    <div class="col-md-4 col-xs-4 price">
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
                                        <a href="{{route('review',$juego->id_juego)}}" style='height: 40px;' class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Reseña</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('del',$juego->id_carrito)}}" style=" height: 40px; background-color:rgb(231, 76, 60);" class="btn btn-danger btn-product"><span style="margin-right:5px;" class="flaticon2-trash"></span>Eliminar</a>
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if($asd2 != null)
            <h3 style='margin: 30px; margin-top: 40px'><strong><u>SUSCRIPCIONES</u></strong></h3>
            @endif
            <div class="row">
                <div style="margin-top:18px" class="col-md-12">
                    @foreach($asd2 as $subcripcion)
                    <div class="col-sm-4 col-md-6">
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
                                        <h4 align='right'>
                                            <label>${{$subcripcion->precio_subscripcion}}</label>
                                        </h4>
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
                                        <a href="{{route('reviewSub',$subcripcion->id_subscripcion)}}" style="height: 40px" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Review</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('del',$subcripcion->id_carrito)}}" style="height: 40px; background-color:rgb(231, 76, 60)" class="btn btn-dark btn-product"><span style="margin-right:5px" class="flaticon2-trash"></span>Eliminar</a>
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class='col-md-5' style='margin-top: 30px; margin-left: 30px'>
        <?php $tot = 0; ?>
        @if($asd != null)
        <p><strong><u>Juegos</u></strong></p>
        @endif
        <div class='row'>
            <div class='col-md-5'>
                @foreach($asd as $juego)
                    <p style='margin-left: 30px'>{{$juego->nombre_juego}}</p>
                @endforeach
            </div>
            <div class='col-md-4'>
                @foreach($asd as $juego)
                    <p>CLP $ {{$juego->precio_juego}}</p>
                    <?php $tot += $juego->precio_juego; ?>
                @endforeach
            </div>
            <div class='col-md-1'>
                @foreach($asd as $juego)
                    <p><a href="{{route('del',$juego->id_carrito)}}" class="flaticon2-trash"></a></p>
                @endforeach
            </div>
        </div>
        @if($asd2 != null)
        <p style='margin-top: 20px'><strong><u>Suscripciones</u></strong></p>
        @endif
        <div class='row'>
            <div class='col-md-5'>
                @foreach($asd2 as $subcripcion)
                    <p style='margin-left: 30px'>{{$subcripcion->nombre_plataforma}} ({{$subcripcion->tipo_subscripcion}})</p>
                @endforeach
            </div>
            <div class='col-md-4'>
                @foreach($asd2 as $subcripcion)
                    <p>CLP $ {{$subcripcion->precio_subscripcion}}</p>
                    <?php $tot += $subcripcion->precio_subscripcion; ?>
                @endforeach
            </div>
            <div class='col-md-1'>
                @foreach($asd2 as $subcripcion)
                    <p><a href="{{route('del',$subcripcion->id_carrito)}}" class="flaticon2-trash"></a></p>
                @endforeach
            </div>
        </div>
        <div class='row' style='margin-top:40px'>
            <div class='col-md-6'>
                <h4><strong>Total</strong></h4>
            </div>
            <div class='col-md-6'>
                <h4><strong>CLP $ <?php echo $tot ?></strong></h4>
            </div>
        </div>
        @if($asd2 != null || $asd != null)
            @if($tot != 0)
                <form action="<?php echo $formAction ?>" method="POST">
                    <input type="hidden" name='token_ws' value='<?php echo $tokenWs ?>'>
                    <input type="submit" style="background-color:rgb(231, 76, 60); border-radius: 30px; margin-top: 20px" class="btn btn-danger col-md-12 btn-lg" value= 'Comprar'/>
                </form>
            @else
                <form action="{{route('respuesta')}}" method="get" id= 'regresar1'>
                    @csrf
                    <input type="submit" style="background-color:rgb(231, 76, 60); border-radius: 30px; margin-top: 20px" class="btn btn-danger col-md-12 btn-lg" value= 'Comprar'/>
                </form>
            @endif
        @else
            <form action="{{route('home')}}" method="get" id= 'regresar'>
                @csrf
            </form>
            <script>
                document.getElementById('regresar').submit();
            </script>
        @endif
    </div>
</div>
@endsection