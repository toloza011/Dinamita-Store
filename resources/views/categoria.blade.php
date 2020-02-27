@extends('layout')

@section('content')

<div class="row">
    <div class="container container-fluid">
        <div class="col-md-12">
            <div style="margin-top:4%;margin-bottom:20px" class="col-md-4">
                <h5 style="color:black">Filtrar por categoria: </h5>
                <select style="width:300px" class="form-control" name="tablas" id="mySelect">
                    <option value="0" >Todos</option>
                 
                    @foreach ($InfoCategoria as $categoria)
                    @if($Categoria->nombre_categoria == $categoria->nombre_categoria)
                    <option value="{{$categoria->id_categoria}}" selected>{{$categoria->nombre_categoria}}</option>
                    @else
                    <option value="{{$categoria->id_categoria}}" >{{$categoria->nombre_categoria}}</option>
                    @endif
                    @endforeach
                </select>

            </div>
            <div class="container"><h1 style="color:black;margin-left:10px"> <b>{{$Categoria->nombre_categoria}}</b></h1></div>
        </div>
    </div>
</div>



<div class="container container-fluid">
    <div class="row">
        <div class="col-md-12">
            @foreach($Juegos as $juego)
            <div class="col-sm-4 col-md-3">
                <div style="height:350px;" class="thumbnail">
                    <h4 class="text-center"><span class="badge badge-dark">{{$juego->nombre_plataforma}}</span></h4>
                    <img src="{{asset($juego->url_juego)}}" class="img-responsive caratula">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-8 col-xs-8">
                                <h5>{{$juego->nombre_juego}}</h5>
                            </div>
                            <div class="col-md-4 col-xs-4 price">

                                <h5>
                                    @foreach($ofertas as $item)
                                    @if($juego->id_juego == $item->id_juego)
                                    <?php $juego->precio_juego = $item->precio_juego - (($item->descuento * $item->precio_juego) / 100);    ?>
                                    @endif
                                    @endforeach
                                    <label>${{$juego->precio_juego}}</label></h5>
                            </div>
                        </div>
                        <div class="row text-center ">
                            <div class="col-md-6">
                                <a href="{{route('review',$juego->id_juego)}}" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Review</a>
                            </div>
                            @if($request->session()->has('identificador'))
                            <div class="col-md-6">
                                <a href="{{route('carrito',$juego->id_juego)}}" style="background-color:rgb(231, 76, 60)" class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
                            </div>
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



        </div>
    </div>
</div>

<script>
  
    $("#mySelect").change(function(){
        
        var x = $("#mySelect").val();
        if(x == "0"){
            url = '{{ route("juego") }}';
            window.location.href=url;
        }else{
        
        ruta(x);  
        }
    });


    function ruta(id){

       
        url = '{{ route("categoria", ":id") }}';

        url = url.replace(':id',id);

        location.href=url;

    }

</script>

@endsection