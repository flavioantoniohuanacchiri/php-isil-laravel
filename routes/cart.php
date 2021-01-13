<?php

Route::get("/category-list/{categoryUrl}", "HomeController@getCategoryItems");
Route::get("/order-success/{orderCode}", "CartController@successOrder");
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get("/cart-get", "CartController@get")->name("cart.get");
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');
Route::get('/cart-billing', 'CartController@billing')->name("cart.billing");
Route::post('/cart-remove', 'CartController@remove')->name('cart.remove');