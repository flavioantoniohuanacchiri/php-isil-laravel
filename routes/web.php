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

Route::get("/module", "ModuleController@index");
Route::post("/module/store", "ModuleController@store");
Route::get("/module/show", "ModuleController@show");
Route::post("/module/destroy", "ModuleController@destroy");

