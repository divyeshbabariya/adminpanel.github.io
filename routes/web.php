<?php

use Illuminate\Support\Facades\Route;
use app\http\Controllers\LoginController;

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
  
  if (session()->has('users')) {
    return view('home');
  } else {
    return view('login/form');
  }

  // return view('temp');
});
Route::view("form","login/form");
// Route::view('form', function () {

//   if (session()->has('users')) {
//     return view('home');
//   } else {
//     return view('login/form');
//   }
// });
Route::post("loginAdmin", "LoginController@loginAdmin");
Route::get('logout', 'LoginController@logout');
