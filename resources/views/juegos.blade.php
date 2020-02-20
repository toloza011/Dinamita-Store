@extends('layout')
@section('url','Catalogo de Videojuegos')
@section('content')
<div class="row">
    <div class="container container-fluid">
        <div class="col-md-12">
            <div class="col-md-8">
              <div class="form-group">
               <h5>Buscar: </h5>
                <input type="text" class="form-control" placeholder="Buscar...">
              </div>
            </div>
            <div class="col-md-4">
               <h5>Filtrar por categoria: </h5>

               <select name="" class="form-control" id="">
                @foreach ($InfoCategoria as $categoria)
                <option value="{{$categoria->nombre_categoria}}">{{$categoria->nombre_categoria}}</option>
                @endforeach
               </select>
            </div>
          </div>
    </div>

</div>
<br>
<!---catalogo de productos--->
  <div class="container container-fluid">
    <div class="row">
    	<div class="col-md-12">
            @foreach($InfoJuego as $juego)
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Samsung</span></h4>
					<img src="https://www.minecraft.net/content/dam/minecraft/home/Games_Subnav_Minecraft-228x350.png" class="img-responsive caratula">
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
                    <p class="text-center">{{$juego->descripcion_juego}}</p>
						<div class="row">
							<div class="col-md-12 text-center">
                            <a href="{{route('review',$juego->id_juego)}}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
						    </div>
						<p></p>
					</div>
				</div>
            </div>
            @endforeach
        </div>
            </div>

        </div>

<!---fin catalogo--->

@endsection
