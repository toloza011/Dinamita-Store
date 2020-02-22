@extends('layout')

@section('content')
<!-- SILEDER OFERTAS -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="{{asset('/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
    	touch: true,
    	pauseOnAction: false,
    	pauseOnHover: false,
    });
  });
</script>
<style>
@font-face {
  font-family:'flexslider-icon';
  src: url('../fonts/flexslider-icon.eot');
  src: url('../fonts/flexslider-icon.eot?#iefix') format('embedded-opentype'), url('../fonts/flexslider-icon.woff') 
  format('woff'), url('../fonts/flexslider-icon.ttf') format('truetype'), url('../fonts/flexslider-icon.svg#flexslider-icon') format('svg');
  font-weight: normal;
  font-style: normal;
}</style>
<!-- EDN SLIDER OFERTA -->
<link rel="stylesheet"  href="{{asset('css/estilos.css')}}" >
<div class="card card-solid">
<div align ="center"class="container" style="margin-top:4%;">
<h1><b>NOVEDADES</b></h1>
</div>
<div class="row justify-content-center">
	<div class="carrusel-all" style="margin-top:3%">
    	<div align="center"class="content-carrousel">
        	@foreach($consulta as $item)
        		<figure><a href="{{route('review',$item->id_juego)}}"><img src="{{asset($item->url_juego)}}"></a></figure>
        	@endforeach
    	</div>
	</div>
</div>

<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="	assets/media/juegos/Celeste.png" alt="">
				<section class="flex-caption">
					<p>LOREM IPSUM 1</p>
				</section>
			</li>
			<li>
				<img src="assets/media/juegos/DarkSouls3.jpg" alt="">
				<section class="flex-caption">
					<p>LOREM IPSUM 2</p>
				</section>
			</li>
			<li>
				<img src="assets/media/juegos/AssassinCreedO.jpg" alt="">
				<section class="flex-caption">
					<p>LOREM IPSUM 3</p>
				</section>
			</li>
		</ul>
	</div>

</div>





@endsection
