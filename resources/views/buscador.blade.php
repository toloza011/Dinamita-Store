@extends('layout')

@section('content')


<div class="container container-fluid">
        <div class="col-md-12">
            <div class="col-md-12">
            <h5 style="margin-top:4%;color:black">Buscar: </h5>
            <form  action="{{route('buscar')}}" method="get">
            <div class="row col-12">
              	<div style="width:50%">
                <input   type="search" name="buscador" id="buscador" class="form-control " style="width:100%" placeholder="Buscar...">
            	</div>
                <input type="submit" class="btn btn-dark" value="Buscar">
				
			</div>	
			</form>
		</div>
</div>



<div class="container container-fluid">
    <div class="row">
    	<div class="col-md-12">
            @foreach($consulta as $juego)
            <div class="col-md-4 ">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Samsung</span></h4>
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









@endsection