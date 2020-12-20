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

Route::get("/profile", "ProfileController@index");
Route::post("/profile/store", "ProfileController@store");
Route::get("/profile/show", "ProfileController@show");
Route::post("/profile/destroy", "ProfileController@destroy");

Route::get("/articulos", "ArticulosController@index");
Route::post("/articulos/store", "ArticulosController@store");
Route::get("/articulos/show", "ArticulosController@show");
Route::post("/articulos/destroy", "ArticulosController@destroy");

Route::get("/categoria", "CategoriaController@index");
Route::post("/categoria/store", "CategoriaController@store");
Route::get("/categoria/show", "CategoriaController@show");
Route::post("/categoria/destroy", "CategoriaController@destroy");

Route::get("/tipo", "TipoController@index");
Route::post("/tipo/store", "TipoController@store");
Route::get("/tipo/show", "TipoController@show");
Route::post("/tipo/destroy", "TipoController@destroy");