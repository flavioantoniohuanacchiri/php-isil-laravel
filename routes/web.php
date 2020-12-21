<?php

use Illuminate\Support\Facades\Route;

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

//Route::get("/", "WelcomeController@viewWelcome");
Route::get("/dashboard", "WelcomeController@viewDashboard");

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get("/user", "UserController@index");
Route::post("/user/store", "UserController@store");
Route::get("/user/show", "UserController@show");
Route::post("/user/destroy", "UserController@destroy");

Route::get("/profile", "ProfileController@index");
Route::post("/profile/store", "ProfileController@store");
Route::get("/profile/show", "ProfileController@show");
Route::post("/profile/destroy", "ProfileController@destroy");

Route::get("/sale", "SaleController@index");
Route::post("/sale/store", "SaleController@store");
Route::get("/sale/show", "SaleController@show");
Route::post("/sale/destroy", "SaleController@destroy");

Route::get("/customer", "CustomerController@index");
Route::post("/customer/store", "CustomerController@store");
Route::get("/customer/show", "CustomerController@show");
Route::post("/customer/destroy", "CustomerController@destroy");

Route::get("/provider", "ProviderController@index");
Route::post("/provider/store", "ProviderController@store");
Route::get("/provider/show", "ProviderController@show");
Route::post("/provider/destroy", "ProviderController@destroy");

Route::get("/attribute_type", "AttributeTypeController@index");
Route::post("/attribute_type/store", "AttributeTypeController@store");
Route::get("/attribute_type/show", "AttributeTypeController@show");
Route::post("/attribute_type/destroy", "AttributeTypeController@destroy");

Route::get("/attribute", "AttributeController@index");
Route::post("/attribute/store", "AttributeController@store");
Route::get("/attribute/show", "AttributeController@show");
Route::post("/attribute/destroy", "AttributeController@destroy");

Route::get("/category", "CategoryController@index");
Route::post("/category/store", "CategoryController@store");
Route::get("/category/show", "CategoryController@show");
Route::post("/category/destroy", "CategoryController@destroy");

Route::get("/product", "ProductController@index");
Route::post("/product/store", "ProductController@store");
Route::get("/product/show", "ProductController@show");
Route::post("/product/destroy", "ProductController@destroy");
