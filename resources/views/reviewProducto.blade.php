@extends('layout')
@section('url','Review Producto')
@section('content')

@if($InfoJuego)

<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<section class="content">
    <!-- Default box -->

    <div class="card-body">
        <div style="" class="row">
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
                    @foreach($imagenes as $item)
                    <div class="carousel-cell">

                        <img align="center" style="width:100%; height:350px" src="{{asset($item->url)}}">

                    </div>
                    @endforeach

                </div>
                <div style=""class="highlight-thumbs">
                    <div class="carousel-cell">

                        <img align="center" style="width:200px; height:100px" src="{{asset($InfoJuego->url_juego)}}">

                    </div>
                    @foreach($imagenes as $item)
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
                <h3 class="my-3">{{$InfoJuego->nombre_juego}}</h3>
                <p>{{$InfoJuego->descripcion_juego}}</p>
                <hr>
                <h4>Genero</h4>
                @foreach($Categoria as $categorias)
                <p>{{$categorias->nombre_categoria}}</p>
                @endforeach
                <hr>
                <h4>Plataforma</h4>
                <div class="descripcion_juegobtn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked=""> PS4
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
                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        ${{$InfoJuego->precio_juego}}
                    </h2>
                </div>

                <div class="mt-4">
                    <div class="btn btn-primary btn-lg btn-flat">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i> Agregar al carrito
                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- /.card-body -->

    <!-- /.card -->

</section>
@endif


@endsection