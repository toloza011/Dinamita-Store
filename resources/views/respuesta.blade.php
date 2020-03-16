@extends('layout')
@section('url','Review Producto')
@section('content')
    @if($responseCode == 0)
    <div align='center' style='margin-top: 40px'>
        <h1><strong>¡Pago Realizado con Exito!</strong></h1>
    </div>
    @else
    <div align='center' style='margin-top: 40px'>
        <h1><strong>¡Error al Realizar el Pago!</strong></h1>
        <div style='margin-top: 50px'>
            <h5>Problemas al realizar pago, porfavor asegurece de insertar bien los datos</h5>
            <h5>y/o contar con fondos necesarios, para realizar la transacción.</h5>
        </div>
        <a href="{{route('pagar')}}" class="btn btn-danger mt-5 mb-5 btn-lg" style='background-color:rgb(231, 76, 60); border-radius: 50px; width: 500px' ><h4><strong>Volver a pagar</strong></h4></a>
    </div>
    @endif
@endsection