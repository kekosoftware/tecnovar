@extends('layout')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
				<?php  
				  
				  require_once "../vendor/mercadopago/sdk/lib/mercadopago.php";
				  //require_once $_SERVER['DOCUMENT_ROOT']."/tecno/vendor/mercadopago/sdk/lib/mercadopago.php";

					$mp = new MP("YOUR_CLIENT_ID", "YOUR_CLIENT_SECRET");

					$preference_data = array (
					    "items" => array (
					        array (
					            "title" => "Test",
					            "quantity" => 1,
					            "currency_id" => "ARS",
					            "unit_price" => floatval($total)
					        )
					    ),
					    "payer" => array (
					        array (
					            "name" => "nombre de prueba",
					            "surname" => "apellido",
					            "email" => "correo electrónico",
					            "date_create" => "2018-02-01",
					            "phone" => array (
						            "area_code" => 370,
						            "number" => 441262
						        ),
					            "identification" => array (
						            "type" => "DNI",
						            "number" => 22456789
						        ),
						        "address" => array (
						            "street_name" => "calle nombre",
						            "street_number" => 123,
						            "zip_code" => 22456789
						        )
					        )
					    ),
					    "back_urls" => array (
				            "success" => "../notification-success",
				            "pending" => "../notification-pending",
				            "failure" => "../notification-failure"
					    )
					);

					$preference = $mp->create_preference($preference_data);

					echo "<pre>";
					print_r ($preference);
					echo "</pre>";

				?>
				<a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">PAGAR</a>
		    	<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
			</div>
		</div>
	</section><!--/form-->
@endsection()