@extends('layout')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<?php
				
					//require_once $_SERVER['DOCUMENT_ROOT']."/tecno/vendor/mercadopago/sdk/lib/mercadopago.php";
			    require_once "../vendor/mercadopago/sdk/lib/mercadopago.php";
					
					$mp = new MP("YOUR_CLIENT_ID", "YOUR_CLIENT_SECRET");

					if (!isset($_GET["id"], $_GET["topic"]) || !ctype_digit($_GET["id"])) {
					    http_response_code(400);
					    return;
					}

					$topic = $_GET["topic"];
					$merchant_order_info = null;

					switch ($topic) {
					    case 'payment':
					        $payment_info = $mp->get("/v1/payments/".$_GET["id"]);
					        $merchant_order_info = $mp->get("/merchant_orders/".$payment_info["response"]["order"]["id"]);
					        break;
					    case 'merchant_order':
					        $merchant_order_info = $mp->get("/merchant_orders/".$_GET["id"]);
					        break;
					    default:
					        $merchant_order_info = null;
					}

					if($merchant_order_info == null) {
					    echo "Error obtaining the merchant_order";
					    die();
					}

					if ($merchant_order_info["status"] == 200) {
					    print_r($merchant_order_info["response"]["payments"]);
					    print_r($merchant_order_info["response"]["shipments"]);
					}


				?>
			</div>
		</div>
	</section><!--/form-->
@endsection()