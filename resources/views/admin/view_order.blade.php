@extends('admin_layout')

@section('admin-content')

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Inicio</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Administración de Pedidos</a></li>
	</ul>
	
	<div class="row-fluid sortable">
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon user"></i><span class="break"></span>Cliente</h2>
			</div>
			<div class="box-content">
				<table class="table">
					  <thead>
						  <tr>
							  <th>Nombre</th>
							  <th>Correo Electrónico</th>
							  <th>Telefono</th>
						  </tr>
					  </thead>   
					  <tbody>
					  	@foreach($order_by_id as $v_order)
					  	@endforeach
							<tr>
								<td>{{ $v_order->customer_firstname.",".$v_order->customer_lastname}}</td>
								<td class="center">{{ $v_order->customer_email_address }}</td>
								<td class="center">{{ $v_order->customer_cellphone }}</td>
							</tr>
					  </tbody>
				 </table>  
			</div>
		</div><!--/span-->
				
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon icon-truck"></i><span class="break"></span>Detalles del Envio</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped">
					  <thead>
						  <tr>
							  <th>Nombre</th>
							  <th>Dirección</th>
							  <th>Celular</th>
							  <th>Correo electrónico</th>                                          
						  </tr>
					  </thead>   
					  <tbody>
					  	@foreach($order_by_id as $v_order)
					  	@endforeach
							<tr>
								<td>{{ $v_order->shipping_firstname.",".$v_order->shipping_lastname}}</td>
								<td class="center">{{ $v_order->shipping_address }}</td>
								<td class="center">{{ $v_order->shipping_phone_number }}</td>
								<td class="center">{{ $v_order->shipping_email }}</td>                                       
							</tr>
					  </tbody>
				 </table>  
			</div>
		</div><!--/span-->
	</div><!--/row-->

	{{-- order details --}}
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon icon-shopping-cart"></i><span class="break"></span>Detalle del Pedido</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>#</th>
						  <th>Cantidad</th>
						  <th>Nombre</th>
						  <th>Precio</th>
						  <th>Subtotal</th>
					  </tr>
				  </thead>   
				  <tfoot>
					  <tr>
					  	@foreach($order_by_id as $v_order)
					  	@endforeach
						  <th colspan="3">&nbsp;</th>
						  <th>Total: </th>
						  <th>$ {{ $v_order->order_total }}</th>
					  </tr>
				  </tfoot>  
				  <tbody>
					  @foreach($order_by_id as $v_order)
							<tr>
								<td>{{ $v_order->order_details_id }}</td>
								<td class="center">{{ $v_order->product_sales_quantity }}</td>
								<td class="center">{{ $v_order->product_name }}</td>
								<td class="center">{{ $v_order->product_price }}</td>
								<td class="center">{{ $v_order->product_price*$v_order->product_sales_quantity }}</td>
							</tr>
						@endforeach
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->
	
	</div><!--/row-->

@endsection()