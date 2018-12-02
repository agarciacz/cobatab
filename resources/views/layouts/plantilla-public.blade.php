<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/ico/BachillerLogo.ico') }}" type="image/x-icon">

    <title>@yield('titulo') | Plantel 28</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="{{ asset('css/mobile-menu.css') }}" rel="stylesheet">
    <!-- font-awesome -->
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Style CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app-admin.css') }}">
</head>
<body>
<div id="main-wrapper">
    <!-- Page Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

    <div class="uc-mobile-menu-pusher">

        <div class="content-wrapper">
            <nav class="navbar m-menu navbar-default navbar-fixed-top shadow">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('view_index_cobatab') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="" width="80px" height="">
                        </a>
                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                            class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form role="form">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                           placeholder="Type Something">
                                                    <span class="input-group-btn">
			                                  <button type="submit" class="btn btn-primary">Search</button>
			                                </span>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right main-nav">
                            <li><a href="{{ route('view_index_cobatab') }}">Home</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    Institución<span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <ul>
                                            <li><a href="#">Organigrama</a></li>
                                            <li><a href="#">Mensaje del Director</a></li>
                                            <li><a href="#">Misión y visión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Alumnos</a></li>
                            <li><a href="#">Padres</a></li>
                            <li><a href="#">Docentes</a></li>
                            <li><a href="#">Noticias</a></li>
                            <li class="dropdown ">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    Ventanilla Unica<span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <ul>
                                            <li><a href="#">Constancia de Estudio</a></li>
                                            <li><a href="#">Constancia con promedio</a></li>
                                            <li><a href="#">Certificado de Estudio</a></li>
                                            <li><a href="#">Conducta de alumnos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
            @yield('contenido')
            <footer class="footer">
                <!-- Footer Widget Section -->
                <div class="footer-widget-section">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-4 footer-block">
                                <div class="footer-widget widget_text">
                                    <div class="footer-logo">
                                        <a href="#"><img src=" {{ asset('img/logo.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div><!-- /.col-sm-4 -->

                            <div class="col-sm-4 footer-block">
                                <div class="footer-widget widget_text">
                                    <h3>Mapa</h3>

                                </div>
                            </div><!-- /.col-sm-4 -->

                            <div class="col-sm-4 footer-block last">
                                <div class="footer-widget widget_text">
                                    <h3>Póngase en contacto</h3>
                                    <address>
                                        Telefono 3-57-18-86<br>
                                        Paseo de Las Flores, El Recreo, 86020 <br>
                                        Villahermosa, Tab.<br>
                                    </address>

                                    <ul class="list-inline social-links">
                                        <li>
                                            <a href="https://www.facebook.com/CobatabPlantel28/?fref=ts"
                                               target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/search?q=cobatab&src=typd&lang=es"
                                               target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.col-sm-4 -->
                        </div>
                    </div>
                </div><!-- /.Footer Widget Section -->

                <div class="copyright-section">
                    <div class="container clearfix">
                        <span class="copytext">&copy; 2018 | Cobatab Plantel 28.
                            <strong style="color: #31aae2;">Todos los derechos reservados</strong>
                        </span>
                    </div><!-- .container -->
                </div><!-- .copyright-section -->
            </footer>
            <!-- .footer -->

        </div>
        <!-- .content-wrapper -->
    </div>
    <!-- .offcanvas-pusher -->

    <div class="uc-mobile-menu uc-mobile-menu-effect">
        <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
                id="uc-mobile-menu-close-btn">&times;
        </button>
        <div>
            <div>
                <ul id="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="{{asset('js/smoothscroll.js')}}"></script>
<script src="{{asset('js/mobile-menu.js')}}"></script>
<script src="{{asset('js/flexSlider/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
@yield('scrips')
</body>
</html>