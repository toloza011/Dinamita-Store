@extends('layout')

@section('content')

<link rel="stylesheet"  href="{{asset('css/estilos.css')}}" >
<div class="row justify-content-center">
<div class="carrusel-all">
    <div align="center"class="content-carrousel">
        <figure><a href="google.com"><img src="{{asset('assets/media/juegos/DeadByDaylight.jpg')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/Celeste.png')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/Borderlands2.jpg')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/DarkSouls3.jpg')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/ResidentEvil2.png')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/TombRaider.jpg')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/AssassinCreedO.jpg')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/NoManSky.png')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/DevilMaycry5.png')}}" ></a></figure>
        <figure><a href="twitch.com"><img src="{{asset('assets/media/juegos/xd.jpg')}}" ></a></figure>
    </div>
</div></div>



<div class="container">
    <!-- lo saco de la base de datos: NOMBRE DE LA CATEGORIA -->
    <div class="container"><h1>Estrategia</h1>
    <div class="container container-fluid">
    <div class="row">
    	<div class="col-md-12">
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
                    <!-- lo saco de la base de datos: NOMBRE DE LA PLATAFORMA -->
					<h4 class="text-center"><span class="label label-info">Steam</span></h4>
                    <!-- lo saco de la base de datos:IMAGEN DEL JUEGO -->
					<img src="{{asset('assets/media/juegos/DeadByDaylight.jpg')}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
                            <!-- lo saco de la base de datos:NOMBRE DEL JUEGO -->
								<h3>Dead by daylight</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
                                 <!-- lo saco de la base de datos:PRECIO DEL JUEGO -->
								<label>$9500</label></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
						    </div>

						<p> </p>
					</div>
				</div>
            </div>
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
                <!-- lo saco de la base de datos: NOMBRE DE LA PLATAFORMA -->
					<h4 class="text-center"><span class="label label-info">Steam</span></h4>
					<img src="{{asset('assets/media/juegos/Celeste.png')}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>Celeste</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>$9500</label></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
						    </div>

						<p> </p>
					</div>
				</div>
            </div>
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Steam</span></h4>
					<img src="{{asset('assets/media/juegos/DarkSouls3.jpg')}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>Dark Souls 3</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>$14000</label></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
						    </div>

						<p> </p>
					</div>
				</div>
            </div>
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Steam</span></h4>
					<img src="{{asset('assets/media/juegos/TombRaider.jpg')}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>Tomb Raider</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>$20000</label></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
						    </div>

						<p> </p>
					</div>
				</div>
            </div>
  
      

        </div>
    </div>
	</div>
</div>

    </div>

</div>





@endsection
