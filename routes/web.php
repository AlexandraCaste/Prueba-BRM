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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Vista de crear productp
Route::get('createProduct', ['as' => 'createProduct', 'uses' => 'ProductController@create']);
//Metodo de crear producto
Route::post('product/store', ['as' => 'product/store', 'uses' => 'ProductController@store']);

Route::get('product/show', ['as' => 'product/show', 'uses' => 'ProductController@show']);

Route::get('createSale', ['as' => 'createSale', 'uses' => 'SaleController@create']);