@extends('admin_layout')

@section('admin-content')

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Tables</a></li>
	</ul>
	
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>slideros</h2>
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
						  <th>Imagen</th>
						  <th>Estado</th>
						  <th>Acciones</th>
					  </tr>
				  </thead>   
				@foreach($all_slider_info as $v_slider)
				  <tbody>
						<tr>
							<td>{{ $v_slider->slider_id }}</td>
							<td class="center"> <img src="{{ $v_slider->slider_image }}" class="img-thumbnail" height="250" width="250"></td>
							<td class="center">
								@if( $v_slider->slider_status === 1)
									<span class="label label-success">Activo</span>
								@else
									<span class="label label-danger">Inactivo</span>
								@endif
							</td>
							<td class="center">
								@if( $v_slider->slider_status === 1)
									<a class="btn btn-danger" href="{{URL::to('/unactive-slider/'.$v_slider->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
									<a class="btn btn-success" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
								<a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}" id="delete">
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