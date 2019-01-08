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

Route::get('/', function () {
    return view('welcome');
});


//CLIENTE

Route::get('/clientes/', 'ClientController@show')->name('show-clients');


//VENTAS

Route::get('/ventas/', 'SaleController@show')->name('show-sales');


//PRODUCTOS

Route::get('/productos/', 'ProductController@show')->name('show-products');

//test

Route::get('/test/', 'ProductController@test')->name('test');
