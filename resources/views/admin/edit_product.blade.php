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
					<a href="#">Actualizar Categoria</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Actualizar Categoria</h2>
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
						<form class="form-horizontal" action="{{ url('/update-product', $product_info->product_id) }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
								<div class="control-group">
								  <label class="control-label" for="product_name">Nombre:</label>
								  <div class="controls">
									<input type="text" class="input-xlarge" name="product_name" value="{{ $product_info->product_name }}" required>
								  </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError3">Categoria</label>
									<div class="controls">
									  <select id="selectError3" name="category_id">
									  	<option>Seleccione la Categoria</option>
									  	<?php
					                      $all_published_category = DB::table('tbl_category')
					                        ->where('category_status', 1)
					                        ->get();

					                      foreach ($all_published_category as $v_category) 
					                      {
					                      	if($v_category->category_id == $product_info->category_id)
					                      	{
					                      		?>
						                        	<option value="{{ $v_category->category_id }}" selected>{{ $v_category->category_name }}</option>
						                        <?php
					                      	}
					                      	else
					                      	{
						                        ?>
						                        	<option value="{{ $v_category->category_id }}">{{ $v_category->category_name }}</option>
						                        <?php
					                      	}
					                      }
					                    ?>
										
									  </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError3">Marca</label>
									<div class="controls">
									  <select id="selectError3" name="manufacture_id" >
										<option>Seleccione la marca</option>
										<?php
	                    $all_published_manufacture = DB::table('tbl_manufacture')
	                      ->where('manufacture_status', 1)
	                      ->get();

	                    foreach ($all_published_manufacture as $v_manufacture) 
	                    {
	                    	if($v_manufacture->manufacture_id == $product_info->manufacture_id)
	                    	{
	                    		?>
	                      	<option value="{{ $v_manufacture->manufacture_id }}" selected>{{ $v_manufacture->manufacture_name }}</option>
	                      <?php
	                    	}
	                    	else
	                    	{
	                    		?>
	                      	<option value="{{ $v_manufacture->manufacture_id }}">{{ $v_manufacture->manufacture_name }}</option>
	                      <?php	
	                    	}
	                    }
	                  ?>  
									  </select>
									</div>
								</div>
								<div class="control-group hidden-phone">
								  <label class="control-label" for="product_short_description">Descripción Corta: </label>
								  <div class="controls">
									<textarea class="cleditor" name="product_short_description" rows="3" required>{{ $product_info->product_short_description }}</textarea>
								  </div>
								</div>
								<div class="control-group hidden-phone">
								  <label class="control-label" for="product_long_description">Descripción larga: </label>
								  <div class="controls">
									<textarea class="cleditor" name="product_long_description" rows="3" required>{{ $product_info->product_long_description }}</textarea>
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="product_price">Precio:</label>
								  <div class="controls">
									<input type="text" class="input-xlarge" name="product_price" value="{{ $product_info->product_price }}" required>
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="fileInput">Imagen</label>
								  <div class="controls">
									<input class="input-file uniform_on" name="product_image" type="file">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="product_size">Medida:</label>
								  <div class="controls">
									<input type="text" class="input-xlarge" name="product_size" value="{{ $product_info->product_size }}" required>
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="product_color">Color:</label>
								  <div class="controls">
									<input type="text" class="input-xlarge" name="product_color" value="{{ $product_info->product_color }}" required>
								  </div>
								</div>
								<div class="control-group hidden-phone">
								  <label class="control-label" for="product_description">Publicado: </label>
								  <div class="controls">
									<input type="checkbox" name="product_status" value="1" checked>
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