<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dinamite Store</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
		body {
			font-family: 'Montserrat', sans-serif;
    /* Otro ejemplo */
		}
	</style>
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
        <link rel="shortcut icon" href="/assets/media/logos/favicon-web.png" />

</head>

<body style="background-image:url({{asset('./media/bg/b-10.png')}});background-attachment:fixed;background-size:100vw 100vh; background-repeat:no-repeat;">
    <br><br><br>
<div class="container" >
	<div class="row justify-content-center">
		<div class=""></div>
		<div class="kt-login__container center-block" >
				<div class="kt-login__logo" style="margin-top: 1vh">
					<a href="#">
						<img src="{{asset('./assets/media/logos/imagenLogin.png')}}"/>
					</a>
		</div>
		</div>
		</div>
		<br>
		<div class="row justify-content-center">

		@if(Session::has('mensaje'))
			    <div class="alert alert-danger col-12 col-md-4"><em> {!! session('mensaje') !!}</em></div>
				@endif
		</div>
				<div class="kt-login__signin">
					<div class="kt-login__head">
						<h5 class="kt-login__title" style="text-align:center;"><strong>Iniciar Sesión</strong></h5>
					</div>
					<br>
					<form class="kt-form" method="POST" action="validacion" >

						<div class="row justify-content-center">
							<div class="col-12 col-md-4">
									<div class="input-group {{$errors->has('email')?'alert alert-danger':''}}">
										<input class="form-control" type="email" style="border-radius:15px" placeholder="correo" name="email" value="{{old('email')}}"autocomplete="off" required>
                                        {!!$errors->first('email','<span class="help-block">:message</span>')!!}
									</div>
									<br>
									<div class="input-group {{$errors->has('password')?'alert alert-danger':''}}">
										<input class="form-control" type="password" style="border-radius:15px" placeholder="Contraseña" name="password" required>

									</div>
									<br>

									</div>
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<!--
										<div class="col kt-align-right">
											<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Olvidaste tu Contraseña ?</a>
										</div>-->
									</div>
									<div class="row justify-content-center">


											<input type="submit" id="kt_login_signin_submit" class="btn btn-danger form-control col-6 col-md-2" style="border-radius:25px" value="Acceder">
											<!--<button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Acceder</button>-->


							</div>


						</div>
					</form>
							<br><br><em><strong><h3 align="center" style="color: red">"Los mejores juegos al mejor precio"</h3></strong></em>
							</div>



</body>
</html>
