@extends('layout')
@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <div class="container" Style="width:200px; height:100px">
            <form>
                <select class="form-control" name="tablas" id="mySelect">
                    <option selected value="0">Seleccionar Tabla</option>
                    <option value="1">Categorias</option>
                    <option value="2">Plataformas</option>
                    <option value="3">Juegos</option>
                    <option value="4">Subscripciones</option>
                </select>
            </form>
            <div>
            <label id="caca" for=""></label>
            </div>
        </div>
    <script>
        $( "#mySelect" ).change(function () {
                var str;
                str = $('#mySelect').val();
                switch (str){
                    case '1':
                        console.log(str)
                    break;
                    case '2':
                        console.log(str)
                    break;
                    case '3':
                        console.log(str)
                    break;
                    case '4':
                        console.log(str)
                    break;
                }
                
            });
    </script>
@endsection