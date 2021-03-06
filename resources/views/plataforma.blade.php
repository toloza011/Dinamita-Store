@extends('layout')
@section('url','Catalogo de Videojuegos')
@section('content')
<link rel="stylesheet" href="{{asset('css/estilos1.css')}}">

<!----Catalogo Subcripciones--------->

@if($contJuegos>0)
<!----Catalogo Juegos--------->

<div class="row">
    <div class="container container-fluid">
        <div >
            <div style="margin-top:4%;margin-bottom:20px" class="col-md-4">
                <h5 style="color:black">Filtrar por plataforma: </h5>
                <select style="width:300px" class="form-control" name="tablas" id="mySelect">
                    <option value="0">Todos</option>
                    @foreach ($InfoPlataformaJ as $categoria)
                    @if($Plataforma->nombre_plataforma == $categoria->nombre_plataforma)
                    <option value="{{$categoria->id_plataforma}}" selected>{{$categoria->nombre_plataforma}}</option>
                    @else
                    <option value="{{$categoria->id_plataforma}}">{{$categoria->nombre_plataforma}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="container">
                <h1 style="color:black;margin-left:10px"> <b>{{$Plataforma->nombre_plataforma}}</b></h1>
            </div>

        </div>
    </div>
</div>




<div class="container container-fluid">
    <div class="row">
        <div class="col-md-12" style='margin-bottom: 20px'>
            @foreach($Juegos as $juego)
            <div class="col-sm-4 col-md-3">
                <div style="height:380px;" class="thumbnail">
                    @foreach($InfoPlataformaJ as $plataforma)
                    @if($juego->id_plataforma == $plataforma->id_plataforma )
                    <?php $x = $plataforma->nombre_plataforma ?>
                    @endif
                    @endforeach
                    <h4 class="text-center"><span class="badge badge-dark">{{$x}}</span></h4>
                    <img src="{{$juego->url_juego}}" class="img-responsive caratula">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-7 col-xs-7">
                                <h5>{{$juego->nombre_juego}}</h5>
                            </div>
                            <div class="col-md-5 col-xs-5 price">
                                <h4 align='right'>
                                    @foreach($ofertas as $item)
                                        @if($juego->id_juego == $item->id_juego)
                                            <?php $juego->precio_juego = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);	?>
                                        @endif
                                    @endforeach
                                    <label>${{$juego->precio_juego}}</label>
                                </h4>
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
                                    <?php
                                        $flag=false;
                                        $count = 0;
                                        foreach($asd as $aux){
                                            if($aux->id_juego == $juego->id_juego){
                                                $count++;
                                            }
                                        }
                                        if($count == $juego->stock_juego){
                                            $flag=true;
                                        }
                                    ?>
                                    @if($flag)
                                        <div class="col-md-6">
                                            <a style="background-color:rgb(231, 76, 60); color:white" class="btn btn-danger btn-abrir-popup btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <a href="{{route('carrito',$juego->id_juego)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                                        </div>
                                    @endif
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
            <script src="js/popup.js"></script>
        </div>
    </div>
</div>
@else
<div class="container">
   <div class="row">
     <h1>Oops! No hay resultados para este filtro :(</h1>
   </div>
</div>
@endif

<!---- FIN Catalogo JUEGOS--------->

<script>
    $("#mySelect").change(function() {

        var x = $("#mySelect").val();
        if (x == "0") {
            url = '{{ route("subcripciones") }}';
            window.location.href = url;
        } else {

            ruta(x);
        }
    });


    function ruta(id) {


        url = '{{ route("plataforma", ":id") }}';

        url = url.replace(':id', id);

        location.href = url;

    }
</script>


@endsection
