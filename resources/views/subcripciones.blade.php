@extends('layout')
@section('url','Subcripciones')
@section('content')
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
               <h5>Filtrar por Consola: </h5>
               <select name="" class="form-control" id="">
                @foreach ($InfoPlataformaS as $plataforma)
                <option value="{{$plataforma->nombre_plataforma}}">{{$plataforma->nombre_plataforma}}</option>
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
        @foreach($InfoSubcripcion as $subcripcion)
            <div class="col-sm-4 col-md-3">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Samsung</span></h4>
                <img src="{{$subcripcion->url_subscripcion}}" class="img-responsive caratula">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
                            <h5>{{$subcripcion->tipo_subscripcion}}</h5>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h4>
                                <label>${{$subcripcion->precio_subscripcion}}</label></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
                            <a href="{{route('reviewSub',$subcripcion->id_subscripcion)}}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
						    </div>
						<p> </p>
					</div>
				</div>
            </div>

            @endforeach


        </div>
    </div>
	</div>



@endsection
