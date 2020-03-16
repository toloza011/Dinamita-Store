@extends('layout')
@section('url','Review Subcripcion')
@section('content')

@if($InfoSubcripcion)


<section class="content">
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{$InfoSubcripcion->tipo_subscripcion}}</h3>
                    <div class="col-12">
                        <img src="{{asset($InfoSubcripcion->url_subscripcion)}}" class="product-image" alt="Product Image">
                    </div>
                   
                </div>

        
               
                <div class="col-12 col-sm-6">
                
                    <h3 class="my-3" style="color:black;"><b>  {{$InfoSubcripcion->nombre_plataforma}} </b></h3>
                    <p style="color:black">{{$InfoSubcripcion->tipo_subscripcion}} de suscripción</p>
                        
                        <hr>    
                        <h3 class="my-3" style="color:black;"><b> Stock </b></h3>
                        <p style="color:black">{{$InfoSubcripcion->stock_suscripcion}}</p>
                        <hr>
                    
                        <h4 style="color:black"><b>Plataforma</b></h4>  

                        @if($InfoSubcripcion->id_plataforma=="3")
                <div class="descripcion_juegobtn-group btn-group-toggle">
                    <label class="btn btn-default text-center ">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                        <br>
                        <i class="fab fa-playstation" style="color:black;"></i>
                    </label>
                    <label class="btn btn-dark text-center active">
                        <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                        <br>
                        <i class="fab fa-xbox" style="color:white;"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                        <br>
                        <i class="fas fa-desktop" style="color:black;"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                        <br>
                        <i class="fa fa-gamepad" style="color:black"></i>
                    </label>
                </div>
                
                    @elseif($InfoSubcripcion->id_plataforma==4)
                    <div class="descripcion_juegobtn-group btn-group-toggle">
                        <label class="btn btn-dark text-center active">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                            <br>
                            <i class="fab fa-playstation" style="color:white;"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                            <br>
                            <i class="fab fa-xbox" style="color:black;"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                            <br>
                            <i class="fas fa-desktop" style="color:black;"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                            <br>
                            <i class="fa fa-gamepad" style="color:black"></i>
                        </label>
                    </div>
                    @elseif($InfoSubcripcion->id_plataforma==5)
                    <div class="descripcion_juegobtn-group btn-group-toggle">
                        <label class="btn btn-default text-center ">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                            <br>
                            <i class="fab fa-playstation" style="color:black;"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                            <br>
                            <i class="fab fa-xbox" style="color:black;"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                            <br>
                            <i class="fas fa-desktop" style="color:black;"></i>
                        </label>
                        <label class="btn btn-dark text-center active">
                            <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                            <br>
                            <i class="fa fa-gamepad" style="color:white"></i>
                        </label>
                    </div>
                    @else
                    <div class="descripcion_juegobtn-group btn-group-toggle">
                        <label class="btn btn-default text-center ">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off"> PS4
                            <br>
                            <i class="fab fa-playstation" style="color:black;"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option2" autocomplete="off"> XOne
                            <br>
                            <i class="fab fa-xbox" style="color:black;"></i>
                        </label>
                        <label class="btn btn-dark text-center active">
                            <input type="radio" name="color_option" id="color_option3" autocomplete="off"> PC
                            <br>
                            <i class="fas fa-desktop" style="color:white;"></i>
                        </label>
                        <label class="btn btn-default text-center ">
                            <input type="radio" name="color_option" id="color_option4" autocomplete="off"> Switch
                            <br>
                            <i class="fa fa-gamepad" style="color:black"></i>
                        </label>
                    </div>
                    @endif


                        
                        <div class="bg-gray py-2 px-3 mt-4 row"style="margin-left:1px">
                                <div class="col-9">
                                <h2 class="mb-0"> CLP</h2>
                                </div>
                                <div align="right"class="col-3 ">
                                <h2  class="mb-0"> 
                                
                                    ${{$InfoSubcripcion->precio_subscripcion}}
                                </h2>
                                </div>
                            </div>



                            
                    
                </div>
               
                

                diego 

                

                fin diego
                    

                        

                    

                    
                   

                
                </div>
                
            </div>
            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endif
@endsection

