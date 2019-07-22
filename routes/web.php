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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TestcartController@index')->name('index');

Route::get('/getProducts', 'ProductController@getProducts')->name('getProducts');


//CartController Routing
Route::post('/addCart', 'TestcartController@addCart')->name('addCart');
Route::get('/getCart', 'TestcartController@getCart')->name('getCart');