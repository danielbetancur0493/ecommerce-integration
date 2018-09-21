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

Route::get('/', ['as'=>'front.index',
                'uses'=>'FrontController@index']);
Route::get('/cart/{id}',['as'=>'front.product.search','uses'=>'FrontController@cart']);

Route::post('/checkout/payment',['as'=>'checkout.payment','uses'=>'CheckoutController@payment']);

Route::get('checkout/transaction',['as'=>'checkout.transaction','uses'=>'CheckoutController@transaction']);

Route::get('checkout/transaction/list',['as'=>'checkout.transaction.list','uses'=>'CheckoutController@list']);
