<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->

<head>
    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">
    <!--end::Base Path -->
    <meta charset="utf-8" />

    <title>Dinamite Store</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles -->
    <link rel="stylesheet" href="assets/css/catalogo.css">

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="/assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/demo12/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            /* Otro ejemplo */
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link rel="shortcut icon" href="/assets/media/logos/favicon-web.png" />

</head>
<!-- end::Head -->

<!-- begin::Body -->


<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
        <a href="{{route('home')}}">
                <img alt="Logo" src="/assets/media/logos/logo-12.png" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                    <a href="{{route('home')}}">
                            <img alt="Logo" src="/assets/media/logos/logo-12.png">
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>
                <!-- end:: Aside -->
                <!-- begin:: Aside Menu -->

                <!------------------------------------------------------------------------
                ----------------------------------------------------------------------
                ------                                                          ------
                ------                                                          ------
                ------                     ASIDE MENÚ                           ------
                ------                                                          ------
                ------                                                          ------
                ----------------------------------------------------------------------
                ------------------------------------------------------------------------>

                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                                <a href="{{route('home')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-icon flaticon2-architecture-and-city"></i>
                                    <span class="kt-menu__link-text">Inicio</span>
                                </a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Juegos</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-icon flaticon2-start-up"></i>
                                    <span class="kt-menu__link-text">Categoría</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu ">
                                    <span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                            <span class="kt-menu__link">
                                                <span class="kt-menu__link-text">Categoría</span>
                                            </span>
                                        </li>
                                        @foreach($InfoCategoria as $item)
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{route('categoria',$item->id_categoria)}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">{{$item->nombre_categoria}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-icon flaticon2-laptop"></i>
                                    <span class="kt-menu__link-text">Plataforma</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu ">
                                    <span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                            <span class="kt-menu__link">
                                                <span class="kt-menu__link-text">Plataforma</span>
                                            </span>
                                        </li>

                                        @foreach($InfoPlataformaJ as $item)
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{route('plataforma',$item->id_plataforma)}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">{{$item->nombre_plataforma}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <!-- ----------- FIN BOTON JUEGOS ----------------- -->

                            <!-- ----------- BOTON SUBSCRIPCIONES ----------------- -->
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Suscripciones</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-icon flaticon2-laptop"></i>
                                    <span class="kt-menu__link-text">Plataforma</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu ">
                                    <span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">

                                        @foreach($InfoPlataformaS as $item)
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('plataforma',$item->id_plataforma)}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">{{$item->nombre_plataforma}}</span>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                            <!-- ----------- FIN BOTON SUBSCRIPCIONES ----------------- -->
                            @if($request->session()->has('identificador'))
                            <?php $idUser = $request->session()->get('identificador');?>

                            @if($idUser == 4)
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Admin</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-icon flaticon2-laptop"></i>
                                    <span class="kt-menu__link-text">Administrar</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu ">
                                    <span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">


                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('ListaUsuarios')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Usuarios</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('ListaJuegos')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Juegos</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('ListaSus')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Suscripciones</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('plataforma',$item->id_plataforma)}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Ofertas</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('agregar')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Categorias</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{Route('agregarPlataforma')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Plataformas</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                    <!-- begin: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <ul class="kt-menu__nav ">
                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                    <a href="{{route('juego')}}" class="kt-menu__link "><span class="kt-menu__link-text">Juegos</span></a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                    <a href="{{route('subcripciones')}}" class="kt-menu__link "><span class="kt-menu__link-text">Suscripciones</span></a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                <a href="{{route('Ofertas')}}" class="kt-menu__link "><span class="kt-menu__link-text">Ofertas Relampago</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end: Header Menu -->
                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">

                        <!--begin: Notifications -->


                        <!--end: Notifications -->
                        <!--begin: Quick Actions -->


                        <!--end: Quick Actions -->


                        @if($request->session()->has('identificador'))
                        <?php $nombreUser = $request->session()->get('nombre');
                               $idUser = $request->session()->get('identificador'); ?>
                        <!--begin: My Cart -->
                        @if($idUser != 4 )
                        <div class="kt-header__topbar-item dropdown">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
                                <span class="kt-header__topbar-icon">
                                    <i class="flaticon2-shopping-cart-1"></i>
                                </span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                                <form>
                                    <!-- begin:: Mycart -->
                                    <div class="kt-mycart">
                                        <div class="kt-mycart__head kt-head" style="background-image: url(./assets/media/misc/bg-1.jpg);">
                                            <div class="kt-mycart__info">
                                                <span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
                                                <h3 class="kt-mycart__title">Mi Carrito</h3>
                                            </div>
                                            <?php
                                            $tot = 0;
                                            ?>
                                            @foreach($asd as $item)
                                            <?php
                                            $tot += 1;
                                            ?>
                                            @endforeach
                                            @foreach($asd2 as $item)
                                            <?php
                                            $tot += 1;
                                            ?>
                                            @endforeach
                                            <div class="kt-mycart__button">
                                                <h6 class="kt-mycart__title"><strong><?php echo $tot ?> Items</strong></h6>
                                            </div>
                                        </div>
                                        <!------ITEM CARRITO-------------->
                                        <div class="kt-mycart__body kt-scroll" data-scroll="true" data-height="245" data-mobile-height="200">
                                            <div class="kt-mycart__item">
                                                <?php
                                                $tot = 0;
                                                ?>
                                                @if($asd != null)
                                                <h4 style="margin-left: 20px; margin-top:20px"><strong><u>JUEGOS</u></strong></h4>
                                                @endif
                                                @foreach($asd as $item)
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <span class="kt-mycart__title"><strong>{{$item->nombre_juego}}</strong></span>
                                                        <div class="kt-mycart__action">
                                                            @foreach($ofertas as $item2)
                                                            @if($item->id_juego == $item2->id_juego)
                                                            <?php
                                                            $item->precio_juego = $item2->precio_juego - (($item2->descuento * $item2->precio_juego) / 100);
                                                            ?>
                                                            @endif
                                                            @endforeach
                                                            <?php
                                                            $tot += $item->precio_juego
                                                            ?>
                                                            <span class="kt-mycart__price">CLP ${{$item->precio_juego}}</span>
                                                            <span class="kt-mycart__icon"><a href="{{route('del',$item->id_carrito)}}" class="flaticon2-trash kt-font-success"></a></span>
                                                        </div>
                                                    </div>
                                                    <span class="kt-mycart__pic">
                                                        <img src="{{asset($item->url_juego)}}" title="">
                                                    </span>
                                                </div>
                                                @endforeach
                                                @if($asd2 != null)
                                                <h4 style="margin-left: 20px; margin-top:20px"><strong><u>SUSCRIPCIONES</u></strong></h4>
                                                @endif
                                                @foreach($asd2 as $item)
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <span class="kt-mycart__title"><strong>{{$item->nombre_plataforma}}</strong></span>
                                                        <span class="kt-mycart__title">{{$item->tipo_subscripcion}}</span>
                                                        <div class="kt-mycart__action">
                                                            <?php
                                                            $tot += $item->precio_subscripcion
                                                            ?>
                                                            <span class="kt-mycart__price">CLP ${{$item->precio_subscripcion}}</span>
                                                            <span class="kt-mycart__icon"><a href="{{route('del',$item->id_carrito)}}" class="flaticon2-trash kt-font-success"></a></span>
                                                        </div>
                                                    </div>
                                                    <span class="kt-mycart__pic">
                                                        <img src="{{asset($item->url_subscripcion)}}" title="">
                                                    </span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!---------FIN ITEM CARRITO-------------------------------->


                                        <div class="kt-mycart__footer">
                                            <div class="kt-mycart__section">
                                                <div class="kt-mycart__subtitel">
                                                    <span>Total</span>
                                                </div>

                                                <div class="kt-mycart__prices">
                                                    <span class="kt-font-dark">CLP $<?php echo $tot ?></span>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__button kt-align-right">
                                                <a type="button" href='{{route("pagar")}}' class="btn btn-danger btn-sm" style="background-color: red">Pagar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end:: Mycart -->
                                </form>
                            </div>
                        </div>
                        @endif
                        <!--end: My Cart -->

                        <div class="kt-header__topbar-item kt-header__topbar-item--user">

                            <!-- nombre_usuario -->

                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
                                <span class="kt-header__topbar-username kt-hidden-mobile">{{$nombreUser}}</span>
                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>-->
                                </div>
                            </div>

                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(./assets/media/misc/bg-1.jpg)">
                                    <div class="kt-user-card__avatar">
                                        <img class="" alt="Pic" src="{{asset('assets/media/bg/300_25.png')}}" />
                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    </div>
                                    <div class="kt-user-card__name" style="color:black;">
                                        {{$nombreUser}}
                                    </div>

                                </div>
                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                <a href="{{route('InfoUser',$idUser)}}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Mi Perfil
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Configuracion de Cuenta
                                            </div>
                                        </div>

                                    </a>


                                    <div class="kt-notification__custom kt-space-between">
                                        <a href="{{route('logout')}}" class="btn btn-label btn-label-brand btn-sm btn-bold">Cerrar sesion</a>

                                    </div>
                                </div>
                                <!--end: Navigation -->
                            </div>
                        </div>
                        @else
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <ul class="kt-menu__nav ">
                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                    <a href="login" class="kt-menu__link "><span class="kt-menu__link-text">Iniciar sesion</span></a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                    <a href="registrar" class="kt-menu__link "><span class="kt-menu__link-text">Registrate</span></a>
                                </li>
                            </ul>
                        </div>
                        @endif
                        <!--end: Head -->

                        <!--end: User Bar -->

                    </div>
                    <!-- end:: Header Topbar -->
                </div>
                <!-- end:: Header -->

                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->

                    <!-- dashboard -->


                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="card card-solid">
                        @if(Session::has('mensaje'))
                        <div class="alert alert-success"><em> {!! session('mensaje') !!}</em></div>
                        @endif
                        @if(Session::has('mensaje2'))
                        <div class="alert alert-danger"><em> {!! session('mensaje2') !!}</em></div>
                        @endif


                        <form action="{{route('buscar')}}" method="GET">
                            <div style="margin-top:10px;margin-right:50px" class="row justify-content-end">
                                <div style="width:30%">
                                    <input type="search" name="buscador" id="buscador" class="form-control " style="width:100%" placeholder="Buscar...">
                                </div>
                                <input type="submit" class="btn btn-dark" value="Buscar">
                            </div>
                        </form>
                    @yield('content')
                    </div>
                    <!-- CONTENIDO DE LA PAGINAAAAA AQUIIII -->

                    <!-- end:: Content -->

                    <!-- begin:: Footer -->
                    <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-footer__copyright">
                                2020&nbsp;&copy;&nbsp;<a href="https://www.instagram.com/diego_ignacio_o/" target="_blank" class="kt-link">Equipo Dinamita</a>
                            </div>
                            <div class="kt-footer__menu">
                                <a href="https://www.instagram.com/neokayzer/" target="_blank" class="kt-footer__menu-link kt-link">Nosotros</a>
                                <a href="https://www.instagram.com/p/BidMC2MFc_I/" target="_blank" class="kt-footer__menu-link kt-link">Equipo</a>
                                <a href="https://www.instagram.com/manuel.pereira.99/" target="_blank" class="kt-footer__menu-link kt-link">Contactos</a>
                            </div>
                        </div>
                    </div>
                    <!-- end:: Footer -->
                </div>
            </div>
        </div>
        <!-- end:: Page -->

        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
        <!-- end::Scrolltop -->
        <!-- begin::Sticky Toolbar botones barra lateral derecha-->
        <!-- <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip"  title="Check out more demos" data-placement="right">
		<a href="#" class=""><i class="flaticon2-drop"></i></a>
	</li>
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip" title="Layout Builder" data-placement="left">
        		<a href="https://keenthemes.com/metronic/preview/demo12/builder.html" target="_blank"><i class="flaticon2-gear"></i></a>
	</li>
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Documentation" data-placement="left">
		<a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
	</li>

	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
		<a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
	</li>
</ul> -->
        <!-- end::Sticky Toolbar -->
        <!-- begin::Demo Panel -->

        <div id="kt_demo_panel" class="kt-demo-panel">
            <div class="kt-demo-panel__head">
                <h3 class="kt-demo-panel__title">
                    Select A Demo
                    <!--<small>5</small>-->
                </h3>
                <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
            </div>
            <div class="kt-demo-panel__body">
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 1
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo1.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo1/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 2
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo2.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 3
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo3.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 4
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo4.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 5
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo5.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 6
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo6.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 7
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo7.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 8
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo8.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 9
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo9.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 10
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo10.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 11
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo11.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item kt-demo-panel__item--active">
                    <div class="kt-demo-panel__item-title">
                        Demo 12
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo12.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 13
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo13.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>

                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 14
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="
                        /assets/media/demos/preview/demo14.jpg" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>

                        </div>
                    </div>
                </div>
                <a href="https://1.envato.market/EA4JP" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
                    Buy Metronic Now!
                </a>
            </div>
        </div>
        <!-- end::Demo Panel -->

        <!--Begin:: Chat-->
        <div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="kt-chat">
                        <div class="kt-portlet kt-portlet--last">
                            <div class="kt-portlet__head">
                                <div class="kt-chat__head ">
                                    <div class="kt-chat__left">
                                        <div class="kt-chat__label">
                                            <a href="#" class="kt-chat__title">Jason Muller</a>
                                            <span class="kt-chat__status">
                                                <span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
                                            </span>
                                        </div>
                                    </div>
                                    <div class="kt-chat__right">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon-more-1"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">
                                                <!--begin::Nav-->
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__head">
                                                        Messaging
                                                        <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                                    </li>
                                                    <li class="kt-nav__separator"></li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-group"></i>
                                                            <span class="kt-nav__link-text">New Group</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                            <span class="kt-nav__link-text">Contacts</span>
                                                            <span class="kt-nav__link-badge">
                                                                <span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                            <span class="kt-nav__link-text">Calls</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                            <span class="kt-nav__link-text">Settings</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                            <span class="kt-nav__link-text">Help</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__separator"></li>
                                                    <li class="kt-nav__foot">
                                                        <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                        <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                    </li>
                                                </ul>
                                                <!--end::Nav-->
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                            <i class="flaticon2-cross"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="300">
                                    <div class="kt-chat__messages kt-chat__messages--solid">
                                        <div class="kt-chat__message kt-chat__message--success">
                                            <div class="kt-chat__user">
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/100_12.jpg" alt="image">
                                                </span>
                                                <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                                <span class="kt-chat__datetime">2 Hours</span>
                                            </div>
                                            <div class="kt-chat__text">
                                                How likely are you to recommend our company
                                                <br> to your friends and family?
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                            <div class="kt-chat__user">
                                                <span class="kt-chat__datetime">30 Seconds</span>
                                                <a href="#" class="kt-chat__username">You</span></a>
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/300_21.jpg" alt="image">
                                                </span>
                                            </div>
                                            <div class="kt-chat__text">
                                                Hey there, we’re just writing to let you know that you’ve
                                                <br> been subscribed to a repository on GitHub.
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--success">
                                            <div class="kt-chat__user">
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/100_12.jpg" alt="image">
                                                </span>
                                                <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                                <span class="kt-chat__datetime">30 Seconds</span>
                                            </div>
                                            <div class="kt-chat__text">
                                                Ok, Understood!
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                            <div class="kt-chat__user">
                                                <span class="kt-chat__datetime">Just Now</span>
                                                <a href="#" class="kt-chat__username">You</span></a>
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/300_21.jpg" alt="image">
                                                </span>
                                            </div>
                                            <div class="kt-chat__text">
                                                You’ll receive notifications for all issues, pull requests!
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--success">
                                            <div class="kt-chat__user">
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/100_12.jpg" alt="image">
                                                </span>
                                                <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                                <span class="kt-chat__datetime">2 Hours</span>
                                            </div>
                                            <div class="kt-chat__text">
                                                You were automatically <b class="kt-font-brand">subscribed</b>
                                                <br>because you’ve been given access to the repository
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                            <div class="kt-chat__user">
                                                <span class="kt-chat__datetime">30 Seconds</span>
                                                <a href="#" class="kt-chat__username">You</span></a>
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/300_21.jpg" alt="image">
                                                </span>
                                            </div>

                                            <div class="kt-chat__text">
                                                You can unwatch this repository immediately
                                                <br>by clicking here:
                                                <a href="#" class="kt-font-bold kt-link"></a>
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--success">
                                            <div class="kt-chat__user">
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/100_12.jpg" alt="image">
                                                </span>
                                                <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                                <span class="kt-chat__datetime">30 Seconds</span>
                                            </div>
                                            <div class="kt-chat__text">
                                                Discover what students who viewed Learn
                                                <br>Figma - UI/UX Design Essential Training also viewed
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                            <div class="kt-chat__user">
                                                <span class="kt-chat__datetime">Just Now</span>
                                                <a href="#" class="kt-chat__username">You</span></a>
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="
                                            /assets/media/users/300_21.jpg" alt="image">
                                                </span>
                                            </div>
                                            <div class="kt-chat__text">
                                                Most purchased Business courses during this sale!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-chat__input">
                                    <div class="kt-chat__editor">
                                        <!-- <textarea placeholder="Type here..." style="height: 50px"></textarea> -->
                                    </div>
                                    <div class="kt-chat__toolbar">
                                        <div class="kt_chat__tools">
                                            <a href="#"><i class="flaticon2-link"></i></a>
                                            <a href="#"><i class="flaticon2-photograph"></i></a>
                                            <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                        </div>
                                        <div class="kt_chat__actions">
                                            <button type="button" class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ENd:: Chat-->
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#2c77f4",
                        "light": "#ffffff",
                        "dark": "#282a3c",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                    }
                }
            };
        </script>
        <!-- end::Global Config -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="
                   /assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
        <script src="
                   /assets/js/demo12/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->
        <script src="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
        <script src="/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="/assets/js/demo12/pages/dashboard.js" type="text/javascript"></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <!--end::Page Scripts -->
</body>
<!-- end::Body -->

</html>
