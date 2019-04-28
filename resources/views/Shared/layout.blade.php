<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ultimatepro-admin-templates.multipurposethemes.com/main/pages/sample_blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Aug 2018 17:45:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="../ico.ico">

    <title>Conectate :: Bitel :: </title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    {{--Specified CSS--}}
    @stack('Css')
    <link rel="stylesheet" href="../js/maps.css">
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="../css/bootstrap-extend.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/master_style.css">

    <!-- UltimatePro Admin skins -->
    <link rel="stylesheet" href="../css/skins/_all-skins.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body class="skin-info dark-sidebar sidebar-mini" style="height: auto; min-height: 100%;">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../index-2.html" class="logo">
            <!-- mini logo -->
            <div class="logo-mini">
                {{--<span class="light-logo"><img src="../images/logo-light.png" alt="logo"></span>--}}
                {{--<span class="dark-logo"><img src="../images/logo-dark.png" alt="logo"></span>--}}
            </div>
            <!-- logo-->
            <div class="logo-lg">
                {{--<span class="light-logo"><img src="../images/logo-light-text.png" alt="logo"></span>--}}
                {{--<span class="dark-logo"><img src="../images/logo-dark-text.png" alt="logo"></span>--}}
            </div>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <i class="ti-align-left"></i>
                </a>
                <a id="toggle_res_search" data-toggle="collapse" data-target="#search_form" class="res-only-view"
                   href="javascript:void(0);"><i class="mdi mdi-magnify"></i></a>
            </div>

            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../assets/images/default_user.jpg" class="user-image rounded-circle"
                                 alt="User Image">
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <!-- User image -->
                            <li class="user-header bg-img" style="background-image: url(../assets/images/user-info.jpg)"
                                data-overlay="3">
                                <div class="flexbox align-self-center">
                                    <img src="../assets/images/default_user.jpg" class="float-left rounded-circle"
                                         alt="User Image">
                                    <h4 class="user-name align-self-center">
                                        <span>{{Auth::user()->nombre.' '.Auth::user()->apellido}}</span>
                                    </h4>
                                </div>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <a class="dropdown-item" href="{{route('CambiarPassword')}}"><i class="ion ion-person"></i>
                                    Cambiar Contraseña</a>
                                <div class="dropdown-divider"></div>
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="dropdown-item"><i class="ion-log-out"></i> Cerrar Sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <div class="dropdown-divider"></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header nav-small-cap">MODULOS</li>

                <li>
                    <a href="{{route('Inicio')}}">
                        <i class="ti-envelope"></i>
                        <span>Puntos de Venta</span>
                    </a>
                </li>

                {{--<li>--}}
                    {{--<a href="{{route('Recargas')}}">--}}
                        {{--<i class="ti-envelope"></i>--}}
                        {{--<span>Recargas</span>--}}
                    {{--</a>--}}
                {{--</li>--}}


                <li>
                    <a href="{{route('Zona')}}">
                        <i class="ti-envelope"></i>
                        <span>Zonas</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('Usuarios')}}">
                        <i class="ti-envelope"></i>
                        <span>Usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('Cargos')}}">
                        <i class="ti-envelope"></i>
                        <span>Cargos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('ListarImagenes')}}">
                        <i class="ti-envelope"></i>
                        <span>Imagenes Almacenadas</span>
                    </a>
                </li>


                <li class="header nav-small-cap">Reportes</li>

                <li>
                    <a href="{{route('Reportes.Dia')}}">
                        <i class="ti-envelope"></i>
                        <span>Ventas x Día</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('Reportes.Mes')}}">
                        <i class="ti-envelope"></i>
                        <span>Ventas x Mes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('ReporteRecorridoUsuario')}}">
                        <i class="ti-envelope"></i>
                        <span>Recorrido Vendedor x Día</span>
                    </a>
                </li>

                <li class="header nav-small-cap">Archivos Usuarios</li>
                <li>
                    <a href="{{route('ListarArchivosGeneradosUsuario')}}">
                        <i class="ti-envelope"></i>
                        <span>Archivos x Usuario</span>
                    </a>
                </li>


            </ul>

        </section>
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('content-header')
            </div>

            <section class="content">
                @yield('content-body')
            </section>
        </div>
    </div>

    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
        </div>
        &copy; 2018 <a href="#">CRPM</a>. All Rights Reserved.
    </footer>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="../assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- popper -->
<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- UltimatePro Admin App -->
<script src="../js/template.js"></script>

<!-- UltimatePro Admin for demo purposes -->
<script src="../js/demo.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@stack('Js')
@stack('Toast')
</body>
</html>
