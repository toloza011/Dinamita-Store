@extends('layout')

@section('content')


<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">

<div class="row">
	<div class="container container-fluid">
		<div class="col-md-12">
			<div style="margin-top:4%" class="col-md-4">
				<h2 style="color:black"><b>Filtrar por: "</b>{{$clave}}<b>"</b> </h2>
			</div>
		</div>
	</div>
</div>
<!---fin filtros---->
<br>
<!---catalogo de productos--->
<div class="container container-fluid">
	<div class="row">
		<div class="col-md-12" style='margin-bottom: 20px'>
			@foreach($consulta as $juego)
			<div class="col-sm-4 col-md-3">
				<div style="height:380px;" class="thumbnail">
					<h4 class="text-center"><span class="badge badge-dark">{{$juego->nombre_plataforma}}</span></h4>
					<img src="{{asset($juego->url_juego)}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-8 col-xs-8">
								<h5>{{$juego->nombre_juego}}</h5>
							</div>
							<div class="col-md-4 col-xs-4 price">

								<h5>
									@foreach($ofertas as $item)
									@if($juego->id_juego == $item->id_juego)
									<?php $juego->precio_juego = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);    ?>
									@endif
									@endforeach
									<label>${{$juego->precio_juego}}</label></h5>
							</div>
						</div>
                        <div class="row" align='bottom'>
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
                                @if($juego->stock_juego != 0)
                                    <div class="col-md-6">
                                        <a href="{{route('carrito',$juego->id_juego)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
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
                    <h4>Stock no Disponible</h4>
                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup btn btn-danger btn-product">Aceptar</a>
                </div>
            </div>
            <script src="js/popup.js"></script>
		</div>
	</div>
</div>
<?php
	$total = 0;
	foreach($consulta2 as $item)
	$total++;
?>
@if($total != 0)
<div class="container container-fluid">
<h2 style="color:black;margin-left:20px; margin-top: 30px;"><b>Suscripciones</b> </h2>
    <div class="row">
        <div style="margin-top:18px" class="col-md-12">
            @foreach($consulta2 as $subcripcion)
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
@endif
@endsection