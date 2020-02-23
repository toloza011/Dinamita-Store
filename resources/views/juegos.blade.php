@extends('layout')
@section('url','Catalogo de Videojuegos')
@section('content')
<!---filtos--->
<div class="row">
    <div class="container container-fluid">
        <div class="col-md-12">
            <div class="col-md-8">
            <h5>Buscar: </h5>
            <form action="" class="">
            <div class="row">
              <div class="form-group">
                    <input type="search" name="buscador" id="buscador" class="form-control " style="width:500px;" placeholder="Buscar...">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Buscar">
            </div>
        </div>
        </form>
            </div>
            <div class="col-md-4">
               <h5>Filtrar por categoria: </h5>
               <select name="" class="form-control" id="tipo">
               <option value="" selected>Todos</option>
                @foreach ($InfoCategoria as $categoria)
                <option value="{{$categoria->nombre_categoria}}">{{$categoria->nombre_categoria}}</option>
                @endforeach
               </select>
            </div>
          </div>
    </div>
</div>
<!---fin filtros---->
<br>
<!---catalogo de productos--->
  <div class="container container-fluid">
    <div class="row">
    	<div class="col-md-12">
            @foreach($allJuegos as $juego)
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="badge badge-dark">{{$juego->nombre_plataforma}}</span></h4>
                <img src="{{asset($juego->url_juego)}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-8 col-xs-8">
                            <h5>{{$juego->nombre_juego}}</h5>
							</div>
							<div class="col-md-4 col-xs-4 price">
								<h5>
								<label>${{$juego->precio_juego}}</label></h5>
							</div>
						</div>
						<div style="" class="row text-center ">
							<div class="col-md-6">
                            <a href="{{route('review',$juego->id_juego)}}" class="btn btn-dark btn-product"><span style="margin-right:5px" class="glyphicon glyphicon-heart-empty"></span>Review</a>
							</div>
							<div class="col-md-6">
							<a href="{{route('review',$juego->id_juego)}}" style="background-color:rgb(231, 76, 60)"class="btn btn-danger btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a>
						    </div>
							</div>
						<p></p>
					</div>
				</div>
            </div>
            @endforeach
            


        </div>
            </div>
        </div>
        <div >
        {{ $allJuegos->links() }}
        </div>
<!---fin catalogo--->

@endsection
