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

Route::get('/dashboard', function () {
    return view('template.dashboard');
});

Route::get('/default', function () {
    return view('page-wrapper-default');
});

Route::get('/sale', [
    'as' => 'sales',
    'uses' => 'SaleController@showSales'
]);

Route::get('/product', [
    'as' => 'products',
    'uses' => 'ProductController@showProducts'
]);

Route::post('/product/register', [
    'as' => 'register-product',
    'uses' => 'ProductController@registerProduct'
]);

Route::post('/product/delete', [
    'as' => 'delete-product',
    'uses' => 'ProductController@deleteProduct'
]);

Route::post('/product/update', [
    'as' => 'update-product',
    'uses' => 'ProductController@updateProduct'
]);
