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

/*Route::get('/business', function () {
    return view('business');
});

Route::get('/profile', function () {
    return view('profile');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
<<<<<<< Updated upstream
=======
Route::resource("/user", "UserController");
Route::resource("/business", "BusinessController");
Route::resource("/profile", "ProfileController");
>>>>>>> Stashed changes
