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

/**
 * Rutas para las ventas realizadas
 */

Route::get('/sale', [
    'as' => 'sales',
    'uses' => 'SaleController@showSales'
]);

/**
 * Rutas para los productos
 */

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

/**
 * Rutas para los insumos de un producto
*/
Route::get('/product-input', [
    'as' => 'product-inputs',
    'uses' => 'ProductInputController@showProductInputs'
]);

Route::post('/product-input/register', [
    'as' => 'register-product-input',
    'uses' => 'ProductInputController@registerProductInput'
]);

Route::post('/product-input/delete', [
    'as' => 'delete-product-input',
    'uses' => 'ProductInputController@deleteProductInput'
]);

Route::post('/product-input/update', [
    'as' => 'update-product-input',
    'uses' => 'ProductInputController@updateProductInput'
]);

/**
 * Rutas para los proveedores de insumos
 */
Route::get('/supplies', [
    'as' => 'supplies',
    'uses' => 'SupplyController@showSupplies'
]);

Route::post('/supplies/register', [
    'as' => 'register-supply',
    'uses' => 'SupplyController@registerSupply'
]);

Route::post('/supplies/delete', [
    'as' => 'delete-supply',
    'uses' => 'SupplyController@deleteSupply'
]);

Route::post('/supplies/update', [
    'as' => 'update-supply',
    'uses' => 'SupplyController@updateSupply'
]);


