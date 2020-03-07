{{-- Slider --}}
<?php
$all_published_slider = DB::table('tbl_slider')
  ->where('slider_status', 1)
  ->get();
?>
<!-- HOME -->
  <div id="home">
    <!-- container -->
    <div class="container">
      <!-- home wrap -->
      <div class="home-wrap">
        <!-- home slick -->
        <div id="home-slick">
          @foreach ($all_published_slider as $v_slider)
            <!-- banner -->
            <div class="banner banner-1">
              <img src="{{ URL::to($v_slider->slider_image) }}" alt="">
              <div class="banner-caption text-center">
                <!-- <h1>Alarmas de Seguridad</h1>
                <h3 class="white-color font-weak">Descuentos hasta el 30%</h3> 
                <button class="primary-btn">Ver</button>-->
              </div>
            </div>
            <!-- /banner -->
          @endforeach

        </div>
        <!-- /home slick -->
      </div>
      <!-- /home wrap -->
    </div>
    <!-- /container -->
  </div>
  <!-- /HOME -->

