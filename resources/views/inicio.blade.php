@extends('layout')

@section('content')

<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


<div class="container container-fluid">
        <div class="col-md-12">
            <div class="col-md-12">
            <h5 style="margin-top:4%;color:black">Buscar: </h5>
            <form  action="" class="">
            <div class="row col-12">
              	<div style="width:50%">
                <input   type="search" name="buscador" id="buscador" class="form-control " style="width:100%" placeholder="Buscar...">
            	</div>
                <input type="submit" class="btn btn-dark" value="Buscar">
				
			</div>	
		</div>
</div>

	<div class="row justify-content-center" align="center" style="margin-top:200px">
		<h1 style="font-family: fantasy;color:rgb(219,21,48)">N</h1>
		<h1 style="font-family: fantasy;color:rgb(41,39,52)">OVEDADES</h1>
	</div>
	<div class="row justify-content-center">
		<div class="carrusel-all">
			<div align="center" class="content-carrousel" >
				@foreach($consulta as $item)
				<figure><a href="{{route('review',$item->id_juego)}}"><img src="{{asset($item->url_juego)}}"></a></figure>
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
				
				<?php $valorOferta = $item->precio_juego-(($item->descuento * $item->precio_juego)/100);?>
				<div class="carousel-cell">
				<a href="{{route('review',$item->id_juego)}}"><img align="center" style="width:100%; height:500px" src="{{asset($item->url_juego)}}"></a>
				<div class="container1">
				<h3 style="margin-left:18px">{{$item->nombre_oferta}}</h3>
				<div style="margin-left:10px"class="row">
				<div class="oferta">
				<h2 style="margin-top:8px" align="center"><b>-{{$item->descuento}}%</b></h2>
				</div>
				<div style="margin-left:10px;" class="container2">
					<strike><h6 align="center" style="margin-top:4px">CLP${{$item->precio_juego}}</h6></strike>
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
			<a href="{{route('review',$item->id_juego)}}"><img style="width:200px; height:100px"src="{{asset($item->url_juego)}}"></a>
			</div>
			@endforeach
			<div class="carousel-scrollbar is-hidden">
				<div class="carousel-scrollbar-inner"></div>
			</div>
		</div>
		<script src="js/slider2.js"></script>
		</div>
	@endif

	<div></div>








@endsection