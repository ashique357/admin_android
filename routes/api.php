<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//-------------------Service API----------------------------//

Route::get('/services','API\ServiceController@index');
Route::get('/services/{service}','API\ServiceController@show');
Route::post('/services','API\ServiceController@store');
Route::put('/services/{service}','API\ServiceController@update');
Route::get('/services/{service}','API\ServiceController@delete');



//-------------------Shop API----------------------------//

Route::get('/shops','API\ShopController@index');
Route::get('/shops/{shop}','API\ShopController@show');
Route::post('/shops','API\ShopController@store');
Route::put('/shops/{shop}','API\ShopController@update');
Route::get('/shops/{shop}','API\ShopController@delete');


//-------------------Product API----------------------------//

Route::get('/products','API\ProductController@index');
Route::get('/products/{product}','API\ProductController@show');
Route::post('/products','API\ProductController@store');
Route::put('/products/{product}','API\ProductController@update');
Route::get('/products/{product}','API\ProductController@delete');


Route::get('/orders','API\OrderController@index');
