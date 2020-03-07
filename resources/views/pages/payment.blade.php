@extends('layout')
@section('content')

	<div class="section" id="cart_items">
		<!-- container -->
		<div class="container">
			<div class="row">
					<div class="breadcrumbs">
						<ol class="breadcrumb">
						  <li><a href="../">Inicio</a></li>
						  <li class="active">Elegir el Pago</li>
						</ol>
					</div>
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Detalle del Pedido</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-left" >Producto</th>
										<th class="text-center">Precio</th>
										<th class="text-center">Cantidad</th>
										<th class="text-center">Sub-Total</th>
									</tr>
								</thead>
								<tbody>
									<section id="cart_items">
										<?php $contents = Cart::content(); ?>
										@foreach ($contents as $v_contents)
											<tr>
												<td class="thumb text-center">
													<img src="{{URL::to($v_contents->options->image)}}" alt="">
												</td>
												<td class="details text-left">
													<p>{{$v_contents->name}}</p>
												</td>
												<td class="Precio text-center">
													<p>{{$v_contents->price}}</p>
												</td>
												<td class="qty text-center">
													<p>{{$v_contents->qty}}</p>
												</td>
												<td class="total text-center">
													<p>$ {{ $v_contents->total }}</p>
												</td>
											</tr>
										@endforeach
									</section> <!--/#cart_items-->
								</tbody>
								<tfoot>
									<section id="do_action">
										<tr>
											<th class="empty" colspan="3"></th>
											<th>TOTAL</th>
											<th colspan="2" class="total text-center">$ {{Cart::total()}}</th>
										</tr>
									</section><!--/#do_action-->
								</tfoot>
							</table>
						</div>
					</div> {{-- / cart details --}}
			</div> {{-- /row --}}
		</div> {{-- /container --}}
	</div> {{-- /section --}}


	<section id="do_action" class="section">
		<div class="container">
			<div class="paymentCont col-sm-12">
				<div class="section-title">
					<h3 class="title">Elija su medio de Pago</h3>
				</div>
				<form action="{{ url('/order-place')}}" method="POST" id="payment-form">
					{{ csrf_field() }}
					<input type="hidden" name="payment_total" value="{{Cart::total()}}">
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
							<label class="btn paymentMethod active">
	            	<div class="method handcash">Efectivo</div>
	            	<img src="{{ URL::to('./frontend/img/icon-cash.jpg') }}" alt="efectivo" class="img-thumbnail" height="125px" width="125px">
	                <input type="radio" name="payment_gateway" value="efectivo" checked> 
	            </label>
	            <label class="btn paymentMethod">
	            	<div class="method visa">Mercado Pagos</div>
	            		<img src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/125X125.jpg" title="MercadoPago - Medios de pago" alt="MercadoPago - Medios de pago" width="125" height="125"/>
	                <input type="radio" name="payment_gateway" value="mercado_pago" checked> 
	            </label>
	            <label class="btn paymentMethod">
	            	<div class="method master-card">Transferencia Bancaria</div>
	            		<img src="{{ URL::to('./frontend/img/icon-bank-transfer.jpg') }}" alt="transferencia" class="img-thumbnail" height="125px" width="125px">
	                <input type="radio" name="payment_gateway" value="transferencia"> 
	            </label>
		        </div>        
					</div>
					<div>&nbsp;</div>
					<div class="pull-right">
						<button type="submit" form="payment-form" value="Pagar" class="primary-btn">Pagar</button>
					</div>
				</form>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection