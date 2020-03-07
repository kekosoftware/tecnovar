@extends('admin_layout')

@section('admin-content')
	
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="./admin">Inicio</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Escritorio</a></li>
	</ul>

			<div class="row-fluid">	

				<a class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Usuarios</p>
					<span class="badge">237</span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-comments-alt"></i>
					<p>Commentarios</p>
					<span class="badge">46</span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Ordenes</p>
					<span class="badge">13</span>
				</a>
				<a class="quick-button metro green span2">
					<i class="icon-barcode"></i>
					<p>Productos</p>
				</a>
				<a class="quick-button metro pink span2">
					<i class="icon-envelope"></i>
					<p>Mensajes</p>
					<span class="badge">88</span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-calendar"></i>
					<p>Envios</p>
				</a>
				
				<div class="clearfix"></div>
								
			</div><!--/row-->
	
@endsection()