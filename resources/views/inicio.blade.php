@extends('layout')

@section('content')

<link rel="stylesheet"  href="{{asset('css/estilos.css')}}" >
<div class="card card-solid">
<div class="row justify-content-center">
	<div class="carrusel-all">
    	<div align="center"class="content-carrousel">
        	@foreach($consulta as $item)
        		<figure><a href="{{route('review',$item->id_juego)}}"><img src="{{asset($item->url_juego)}}"></a></figure>
        	@endforeach
    	</div>
	</div>

</div>
</div>





@endsection
