@extends('layout')

@section('title', 'Mi carrito')

@section('content')
		<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="../">Inicio</a></li>
				<li class="active">Mi Carrito</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	
	<div class="container">
		<!-- row -->
		<div class="row">	

			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Detalle del Pedido</h3>
					</div>
					<table class="shopping-cart-table table">
						<thead>
							<tr>
								<th>Producto</th>
								<th></th>
								<th class="text-center">Precio</th>
								<th class="text-center">Cantidad</th>
								<th class="text-center">Total</th>
								<th class="text-right"></th>
							</tr>
						</thead>
						<tbody>
							<section id="cart_items">
								<?php $contents = Cart::content(); ?>
								@foreach ($contents as $v_contents)
									<tr>
										<td class="thumb"><img src="{{URL::to($v_contents->options->image)}}" alt=""></td>
										<td class="details">
											<a href="">{{$v_contents->name}}</a>
											{{-- <ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul> --}}
										</td>
										<td class="Precio text-center"><strong>{{$v_contents->price}}</strong><br></td>
										<form action="{{URL::to('/update-cart')}}" method="POST">
											{{ csrf_field() }}
											<td class="qty text-center">
												<input class="input" type="number" name="qty" value="{{$v_contents->qty}}" autocomplete="off">
												<input type="hidden" name="rowId" value="{{ $v_contents->rowId }}">
												<input type="submit" name="submit" value="Actualizar" class="btn btn-sm btn-default">
											</td>
										</form>
										<td class="total text-center"><strong class="primary-color">$ {{ $v_contents->total }}</strong></td>
										<td class="text-right">
											<a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$v_contents->rowId) }}">
												<button class="main-btn icon-btn"><i class="fa fa-close"></i></button>
											</a>
										</td>
									</tr>
								@endforeach
							</section> <!--/#cart_items-->
						</tbody>
						<tfoot>
							<section id="do_action">
								<tr>
									<th class="empty" colspan="3"></th>
									<th>SUBTOTAL</th>
									<th colspan="2" class="sub-total">$ {{Cart::subtotal()}}</th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>ENVIO</th>
									<td colspan="2">Gratis</td>
								</tr>
								{{-- <tr>
									<th class="empty" colspan="3"></th>
									<th>IMPUESTOS</th>
									<td colspan="2">{{Cart::tax()}}</td>
								</tr> --}}
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" class="total">$ {{Cart::total()}}</th>
								</tr>
							</section><!--/#do_action-->
						</tfoot>
					</table>
					<div class="pull-right">
						<?php $customer_id = Session::get('customer_id'); ?>
            @if($customer_id != NULL)
              <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}" style="border:0;"><button class="primary-btn">Terminar</button></a>
            @else
				<a class="btn btn-default check_out" href="{{URL::to('/login-check')}}" style="border:0;"><button class="primary-btn">Comprar</button></a>
            @endif
					</div>
				</div>

			</div>
		</div> {{-- / row --}}
	</div> {{-- / container --}}

@endsection()