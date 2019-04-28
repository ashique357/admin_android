<?php


//------------------Services------------------//
Route::get('/add-service','ServiceController@add_service');
Route::post('/add-service','ServiceController@post_add_service');

Route::get('/all-services','ServiceController@service_list');

Route::get('/edit/service/{id}','ServiceController@edit_service');
Route::post('/edit/service/{id}','ServiceController@update_service');

Route::get('/delete/service/{id}','ServiceController@delete');


Route::get('/new/service/{id}','ServiceController@make_new');
Route::get('/cancel/new-service/{id}','ServiceController@cancel_new');


//------------------Shop Categories------------//

Route::get('/add-shop','ShopController@add_shop');
Route::post('/add-shop','ShopController@post_add_shop');


Route::get('/edit/shop/{id}','ShopController@edit');
Route::post('/edit/shop/{id}','ShopController@update');

Route::get('/delete/shop/{id}','ShopController@delete');





//------------------Shop Categories------------//

Route::get('/add-product','ProductController@add_product');
Route::post('/add-product','ProductController@post_add_product');



Route::get('/edit/product/{id}','ProductController@edit');
Route::post('/edit/product/{id}','ProductController@update');

Route::get('/delete/product/{id}','ProductController@delete');

Route::get('/top/product/{id}','ProductController@make_top');
Route::get('/cancel/product/{id}','ProductController@cancel_top');




Route::get('/show-shop/{id}','ServiceController@show_shops');
Route::get('/show-product/{id}','ShopController@show_products');
Route::get('/product/{id}','ProductController@product_item');




//------------------Advertise-----------------------//

Route::get('/add-advertise','AdvertiseController@add');
Route::post('/add-advertise','AdvertiseController@store');

Route::get('/cancel/advertise/{id}','AdvertiseController@change_status_0');
Route::get('/add/advertise/{id}','AdvertiseController@change_status_1');
Route::get('/all-advertises','AdvertiseController@show');
