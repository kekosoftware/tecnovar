@extends('layout')
@section('title', 'Checkout')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="../">Inicio</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<section id="cart_items">
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="{{ url('/save-shipping-details') }}" method="POST" id="checkout-form" class="clearfix">
									{{ csrf_field() }}
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Detalle Envío</h3>
							</div>
							<div class="form-group">
								<input class="input"  type="email" name="shipping_email" placeholder="Correo Electrónico *">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping_firstname" placeholder="Nombre/s *">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping_lastname" placeholder="Apellido/s *">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping_address" placeholder="Dirección *">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping_phone_number" placeholder="Nº de Celular *">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping_city" placeholder="Ciudad *">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping_zip-code" placeholder="ZIP Code">
							</div>
						</div>
						<div class="form-group">&nbsp;</div>
						<div class="form-group">&nbsp;</div>
					</div>


					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Tipo de Envío</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Capital -  $0.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2">
								<label for="shipping-2">Interior - $150.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-3">
								<label for="shipping-2">Resto del Pais - $350.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>

						{{-- <div class="payments-methods">
							<div class="section-title">
								<h4 class="title">TIPO DE PAGO</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Transferencia bancaria</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Efectivo</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Mercado Pagos</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div> --}}
					</div>
					
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
											<th colspan="2" class="sub-total">$ {{floatval(Cart::subtotal())}}</th>
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
								<button type="submit" form="checkout-form" value="Pagar" class="primary-btn">Pagar</button>
								{{-- <input type="submit" value="Pagar"> --}}
							</div>
						</div>
					</div> {{-- / cart details --}}
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	</section> <!--/#cart_items-->



@endsection()