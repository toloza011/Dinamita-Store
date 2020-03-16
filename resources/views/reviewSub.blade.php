@extends('layout')
@section('url','Review Subcripcion')
@section('content')
<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">

@if($InfoSubcripcion)


<section class="content">
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{$InfoSubcripcion->tipo_subscripcion}}</h3>
                    <div class="col-12">
                        <img src="{{asset($InfoSubcripcion->url_subscripcion)}}" class="product-image" alt="Product Image">
                    </div>
                   
                </div>

        
               
                <div class="col-12 col-sm-6">
                
                            <h3 class="my-3" style="color:black;"><b>  {{$InfoSubcripcion->nombre_plataforma}} </b></h3>
                            <p style="color:black">{{$InfoSubcripcion->tipo_subscripcion}} de suscripción</p>
                                
                                <hr>    
                                <h3 class="my-3" style="color:black;"><b> Stock </b></h3>
                                <p style="color:black">{{$InfoSubcripcion->stock_suscripcion}}</p>
                                <hr>
                            
                                <h4 style="color:black"><b>Plataforma</b></h4>  

                                @if($InfoSubcripcion->id_plataforma=="3")
                        <div class="descripcion_juegobtn-group btn-group-toggle">
                            <label class="btn btn-default text-center ">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                                <br>
                                <i class="fab fa-playstation" style="color:black;"></i>
                            </label>
                            <label class="btn btn-dark text-center active">
                                <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                                <br>
                                <i class="fab fa-xbox" style="color:white;"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                                <br>
                                <i class="fas fa-desktop" style="color:black;"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                                <br>
                                <i class="fa fa-gamepad" style="color:black"></i>
                            </label>
                        </div>
                        
                            @elseif($InfoSubcripcion->id_plataforma==4)
                            <div class="descripcion_juegobtn-group btn-group-toggle">
                                <label class="btn btn-dark text-center active">
                                    <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                                    <br>
                                    <i class="fab fa-playstation" style="color:white;"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                                    <br>
                                    <i class="fab fa-xbox" style="color:black;"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                                    <br>
                                    <i class="fas fa-desktop" style="color:black;"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                                    <br>
                                    <i class="fa fa-gamepad" style="color:black"></i>
                                </label>
                            </div>
                            @elseif($InfoSubcripcion->id_plataforma==5)
                            <div class="descripcion_juegobtn-group btn-group-toggle">
                                <label class="btn btn-default text-center ">
                                    <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                                    <br>
                                    <i class="fab fa-playstation" style="color:black;"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                                    <br>
                                    <i class="fab fa-xbox" style="color:black;"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                                    <br>
                                    <i class="fas fa-desktop" style="color:black;"></i>
                                </label>
                                <label class="btn btn-dark text-center active">
                                    <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                                    <br>
                                    <i class="fa fa-gamepad" style="color:white"></i>
                                </label>
                            </div>
                            @else
                            <div class="descripcion_juegobtn-group btn-group-toggle">
                                <label class="btn btn-default text-center ">
                                    <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                                    <br>
                                    <i class="fab fa-playstation" style="color:black;"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                                    <br>
                                    <i class="fab fa-xbox" style="color:black;"></i>
                                </label>
                                <label class="btn btn-dark text-center active">
                                    <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                                    <br>
                                    <i class="fas fa-desktop" style="color:white;"></i>
                                </label>
                                <label class="btn btn-default text-center ">
                                    <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                                    <br>
                                    <i class="fa fa-gamepad" style="color:black"></i>
                                </label>
                            </div>
                            @endif


                        
                        <div class="bg-gray py-2 px-3 mt-4 row"style="margin-left:1px">
                                <div class="col-9">
                                <h2 class="mb-0"> CLP</h2>
                                </div>
                                <div align="right"class="col-3 ">
                                <h2  class="mb-0"> 
                                
                                    ${{$InfoSubcripcion->precio_subscripcion}}
                                </h2>
                                </div>
                        </div>

                       

                    @if($request->session()->has('identificador'))
                        @if($InfoSubcripcion->stock_suscripcion != 0 && $request->session()->get('identificador') != 4)
                        <div class="row">
                            <div class="mt-4 col-md-12"  > 
                                <a href="{{route('carrito',$InfoSubcripcion->id_subscripcion)}}" style="background-color:rgb(231, 76, 60) " class="btn btn-danger btn-lg btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>Agregar al carrito</a>
                            </div>
                            </div>
                        @else
                            <div class="mt-4">
                                <a style="background-color:rgb(231, 76, 60); color:white" class="btn btn-danger btn-abrir-popup btn-lg btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>Agregar al carrito</a>
                            </div>
                        @endif
                    @else
                  
                        <div class="mt-4 row">
                            <a href="{{route('login')}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger  btn-flat  "><i class="fas fa-cart-plus fa-lg mr-2 "></i>Agregar al carrito</a>
                        </div>
                    
                    @endif

                            
                    
                </div>
                  
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
                
            </div>
            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endif
@endsection

