@extends('layout')

@section('title', 'Productos por categoria')

@section('content')

  <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="../">Inicio</a></li>
        <li><a href="{{URL::to('/products_all/')}}">Productos</a></li>
        @foreach ($product_by_category as $v_product_by_category) 
          <li class="active">{{ $v_product_by_category->category_name }}</li>
          @break
        @endforeach
      </ul>
    </div>
  </div>
  <!-- /BREADCRUMB -->
	
  <!-- section -->
  <div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
      <div class="row">
        <!-- section title -->
        <div class="col-md-12">
            <div class="section-title">
              @foreach ($product_by_category as $v_product_by_category) 
                <h2 class="title">{{ $v_product_by_category->category_name }}</h2>
                @break
              @endforeach
            </div>
        </div>
        <!-- section title -->
        
        @foreach ($product_by_category as $v_product_by_category) 
          <!-- Product Single -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="product product-single">
              <div class="product-thumb">
                <div class="product-label">
                    <span>Nuevo</span>
                    <span class="sale">-20%</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detalles</button>
                <img src="{{URL::to($v_product_by_category->product_image)}}" alt="">
              </div>
              <div class="product-body">
                <h3 class="product-price">$ {{ $v_product_by_category->product_price }}</h3>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">{{ $v_product_by_category->product_name }}</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ver</button>
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