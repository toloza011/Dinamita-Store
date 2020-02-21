@extends('layout')

@section('content')

<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<div class="card card-solid">
	<div class="container" align="center" style="margin-top:4%">
		<h1><strong>NOVEDADES</strong></h1>
	</div>
	<div class="row justify-content-center" style="margin-top:4%">
		<div class="carrusel-all">
			<div align="center" class="content-carrousel" >
				@foreach($consulta as $item)
				<figure><a href="{{route('review',$item->id_juego)}}"><img src="{{asset($item->url_juego)}}"></a></figure>
				@endforeach
			</div>
		</div>

	</div>
	<div class="container" align="center" style="margin-top:2%">
		<h1><strong>ULTIMAS OFERTAS</strong></h1>
	</div>

	<div class="container" style="width:80%;margin-top:4%">

		<div class="highlight-main">
		@foreach($consulta as $item)
			<div class="carousel-cell">
			<a href="{{route('review',$item->id_juego)}}"><img src="{{asset($item->url_juego)}}"></a>
			</div>
		@endforeach
		
		</div>
		<div class="highlight-thumbs">
		@foreach($consulta as $item)
			<div class="carousel-cell">
			<a href="{{route('review',$item->id_juego)}}"><img style="width:400px; height:200px"src="{{asset($item->url_juego)}}"></a>
			</div>
			@endforeach
			<div class="carousel-scrollbar is-hidden">
				<div class="carousel-scrollbar-inner"></div>
			</div>
		</div>
		<script src="js/slider2.js"></script>
	</div>

</div>







@endsection