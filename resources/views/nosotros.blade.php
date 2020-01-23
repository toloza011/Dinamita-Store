@extends('plantilla')

@section('seccion')
    <h1>Este es mi equipo</h1>
    @foreach($equipo as $item)
        <a href="{{route('nosotros',$item)}}" class="h4 text-info">{{$item}}</a><br>
    @endforeach

    @if(!empty($nombre))

        @switch($nombre)
            @case($nombre == 'miguel')
                <h2 class="mt-5">El nombre es {{$nombre}}:</h2>
                <P>{{$nombre}} es un tipo muy.........</p>
                @break
            @case($nombre == 'juan')
                <h2 class = "mt-5">El nombre es {{$nombre}}:</h2>
                <P>{{$nombre}} es un tipo muy.........</p>
                @break
            @case($nombre == 'pepe')
                <h2 class = "mt-5">El nombre es {{$nombre}}:</h2>
                <P>{{$nombre}} es un tipo muy.........</p>
                @break     

        @endswitch    


    @endif
@endsection