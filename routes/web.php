<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('layout');
});*/

// Frontend site ..............................
Route::get('/', 'HomeController@index');

// Show Products by ...............................
Route::get('/products_all', 'HomeController@show_product_all');
Route::get('/products_by_category/{category_id}', 'HomeController@show_product_by_category');
Route::get('/products-by-manufacture/{manufacture_id}', 'HomeController@show_product_by_manufacture');
Route::get('/view-product/{product_id}', 'HomeController@show_product_details');

// Cart ...............................
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');

Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::post('/update-cart', 'CartController@update_cart');

// Checkout ...............................
Route::get('/login-check', 'CheckoutController@login_check');
Route::get('/checkout', 'CheckoutController@checkout');


Route::post('/customer-registration', 'CheckoutController@customer_registration');
Route::post('/save-shipping-details', 'CheckoutController@save_shipping_details');

// Notifications of MercadoPago
Route::get('/notification-mp', 'CheckoutController@notification_mercado_pago');
Route::get('/notification-success', 'CheckoutController@notification_mp_success');
Route::get('/notification-pending', 'CheckoutController@notification_mp_pending');
Route::get('/notification-failure', 'CheckoutController@notification_mp_failure');



// Customers ..............................
Route::get('/customer-logout', 'CheckoutController@customer_logout');
Route::get('/payment', 'CheckoutController@payment');

Route::post('/customer-login', 'CheckoutController@customer_login');
Route::post('/order-place', 'CheckoutController@order_place');

// Manage Orders ..............................
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{order_id}', 'CheckoutController@view_order');


// Backend site ...............................
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

// Category related route ...............................
Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::get('/unactive-category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active-category/{category_id}', 'CategoryController@active_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');

Route::post('/save-category', 'CategoryController@save_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');

// Manufacture related route ...............................
Route::get('/add-manufacture', 'ManufactureController@index');
Route::get('/all-manufacture', 'ManufactureController@all_manufacture');
Route::get('/unactive-manufacture/{manufacture_id}', 'ManufactureController@unactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}', 'ManufactureController@active_manufacture');
Route::get('/edit-manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::get('/delete-manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');

Route::post('/save-manufacture', 'ManufactureController@save_manufacture');
Route::post('/update-manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');

// Products related route ...............................
Route::get('/add-product', 'ProductController@index');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

// Slider related route ...............................
Route::get('/add-slider', 'SliderController@index');
Route::get('/all-slider', 'SliderController@all_slider');
Route::get('/unactive-slider/{slider_id}', 'SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}', 'SliderController@active_slider');
Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');

Route::post('/save-slider', 'SliderController@save_slider');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
