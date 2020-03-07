@extends('layout')
@section('title', 'Ingreso al Sistema')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="../">Inicio</a></li>
				<li class="active">Ingresar</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<section id="form"><!--form-->
		<div class="container">
		  <div class="row" style="margin-top: 30px; margin-bottom: 50px;">
		  	<div class="col-md-6">
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">INGRESAR</h3>
						</div>
						<form action="{{ url('/customer-login') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<input type="email" placeholder="Ingrese su Email" name="customer_email" required="" class="input" />
							</div>
							<div class="form-group">
								<input type="password" placeholder="Ingrese su Contraseña" name="password" required="" class="input" />
							</div>
							<div class="pull-right">
								<button type="submit" class="primary-btn">Ingresar</button>
							</div>
						</form>						
					</div>
				</div>
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">REGISTRARSE</h3>
							</div>
							<form action="{{ url('/customer-registration' )}}" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<input class="input" type="text" placeholder="Nombre Completo" name="customer_firstname" required="" />
								</div>
								<div class="form-group">
									<input class="input" type="text" placeholder="Apellido" name="customer_lastname" required="" />
								</div>
								<div class="form-group">
									<input class="input" type="email" placeholder="Email Address" name="customer_email" required="" />
								</div>
								<div class="form-group">
									<input class="input" type="password" placeholder="Ingrese su Contraseña" name="password" required="" />
								</div>
								<div class="form-group">
									<input class="input" type="text" placeholder="Ingrese su Número de Celular" name="mobile_number" required="" />
								</div>
								<div class="pull-right">
									<button type="submit" class="primary-btn">Registrarse</button>
								</div>
							</form>
						</div>
					</div>
		  </div>
	</section><!--/form-->
@endsection()