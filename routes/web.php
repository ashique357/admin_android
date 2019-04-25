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
    return view('layouts.master');
});

//------------------Services------------------//
Route::get('/add-service','ServiceController@add_service');
Route::post('/add-service','ServiceController@post_add_service');

Route::get('/all-services','ServiceController@service_list');

Route::get('/edit/service/{id}','ServiceController@edit_service');
Route::post('/edit/service/{id}','ServiceController@update_service');

Route::get('/delete/service/{id}','ServiceController@delete');

//Route::get('/top/service/{id}','ServiceController@make_top');
//Route::get('/cancel/service/{id}','ServiceController@cancel_top');

Route::get('/new/service/{id}','ServiceController@make_new');
Route::get('/cancel/new-service/{id}','ServiceController@cancel_new');


//------------------Shop Categories------------//

Route::get('/add-shop','ShopController@add_shop');
Route::post('/add-shop','ShopController@post_add_shop');

Route::get('/all-shops','ShopController@shop_list');

Route::get('/edit/shop/{id}','ShopController@edit');
Route::post('/edit/shop/{id}','ShopController@update');

Route::get('/delete/shop/{id}','ShopController@delete');





//------------------Shop Categories------------//

Route::get('/add-product','ProductController@add_product');
Route::post('/add-product','ProductController@post_add_product');

Route::get('/all-products','ProductController@product_list');

Route::get('/edit/product/{id}','ProductController@edit');
Route::post('/edit/product/{id}','ProductController@update');

Route::get('/delete/product/{id}','ProductController@delete');
// Route::get('/product/{id}','Produ`Controller@product_show');
