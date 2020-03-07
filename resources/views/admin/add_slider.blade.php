@extends('admin_layout')

@section('admin-content')
	
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Inicio</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="#">Agregar Imagen del Slider</a>
		</li>
	</ul>
			
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Agregar Imagen del Slider</h2>
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
				<form class="form-horizontal" action="{{ url('/save-slider') }}" method="POST" enctype="multipart/form-data" >
					{{ csrf_field() }}
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="fileInput">Imagen</label>
					  <div class="controls">
						<input class="input-file uniform_on" name="slider_image" type="file">
					  </div>
					</div>
					<div class="control-group hidden-phone">
					  <label class="control-label" for="slider_status">Publicado: </label>
					  <div class="controls">
						<input type="checkbox" name="slider_status" value="1" checked>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Agregar</button>
					  <button type="reset" class="btn">Cancelar</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->

@endsection()