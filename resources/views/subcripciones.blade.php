@extends('layout')
@section('url','Subcripciones')
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
               <h5>Filtrar por Consola: </h5>
               <select name="" class="form-control" id="">
                @foreach ($InfoPlataforma as $plataforma)
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
					<img src="https://production-gameflipusercontent.fingershock.com/us-east-1:664ca064-051c-4496-8b49-dc4a9c991987/2ffe09d3-c7a0-4802-8f1a-281c846bc889/8ec97db4-177e-4885-b350-21ead6b32265" class="img-responsive caratula">
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
                            <a href="{{route('review',$subcripcion->id_subscripcion)}}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Comprar</a></div>
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
