@extends('layout')
@section('content')
<style>
	.login {
		height: 60vh;
	}
	#buscador{
    	display: none;
  	}
  	#buscarxd{
    	display:none;
  	}
	#kt_login_signin_submitxd{
		border-radius:25px;
		background-color:rgb(231, 76, 60);
	}
</style>
<div class="container">
	<div class="row justify-content-center">
		<div class=""></div>
		<div class="kt-login__container center-block" >
				<div class="kt-login__logo" style="margin-top: 1vh">
					<a href="#">
						<img src="{{asset('./assets/media/logos/imagenLogin.png')}}" style="height:150px;"/>
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
										<input class="form-control" type="email" style="border-radius:15px, " placeholder="correo" name="email" value="{{old('email')}}"autocomplete="off" required>
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
									
											<input type="submit" id="kt_login_signin_submit" class="btn btn-danger form-control col-6 col-md-3 mt-2" style="border-radius:25px;background-color:rgb(231, 76, 60)" value="Acceder">
											<!--<button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Acceder</button>-->
							</div>
						</div>
                    </form>
                    <form action="{{route('RecuperarContra')}}" method="get">
                        <div class="row justify-content-center">
                            <input type="submit" id="kt_login_signin_submit" class="btn btn-dark form-control col-6 col-md-3 mt-2" style="border-radius:25px;background-color:black" value="¿Olvidaste tu contraseña?">
                            <!--<button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Acceder</button>-->
                          </div>
                    </form>
                    <!--- <a href="" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Olvidaste tu contraseña?
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Cambia tu contraseña
                                            </div>
                                        </div>
                                    </a>
                                   --->
							<br><br><em><strong><h2 align="center" style="color: red">Los mejores juegos al mejor precio</h2></strong></em>
							</div>
@endsection
