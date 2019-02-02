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
Route::get('/clientes/nuevo/', 'ClientController@new')->name('new-client');
Route::post('/clientes/nuevo/', 'ClientController@save')->name('save-client');
Route::get('/clientes/{client}/editar/', 'ClientController@edit')->name('edit-client');
Route::put('/clientes/{client}/editar/', 'ClientController@update')->name('update-client');


//VENTAS

Route::get('/ventas/', 'SaleController@show')->name('show-sales');
Route::get('/ventas/nuevo/', 'SaleController@new')->name('new-sale');


//PRODUCTOS

Route::get('/productos/', 'ProductController@show')->name('show-products');
Route::get('/productos/agregar-stock', 'ProductController@addstock')->name('add-stock');
Route::get('/productos/exito', 'ProductController@success')->name('product-success');

Route::get('/productos/nuevo','ProductController@new')->name('new-product');
Route::post('/productos/nuevo','ProductController@save')->name('save-product');
Route::get('/productos/apiaddone/{code}','ProductController@showProductApiAndSum1')->name('api-code-product-sum1');
Route::get('/productos/api/{code}','ProductController@showProductApi')->name('api-code-product');
Route::get('/productos/{product}','ProductController@detail')->name('detail-product');


//DASHBOARD

Route::get('/dashboard/', 'DashboardController@show')->name('dashboard');
