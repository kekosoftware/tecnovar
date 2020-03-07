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
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Pedidos</h2>
			</div>
			<p class="alert-success">
						<?php
							$message = Session::get('message');
							if($message)
							{
								echo $message;
								Session::put('message', NULL);
							}
						?>
					</p>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>#</th>
						  <th>Nombre Cliente</th>
						  <th>Importe Total</th>
						  <th>Estado</th>
						  <th>&nbsp;</th>
					  </tr>
				  </thead>   
				@foreach($all_order_info as $v_order)
				  <tbody>
						<tr>
							<td>{{ $v_order->order_id }}</td>
							<td class="center">{{ $v_order->customer_firstname .", ".$v_order->customer_lastname  }}</td>
							<td class="center">{{ $v_order->order_total }}</td>
							<td class="center">
								@if( $v_order->order_status === 1)
									<span class="label label-success">Entregado</span>
								@else
									<span class="label label-warning">Pendiente</span>
								@endif
							</td>
							<td class="center">
								@if( $v_order->order_status === 1)
									<a class="btn btn-success" href="{{URL::to('/active-order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@else
									<a class="btn btn-danger" href="{{URL::to('/unactive-order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@endif
								<a class="btn btn-info" href="{{URL::to('/view-order/'.$v_order->order_id)}}">
									<i class="halflings-icon white edit"></i>  
								</a>
								<a class="btn btn-danger" href="{{URL::to('/delete-order/'.$v_order->order_id)}}" id="delete">
									<i class="halflings-icon white trash"></i> 
								</a>
							</td>
						</tr>
				  </tbody>
				@endforeach
			  </table>            
			</div>
		</div><!--/span-->
	
	</div><!--/row-->

@endsection()