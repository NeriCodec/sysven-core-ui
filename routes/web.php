<?php
/**
 * @route post, get
 * @message Rutas para el de bienvenida
 */
Route::get('/', function () {
    return view('template.dashboard');
});

Route::get('/dashboard', function () {
    return view('template.dashboard');
});

/**
 * @route post, get
 * @message Rutas para el modulo de ventas
 */
Route::get('/sale', [
    'as' => 'sales',
    'uses' => 'SaleController@show'
]);

Route::post('/sale/register', [
    'as' => 'sale-register',
    'uses' => 'SaleController@register'
]);


/**
 * @route post, get
 * @message Rutas para el modulo detalles ventas
 */

Route::get('/sale-detail', [
    'as' => 'sale-detail',
    'uses' => 'SaleDetailController@show'
]);

Route::post('/sale-detail/register', [
    'as' => 'detail-register',
    'uses' => 'SaleDetailController@register'
]);

Route::post('/sale-detail/delete', [
    'as' => 'detail-delete',
    'uses' => 'SaleDetailController@delete'
]);

Route::get('/sale-detail/search', [
    'as' => 'sale-detail-search',
    'uses' => 'SaleDetailController@search'
]);

/**
 * @route post, get
 * @message Rutas para el modulo de productos
 */
Route::get('/product', [
    'as' => 'products',
    'uses' => 'ProductController@show'
]);

Route::post('/product/register', [
    'as' => 'register-product',
    'uses' => 'ProductController@register'
]);

Route::post('/product/delete', [
    'as' => 'delete-product',
    'uses' => 'ProductController@delete'
]);

Route::post('/product/update', [
    'as' => 'update-product',
    'uses' => 'ProductController@update'
]);

/**
 * @route post, get
 * @message Rutas para el modulo de insumos del proveedor
 */
Route::get('/product-input-supplies', [
    'as' => 'product-input-supplies',
    'uses' => 'ProductInputSupplieController@show'
]);

Route::post('/product-input-supplie/register', [
    'as' => 'register-product-input-supplie',
    'uses' => 'ProductInputSupplieController@register'
]);

Route::post('/product-input-supplie/delete', [
    'as' => 'delete-product-input-supplie',
    'uses' => 'ProductInputSupplieController@delete'
]);

Route::post('/product-input-supplie/update', [
    'as' => 'update-product-input-supplie',
    'uses' => 'ProductInputSupplieController@update'
]);

/**
 * @route post, get
 * @message Rutas para el modulo de proveedores
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


