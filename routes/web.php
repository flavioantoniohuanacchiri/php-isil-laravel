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

Route::get("/business", "BusinessController@index");
Route::post("/business/store", "BusinessController@store");
Route::get("/business/show", "BusinessController@show");
Route::post("/business/destroy", "BusinessController@destroy");

Route::get("/categoria", "CategoriaController@index");
Route::post("/categoria/store", "CategoriaController@store");
Route::get("/categoria/show", "CategoriaController@show");
Route::post("/categoria/destroy", "CategoriaController@destroy");

Route::get("/atributotipo", "AtributoTipoController@index");
Route::post("/atributotipo/store", "AtributoTipoController@store");
Route::get("/atributotipo/show", "AtributoTipoController@show");
Route::post("/atributotipo/destroy", "AtributoTipoController@destroy");

Route::get("/atributo", "AtributoController@index");
Route::post("/atributo/store", "AtributoController@store");
Route::get("/atributo/show", "AtributoController@show");
Route::post("/atributo/destroy", "AtributoController@destroy");


Route::get("/producto", "ProductoController@index");
Route::post("/producto/store", "ProductoController@store");
Route::get("/producto/show", "ProductoController@show");
Route::post("/producto/destroy", "ProductoController@destroy");

Route::resource('venta', 'VentaController');
Route::delete('venta/destroy', 'VentaController@massDestroy')->name('venta.massDestroy');