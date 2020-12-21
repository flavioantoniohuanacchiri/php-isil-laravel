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


Route::get("/profile", "ProfileController@index");
Route::post("/profile/store", "ProfileController@store");
Route::get("/profile/show", "ProfileController@show");

Route::post("/user/destroy", "UserController@destroy");

Route::get("/business", "BusinessController@index");
Route::post("/business/store", "BusinessController@store");
Route::get("/business/show", "BusinessController@show");
Route::post("/business/destroy", "BusinessController@destroy");


Route::get("/client", "ClientController@index");
Route::post("/client/store", "ClientController@store");
Route::get("/client/show", "ClientController@show");
Route::post("/client/destroy", "ClientController@destroy");

Route::get("/attributetype", "AttributeTypeController@index");
Route::post("/attributetype/store", "AttributeTypeController@store");
Route::get("/attributetype/show", "AttributeTypeController@show");
Route::post("/attributetype/destroy", "AttributeTypeController@destroy");

Route::get("/provider", "ProviderController@index");
Route::post("/provider/store", "ProviderController@store");
Route::get("/provider/show", "ProviderController@show");
Route::post("/provider/destroy", "ProviderController@destroy");

Route::get("/category", "CategoryController@index");
Route::post("/category/store", "CategoryController@store");
Route::get("/category/show", "CategoryController@show");
Route::post("/category/destroy", "CategoryController@destroy");

Route::get("/product", "ProductController@index");
Route::post("/product/store", "ProductController@store");
Route::get("/product/show", "ProductController@show");
Route::post("/product/destroy", "ProductController@destroy");

Route::get("/attribute", "AttributeController@index");
Route::post("/attribute/store", "AttributeController@store");
Route::get("/attribute/show", "AttributeController@show");
Route::post("/attribute/destroy", "AttributeController@destroy");

Route::get("/producthasattribute", "ProductHasAttributeController@index");
Route::post("/producthasattribute/store", "ProductHasAttributeController@store");
Route::get("/producthasattribute/show", "ProductHasAttributeController@show");
Route::post("/producthasattribute/destroy", "ProductHasAttributeController@destroy");

Route::get("/sale", "SaleController@index");
Route::post("/sale/store", "SaleController@store");
Route::get("/sale/show", "SaleController@show");
Route::post("/sale/destroy", "SaleController@destroy");

Route::get("/saledetail", "SaleDetailController@index");
Route::post("/saledetail/store", "SaleDetailController@store");
Route::get("/saledetail/show", "SaleDetailController@show");
Route::post("/saledetail/destroy", "SaleDetailController@destroy");
