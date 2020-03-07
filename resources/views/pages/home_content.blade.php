@extends('layout')

@section('title', 'Inicio')

@section('category-nav')
  @include('category_nav')
@endsection()

@section('content')
  
  @include('slider')
	
  <!-- section  Banner Categories -->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- banner -->
        <div class="col-md-4 col-sm-6">
          <a class="banner banner-1" href="#">
              <img src="{{ URL::to('./frontend/img/banner10.jpg') }}" alt="">
              <div class="banner-caption text-center">
                  <h2 class="white-color">CÁMARAS</h2>
              </div>
          </a>
        </div>
        <!-- /banner -->

        <!-- banner -->
        <div class="col-md-4 col-sm-6">
          <a class="banner banner-1" href="#">
              <img src="{{ URL::to('./frontend/img/banner11.jpg') }}" alt="">
              <div class="banner-caption text-center">
                  <h2 class="white-color">SISTEMAS</h2>
              </div>
          </a>
        </div>
        <!-- /banner -->

        <!-- banner -->
        <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
          <a class="banner banner-1" href="#">
              <img src="{{ URL::to('./frontend/img/banner12.jpg') }}" alt="">
              <div class="banner-caption text-center">
                  <h2 class="white-color">SOPORTE TÉCNICO</h2>
              </div>
          </a>
        </div>
        <!-- /banner -->

      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <?php
                  $products_by_category = DB::table('tbl_product')
                    ->join('tbl_category', 'tbl_product.category_id', 'tbl_category.category_id')
                    ->where('tbl_product.category_id', 2)
                    ->get();
                ?>
              @foreach ($products_by_category as $v_products_by_category) 
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">{{$v_products_by_category->category_name}}</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{ URL::to('./frontend/img/banner14.jpg') }}" alt="">
                        <div class="banner-caption">
                            {{-- <h2 class="white-color">ALARMA X-28</h2> --}}
                            <a href="{{URL::to('/products_by_category/'.$v_products_by_category->category_id)}}"><button class="primary-btn">Ver Categoria</button></a>
                        </div>
                    </div>
                </div>
                @break
              @endforeach
                <!-- /banner -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">

                          @foreach ($products_by_category as $v_products_by_category) 
                      
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>Nuevo</span>
                                        <span class="sale">-20%</span>
                                    </div>
                                    <!-- <ul class="product-countdown">
                                        <li><span>00 H</span></li>
                                        <li><span>00 M</span></li>
                                        <li><span>00 S</span></li>
                                    </ul> -->
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Ver</button>
                                    <img src="{{ URL::to($v_products_by_category->product_image) }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$ {{ $v_products_by_category->product_price }} <del class="product-old-price">$ 45.00</del></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="{{ URL::to('/view-product/'.$v_products_by_category->product_id) }}">{{ $v_products_by_category->product_name }}</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <a href="{{ URL::to('/view-product/'.$v_products_by_category->product_id) }}"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Detalles</button></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                          @endforeach

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Ofertas del Día</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-2 custom-dots">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single product-hot">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-20%</span>
                            </div>
                            <!-- <ul class="product-countdown">
                                <li><span>00 H</span></li>
                                <li><span>00 M</span></li>
                                <li><span>00 S</span></li>
                            </ul> -->
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button>
                            <img src="{{ URL::to('./frontend/img/product01.jpg') }}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Nombre del Producto</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-2" class="product-slick">
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button>
                                    <img src="{{ URL::to('./frontend/img/product06.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$32.50</h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">Nombre del Producto</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button>
                                    <img src="{{ URL::to('./frontend/img/product06.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$32.50</h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">Nombre del Producto</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button>
                                    <img src="{{ URL::to('./frontend/img/product06.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$32.50</h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">Nombre del Producto</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button>
                                    <img src="{{ URL::to('./frontend/img/product06.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$32.50</h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">Nombre del Producto</a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-8">
                    <div class="banner banner-1">
                        <img src="{{ URL::to('./frontend/img/banner13.jpg')}}" alt="">
                        <div class="banner-caption text-center">
                            <h1 class="primary-color">SUPER OFERTA<br><span class="white-color font-weak">hasta -50%</span></h1>
                            <button class="primary-btn">VER</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{ URL::to('./frontend/img/banner11.jpg') }}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">SISTEMAS</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{ URL::to('./frontend/img/banner12.jpg') }}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">SOPORTE TÉCNICO</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">NUEVOS PRODUCTOS</h2>
                    </div>
                </div>
                <!-- section title -->
                
                @foreach ($all_published_product as $v_published_product) 
                  <!-- Product Single -->
                  <div class="col-md-3 col-sm-6 col-xs-6">
                      <div class="product product-single">
                          <div class="product-thumb">
                            <div class="product-label">
                                <span>New</span>
                                <span class="sale">-20%</span>
                            </div>
                            <a href="{{ URL::to('/view-product/'.$v_published_product->product_id) }}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button></a>
                            <img src="{{ URL::to($v_published_product->product_image) }}" alt="">
                          </div>
                          <div class="product-body">
                              <h3 class="product-price">$ {{ $v_published_product->product_price }}</h3>
                              <div class="product-rating">
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star-o empty"></i>
                              </div>
                              <h2 class="product-name"><a href="#">{{ $v_published_product->product_name }}</a></h2>
                              <div class="product-btns">
                                  <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                  <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                  <a href="{{ URL::to('/view-product/'.$v_published_product->product_id) }}"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /Product Single -->
                @endforeach
                
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection