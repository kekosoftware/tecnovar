<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CheckoutController extends Controller
{

	public function login_check()
	{
		return view('pages.login');
	}

	public function customer_registration(Request $request)
	{
		$data = array();
		$data['customer_firstname'] = $request->customer_firstname;
		$data['customer_lastname'] = $request->customer_lastname;
		$data['customer_email_address'] = $request->customer_email;
		$data['customer_password'] = md5($request->password);
		$data['customer_cellphone'] = $request->mobile_number;

		$customer_id = DB::table('tbl_customer')
										->insertGetId($data);

		Session::put('customer_id', $customer_id);
		Session::put('customer_firstname', $request->customer_firstname);
		return Redirect('/checkout');

	}

	public function checkout()
	{
		return view('pages.checkout');
	}

	public function save_shipping_details(Request $request)
	{
		$data = array();
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_firstname'] = $request->shipping_firstname;
		$data['shipping_lastname'] = $request->shipping_lastname;
		$data['shipping_address'] = $request->shipping_address;
		$data['shipping_phone_number'] = $request->shipping_phone_number;
		$data['shipping_city'] = $request->shipping_city;

		$shipping_id = DB::table('tbl_shipping')
										->insertGetId($data);

		Session::put('shipping_id', $shipping_id);
		return Redirect('/payment');		

	}

	public function customer_login(Request $request)
	{
		$customer_email = $request->customer_email;
		$password = md5($request->password);

		$result = DB::table('tbl_customer')
								->where('customer_email_address', $customer_email)
								->where('customer_password', $password)
								->first();
		if($result)
		{
			Session::put('customer_id', $result->customer_id);
			return Redirect::to('/checkout');
		}
		else
		{
			return Redirect::to('/login-check');
		}

	}


	public function order_place(Request $request)
	{
		$payment_gateway = $request->payment_gateway;
		$payment_total = $request->payment_total;
		
		$pData = array();
		$pData['payment_method'] = $payment_gateway;
		$pData['payment_status'] = 0;
		
		$payment_id = DB::table('tbl_payment')
										->insertGetId($pData);

		$oData = array();
		$oData['customer_id'] = Session::get('customer_id');
		$oData['shipping_id'] = Session::get('shipping_id');
		$oData['payment_id'] = $payment_id;
		$oData['order_total'] = Cart::total();
		$oData['order_status'] = 0;

		$order_id = DB::table('tbl_order')
						->insertGetId($oData);
		
		$contents = Cart::content();

		$odData = array();

		foreach ($contents as $v_content) 
		{
			$odData['order_id'] = $order_id;
			$odData['product_id'] = $v_content->id;
			$odData['product_name'] = $v_content->name;
			$odData['product_price'] = $v_content->price;
			$odData['product_sales_quantity'] = $v_content->qty;

			DB::table('tbl_order_details')
				->insert($odData);
		}

		if($payment_gateway == 'efectivo')
		{
			Cart::destroy();
			return view('pages.handcash');
		}
		elseif($payment_gateway == 'mercado_pago')
		{
			Cart::destroy();
			return view('pages.mercado_pago', ['total' => $payment_total]);
		}
		else
		{
			echo "eligio la transferencia";
		}

	}

	public function customer_logout()
	{
		Session::flush();
		return Redirect::to('/');
	}

	public function payment()
	{
		return view('pages.payment');
	}

	public function manage_order()
	{
		$all_order_info = DB::table('tbl_order')
			->join('tbl_customer', 'tbl_order.customer_id', 'tbl_customer.customer_id')
			->select('tbl_order.*','tbl_customer.customer_firstname','tbl_customer.customer_lastname')
			->get();
		
		$manage_order = view('admin.manage_order')
			->with('all_order_info', $all_order_info);

		return view('admin_layout')
			->with('admin.manage_order', $manage_order);
	}

	public function view_order($order_id)
	{
		$order_by_id = DB::table('tbl_order')
			->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
			->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
			->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
			->select('tbl_order.*',
								'tbl_order_details.*',
								'tbl_customer.*',
								'tbl_shipping.*')
			->where('tbl_order.order_id', $order_id)
			->get();

		$view_order = view('admin.view_order')
			->with('order_by_id', $order_by_id);

		return view('admin_layout')
			->with('admin.view_order', $view_order);
	}

	public function notification_mercado_pago(Request $request)
	{
	    return view('pages.notification_mp');
	}

	public function notification_mp_success(Request $request)
	{
	    return view('pages.notification_mp_success');
	}

	public function notification_mp_pending(Request $request)
	{
	    return view('pages.notification_mp_pending');
	}

	public function notification_mp_failure(Request $request)
	{
	    return view('pages.notification_mp_failure');
	}

}
