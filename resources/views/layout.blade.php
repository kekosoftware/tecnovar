<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Tecnovar |  @yield('title', '')</title>
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick-theme.css')}}" />
  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <!-- HEADER -->
  <header>
    <!-- top Header -->
    <div id="top-header">
      <div class="container">
        <div class="pull-left">
          <span><i class="fa fa-phone"></i> +54 3704 654789</span>&nbsp;&nbsp;&nbsp;&nbsp;
          <span><i class="fa fa-envelope"></i> info@tecnovar</span>
        </div>
        <div class="pull-right">
          <ul class="header-top-links">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="pull-left">
          <!-- Logo -->
          <div class="header-logo">
            <a class="logo" href="../">
              <img src="{{ URL::to('frontend/img/logo.png') }}" alt="">
            </a>
          </div>
          <!-- /Logo -->

        </div>
        <div class="pull-right">
          <ul class="header-btns">
            <!-- Account -->
            <li class="header-account dropdown default-dropdown">
              <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-user-o"></i>
                </div>
                <strong class="text-uppercase">Mi Cuenta <i class="fa fa-caret-down"></i></strong>
              </div>
              <a href="#" class="text-uppercase">Ingresar</a>
              <!--  / <a href="#" class="text-uppercase">Salir</a> -->
              <ul class="custom-menu">
                <li><a href="#"><i class="fa fa-user-o"></i> Mi Cuenta</a></li>
                <li><a href="#"><i class="fa fa-heart-o"></i> Favoritos</a></li>
                <li><a href="#"><i class="fa fa-check"></i> Cerrar Carrito</a></li>
                <li><a href="#"><i class="fa fa-unlock-alt"></i> Ingresar</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i> Crear una cuenta</a></li>
              </ul>
            </li>
            <!-- /Account -->

            <!-- Cart -->
            <li class="header-cart dropdown default-dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="qty">3</span>
                </div>
                <strong class="text-uppercase">Mi Carrito</strong>
                <br>
                <span>135.20 $</span>
              </a>
              <div class="custom-menu">
                <div id="shopping-cart">
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb">
                        <img src="./img/thumb-product01.jpg" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                        <h2 class="product-name"><a href="#">Producto Nº 01</a></h2>
                      </div>
                      <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="product product-widget">
                      <div class="product-thumb">
                        <img src="./img/thumb-product01.jpg" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                        <h2 class="product-name"><a href="#">Product Nº 02</a></h2>
                      </div>
                      <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                  <div class="shopping-cart-btns">
                    <button class="main-btn">Ver Detalles</button>
                    <button class="primary-btn">Cerrar Carrito <i class="fa fa-arrow-circle-right"></i></button>
                  </div>
                </div>
              </div>
            </li>
            <!-- /Cart -->

            <!-- Mobile nav toggle-->
            <li class="nav-toggle">
              <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
            <!-- / Mobile nav toggle -->
          </ul>
        </div>
      </div>
      <!-- header -->
    </div>
    <!-- container -->
  </header>
  <!-- /HEADER -->

  <!-- NAVIGATION -->
  <div id="navigation">
    <!-- container -->
    <div class="container">
      <div id="responsive-nav">
        
        @yield('category-nav')

        <!-- menu nav -->
        <div class="menu-nav">
          <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
          <ul class="menu-list">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Mi cuenta</a></li>
            <li><a href="#">Ver Carrito</a></li>
            <li><a href="#">Cerrar Carrito</a></li>
            <li><a href="#">Contácto</a></li>
        </div>
        <!-- menu nav -->
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /NAVIGATION -->

  @yield('content')

  <!-- FOOTER -->
  <footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- footer widget -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <!-- footer logo -->
            <div class="footer-logo">
              <a class="logo" href="../">
                <img src="{{ URL::to('./frontend/img/logo.png') }}" alt="">
              </a>
            </div>
            <!-- /footer logo -->

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

            <!-- footer social -->
            <ul class="footer-social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <!-- /footer social -->
          </div>
        </div>
        <!-- /footer widget -->

        <!-- footer widget -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <h3 class="footer-header">Mi Cuenta</h3>
            <ul class="list-links">
              <li><a href="#">Mi cuenta</a></li>
              <li><a href="#">Favoritos</a></li>
              <li><a href="#">Cerrar Carrito</a></li>
              <li><a href="#">Ingresar</a></li>
            </ul>
          </div>
        </div>
        <!-- /footer widget -->

        <div class="clearfix visible-sm visible-xs"></div>

        <!-- footer widget -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <h3 class="footer-header">Servicos</h3>
            <ul class="list-links">
              <li><a href="#">Nosotros</a></li>
              <li><a href="#">Envios</a></li>
              <li><a href="#">Preguntas Frecuentes</a></li>
            </ul>
          </div>
        </div>
        <!-- /footer widget -->

        <!-- footer subscribe -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <h3 class="footer-header">Newslatter</h3>
            <p>Recibas nuestras últimas ofertas en su Mail.</p>
            <form>
              <div class="form-group">
                <input class="input" placeholder="Ingrese su dirección de Email">
              </div>
              <button class="primary-btn">Unirse</button>
            </form>
          </div>
        </div>
        <!-- /footer subscribe -->
      </div>
      <!-- /row -->
      <hr>
      <!-- row -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center" >
          <!-- footer copyright -->
          <div class="footer-copyright" style="font-size: 1px;">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
          <!-- /footer copyright -->
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </footer>
  <!-- /FOOTER -->

  <!-- jQuery Plugins -->
  <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/slick.min.js')}}"></script>
  <script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
  <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>