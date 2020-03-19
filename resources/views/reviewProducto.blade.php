@extends('layout')
@section('url','Review Producto')
@section('content')

@if($InfoJuego)

<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<section class="content">
    <!-- Default box -->

    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">Titulo</h3>
                <!--  <div style="width:600px;" class="col-12">
                        <img style="width:600px;height:300px" src="{{asset($InfoJuego->url_juego)}}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @foreach($imgs as $item)
                        <div class="product-image-thumb active"><img src="{{asset($item->url)}}" alt="Product Image"></div>
                        @endforeach
                    </div> -->

                <div style="height:350px; " class="highlight-main">

                    <div class="carousel-cell">

                        <img align="center" style="width:100%; height:350px" src="{{asset($InfoJuego->url_juego)}}">

                    </div>
                    @foreach($imgs as $item)
                    <div class="carousel-cell">

                        <img align="center" style="width:100%; height:350px" src="{{asset($item->url)}}">

                    </div>
                    @endforeach

                </div>
                <div class="highlight-thumbs">
                    <div class="carousel-cell">

                        <img align="center" style="width:200px; height:100px" src="{{asset($InfoJuego->url_juego)}}">

                    </div>
                    @foreach($imgs as $item)
                    <div class="carousel-cell">
                        <img style="width:200px; height:100px" src="{{asset($item->url)}}">
                    </div>
                    @endforeach
                    <div class="carousel-scrollbar is-hidden">
                        <div class="carousel-scrollbar-inner"></div>
                    </div>
                </div>
                <script src="js/slider2.js"></script>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3" style="color:black;"><b>{{$InfoJuego->nombre_juego}}</b></h3>
                <p style="color:black">{{$InfoJuego->descripcion_juego}}</p>
                <hr>
                <h4 style="color:black"><b>Genero</b></h4>
                <div class="row">
                    @foreach($CategoriaJuego as $categorias)
                    <p style="margin-left:12px;color:black;">{{$categorias->nombre_categoria}}</p>
                    @endforeach
                </div>
                <hr>
                <h4 style="color:black"><b>Stock</b></h4>
                @if($InfoJuego->stock_juego != 0)
                    <p style="color:black;">{{$InfoJuego->stock_juego}} Copias</p>
                @else
                <p style="color:red;">{{$InfoJuego->stock_juego}} Copias</p>
                @endif
                <hr>
                <h4 style="color:black"><b>Plataforma</b></h4>

                @if($PlataformaJuego[0]->id_plataforma=="3")
                <div class="descripcion_juegobtn-group btn-group-toggle">
                    <label class="btn btn-default text-center ">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                        <br>
                        <i class="fab fa-playstation" style="color:black;"></i>
                    </label>
                    <label class="btn btn-default text-center active">
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
                
                    @elseif($PlataformaJuego[0]->id_plataforma==4)
                    <div class="descripcion_juegobtn-group btn-group-toggle">
                        <label class="btn btn-default text-center active">
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
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                            <br>
                            <i class="fa fa-gamepad" style="color:black"></i>
                        </label>
                    </div>
                    @elseif($PlataformaJuego[0]->id_plataforma==5)
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
                        <label class="btn btn-default text-center active">
                            <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                            <br>
                            <i class="fa fa-gamepad" style="color:black"></i>
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
                            @foreach($ofertas as $item)
                            @if($InfoJuego->id_juego == $item->id_juego)
                            <?php $InfoJuego->precio_juego=$item->precio_juego - (($item->descuento * $item->precio_juego) / 100);?>
                            @endif
                            @endforeach
                            ${{$InfoJuego->precio_juego}}
                        </h2>
                        </div>
                    </div>



                    @if($request->session()->has('identificador'))
                        @if($InfoJuego->stock_juego != 0 && $request->session()->get('identificador') != 4)
                            <?php
                                $flag=false;
                                $count = 0;
                                foreach($asd as $aux){
                                    if($aux->id_juego == $InfoJuego->id_juego){
                                        $count++;                                            
                                    }
                                }
                                if($count == $InfoJuego->stock_juego){
                                    $flag=true;
                                }
                            ?>
                            @if($flag)
                                <div class="mt-4">
                                    <a style="background-color:rgb(231, 76, 60); color:white" class="btn btn-danger btn-abrir-popup btn-lg btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>Agregar al carrito</a>
                                </div>
                            @else
                                <div class="row">
                                    <div class="mt-4 col-md-12"  > 
                                        <a href="{{route('carrito',$InfoJuego->id_juego)}}" style="background-color:rgb(231, 76, 60) " class="btn btn-danger btn-lg btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>Agregar al carrito</a>
                                    </div>
                                </div>
                            @endif
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
    <!-- /.card-body -->
 
    <!-- /.card -->

</section>
@endif


@endsection