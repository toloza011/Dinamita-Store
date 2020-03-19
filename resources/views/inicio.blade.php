@extends('layout')

@section('content')
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


<style>
#ola{
	color: #ff1e00;
}

h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	background: rgba(230, 14, 14, 0.911);
	left: 0;
	right: 0;
	bottom: -10px;
}
</style>

<div class="container container-fluid">
	<div class="row justify-content-center" align="center" style="margin-top:80px">
		<h1 style="font-family: fantasy;color:rgb(219,21,48); font-size:100px">N</h1>
		<h1 style="font-family: fantasy;color:rgb(41,39,52);font-size:100px">OVEDADES</h1>
	</div>
	<div class="row justify-content-center" align="center">
		<div class="carrusel-all">
			<div align="center" class="content-carrousel">
				@foreach($consulta as $item)
				<figure><a href="{{route('review',$item->id_juego)}}"><img style="height:150px; width:240px;" src="{{asset($item->url_juego)}}"></a></figure>
				@endforeach
			</div>
		</div>
	</div>
	@if($ofertas != "no")
	<div class="container" style="width:80%; margin-top:2%">
		<div class="asd" align="center">
			<!-- <h1 style="font-family: fantasy;color:red">U</h1>
			<h1 style="font-family: fantasy;color:black">LTIMAS- </h1>
			<h1 style="font-family: fantasy;color:red">O</h1>
			<h1 style="font-family: fantasy;color:black">FERTAS</h1> -->
			OFERTAS ESPECIALES
		</div>
		<div style="height:600px; " class="highlight-main">
			@foreach($ofertas as $item)
			<?php $valorOferta = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100); ?>
			<div class="carousel-cell">
				<a href="{{route('review',$item->id_juego)}}"><img align="center" style="width:100%; height:500px" src="{{asset($item->url_juego)}}"></a>
				<div class="container1">
					<h3 style="margin-left:18px">{{$item->nombre_oferta}}</h3>
					<div style="margin-left:10px" class="row">
						<div class="oferta">
							<h2 style="margin-top:8px" align="center"><b>-{{$item->descuento}}%</b></h2>
						</div>
						<div style="margin-left:10px;" class="container2">
							<strike>
								<h6 align="center" style="margin-top:4px">CLP${{$item->precio_juego}}</h6>
							</strike>
							<h6 align="center">CLP${{$valorOferta}}</h6>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
		<div class="highlight-thumbs">
			@foreach($ofertas as $item)
			<div class="carousel-cell">
				<a href="{{route('review',$item->id_juego)}}"><img style="width:200px; height:100px" src="{{asset($item->url_juego)}}"></a>
			</div>
			@endforeach
			<div class="carousel-scrollbar is-hidden">
				<div class="carousel-scrollbar-inner"></div>
			</div>
		</div>
		<script src="js/slider2.js"></script>
	</div>
	@endif
	@php
	$xx=0;
	@endphp
	@foreach($populares as $item )
	@php
	$xx += 1;
	@endphp
	@endforeach

		@if($xx!= 0)
		<div  class="row mt-5">
       		<div class="col-md-12">
					<div class="text-center" style="font-size:large;">
					<h2 style="text-transform:uppercase; font-size:30px;">Productos<br><b id="ola">de tendencia</b></h2>
					</div>
       		</div>
   		</div>
		@endif
		   <br>

		@foreach($populares as $juego)
		<div class="col-sm-4 col-md-3">
			<div style="height:380px;" class="thumbnail">
				<h4 class="text-center"><span class="badge badge-dark">{{$juego->nombre_plataforma}}</span></h4>
				<img src="{{asset($juego->url_juego)}}" class="img-responsive caratula">
				<div class="caption">
					<div class="row">
						<div class="col-md-8 col-xs-8">
							<h5>{{$juego->nombre_juego}}</h5>
						</div>
						<div class="col-md-4 col-xs-4 price" align='right'>

							<h5 align='right'>
								@foreach($ofertas as $item)
								@if($juego->id_juego == $item->id_juego)
								<?php $juego->precio_juego = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);	?>

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
							@if($juego->stock_juego != 0 && $request->session()->get('identificador') != 4)
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
	@endsection
