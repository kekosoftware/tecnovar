<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;

session_start();

class ProductController extends Controller
{

	public function index()
	{
		$this->AdminAuthCheck();

		return view('admin.add_product');
	}

	public function all_product()
	{
		$this->AdminAuthCheck();

		$all_product_info = DB::table('tbl_product')
			->join('tbl_category', 'tbl_product.category_id', 'tbl_category.category_id')
			->join('tbl_manufacture', 'tbl_product.manufacture_id', 'tbl_manufacture.manufacture_id')
			->select('tbl_product.*','tbl_category.category_name', 'tbl_manufacture.manufacture_name')
			->get();
		
		$manage_product = view('admin.all_product')
			->with('all_product_info', $all_product_info);

		return view('admin_layout')
			->with('admin.all_product', $manage_product);
	}

	public function save_product(Request $request)
	{
		$data=array();
		$data['product_name'] = $request->product_name;
		$data['category_id'] = $request->category_id;
		$data['manufacture_id'] = $request->manufacture_id;
		$data['product_short_description'] = $request->product_short_description;
		$data['product_long_description'] = $request->product_long_description;
		$data['product_price'] = $request->product_price;
		$data['product_size'] = $request->product_size;
		$data['product_color'] = $request->product_color;
		$data['product_status'] = $request->product_status;

		$image = $request->file('product_image');

		if($image)
		{
			//$image_name = str_random(20);
			$image_name = md5($image);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'img/';
			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path, $image_full_name);
			if($success)
			{
				$data['product_image'] = $image_url;
				$data['created_at'] = DB::raw('CURRENT_TIMESTAMP');
				$data['updated_at'] = DB::raw('CURRENT_TIMESTAMP');

				DB::table('tbl_product')->insert($data);
				Session::put('message','El producto ha sido agregado correctamente');

				return Redirect::to('/add-product');
			}
			
		}

		$data['product_image'] = '';
		$data['created_at'] = DB::raw('CURRENT_TIMESTAMP');

		DB::table('tbl_product')->insert($data);
		Session::put('message','El producto ha sido agregado sin imagen');

		return Redirect::to('/add-product');

	}

	public function unactive_product($product_id)
	{
		DB::table('tbl_product')
			->where('product_id', $product_id)
			->update(['product_status' => 0]);

		Session::put('message','El producto ha sido Actualizado correctamente');

		return Redirect::to('all-product');

	}

	public function active_product($product_id)
	{
		DB::table('tbl_product')
			->where('product_id', $product_id)
			->update(['product_status' => 1]);

		Session::put('message','El producto ha sido Actualizado correctamente');

		return Redirect::to('all-product');

	}

	public function edit_product($product_id)
	{
		$this->AdminAuthCheck();

		$product_info = DB::table('tbl_product')
			->where('product_id', $product_id)
			->first();

		$product_info = view('admin.edit_product')
			->with('product_info', $product_info);

		return view('admin_layout')
			->with('admin.edit_product', $product_info);
	}

	public function update_product(Request $request, $product_id)
	{
		$data=array();
		$data['product_name'] = $request->product_name;
		$data['category_id'] = $request->category_id;
		$data['manufacture_id'] = $request->manufacture_id;
		$data['product_short_description'] = $request->product_short_description;
		$data['product_long_description'] = $request->product_long_description;
		$data['product_price'] = $request->product_price;
		$data['product_size'] = $request->product_size;
		$data['product_color'] = $request->product_color;
		$data['product_status'] = $request->product_status;

		$image = $request->file('product_image');

		if($image)
		{
			$image_name = md5($image);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'img/';
			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path, $image_full_name);
			if($success)
			{
				$data['product_image'] = $image_url;
				$data['updated_at'] = DB::raw('CURRENT_TIMESTAMP');

				DB::table('tbl_product')
					->where('product_id', $product_id)
					->update($data);
				Session::put('message','El producto ha sido agregado correctamente');

				return Redirect::to('/all-product');
			}
			
		}

		$data['product_image'] = '';
		$data['updated_at'] = DB::raw('CURRENT_TIMESTAMP');

		DB::table('tbl_product')
			->where('product_id', $product_id)
			->update($data);
		Session::put('message','El producto ha sido agregado sin imagen');

		return Redirect::to('/all-product');
	}

	public function delete_product($product_id)
	{
		DB::table('tbl_product')
			->where('product_id', $product_id)
			->delete();
		
		Session::put('message','La categoria se ha borrado correctamente');

		return Redirect::to('/all-product');

	}

	public function AdminAuthCheck()
	{
		$admin_id = Session::get('admin_id');
		
		if($admin_id)
		{
			return;
		}
		else
		{
			return Redirect::to('/admin')->send();
		}
	}
}
