<?php

use Illuminate\Support\Facades\Route;
use app\http\Controllers\LoginController;
use app\Http\Controllers\StudentController;

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

  if (session()->has('data')) {
    return view('home');
  } else {
    return view('login/form');
  }

  // return view('temp');
});

Route::view('form', function () {

  if (session()->has('data')) {
    return view('home');
  } else {
    return view('login/form');
  }
});

Route::view('home', function () {

  if (session()->has('data')) {
    return view('home');
  } else {
    return view('form');
  }
});

Route::post("loginAdmin", "LoginController@loginAdmin");
Route::get('logout', 'LoginController@logout');
Route::get("student_table", 'StudentController@student_table');
