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
					<a href="#">Agregar Marca</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Agregar Marcas</h2>
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
						<form class="form-horizontal" action="{{ url('/save-manufacture') }}" method="POST">
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="manufacture_name">Nombre:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacture_name" required>
							  </div>
							</div>

							{{-- <div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>  --}}         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="manufacture_description">Descripción: </label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacture_description" rows="3" required></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="manufacture_description">Publicado: </label>
							  <div class="controls">
								<input type="checkbox" name="manufacture_status" value="1" checked>
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