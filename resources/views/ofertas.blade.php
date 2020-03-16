
@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



<script src="js/slider2.js"></script>

<style>
    h2 b {
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



   <!-------- OFERTA 50% DESCUENTO----->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="text-center" style="font-size:large;">
            <h2 style="text-transform:uppercase; font-size:30px;">{{$ofertas[0]->nombre_oferta}}<br><b>{{$ofertas[0]->descripcion_oferta}}</b></h2>
            </div>
        </div>
    </div>
    <div class="container mt-5">
		<!---<h5 style="margin-top:80px;margin-left:1%; color:black"><b>Juegos a mitad de precio</b></h5>-->
        @foreach($ofertas as $juego)
         @if($juego->id_oferta==2)
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
                                <?php  
                                 $aux=$juego->precio_juego; 
                                ?>
                                @foreach($ofertas as $item)
                                @if($juego->id_juego == $item->id_juego )
								<?php $aux = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);	?>
                                
                                @endif
                                @endforeach
                                

                                
								<label>${{$aux}}</label>
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
        @endif
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
        
		
	</div>
   <!-------- OFERTA 20% DESCUENTO----->

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="text-center" style="font-size:large;">
            <h2 style="text-transform:uppercase; font-size:30px;">{{$ofertas[2]->nombre_oferta}}<br><b>{{$ofertas[2]->descripcion_oferta}}</b></h2>
            </div>
        </div>
    </div>
    <div class="container mt-5">
		<!---<h5 style="margin-top:80px;margin-left:1%; color:black"><b>Juegos a mitad de precio</b></h5>-->
        @foreach($ofertas as $juego)
         @if($juego->id_oferta==3)
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
        @endif
		@endforeach
		
		
	</div>


  <!-------- OFERTA JUEGOS GRATIS----->

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="text-center" style="font-size:large;">
            <h2 style="text-transform:uppercase; font-size:30px;">{{$ofertas[3]->nombre_oferta}}<br><b>{{$ofertas[3]->descripcion_oferta}}</b></h2>
            </div>
        </div>
    </div>
    <div class="container mt-5">
		<!---<h5 style="margin-top:80px;margin-left:1%; color:black"><b>Juegos a mitad de precio</b></h5>-->
        @foreach($ofertas as $juego)
         @if($juego->id_oferta==4)
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
        @endif
		@endforeach
		
		
	</div>
    <script src="js/popup.js"></script>
    
<br>

















@stop


