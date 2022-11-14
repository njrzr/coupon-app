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

Route::get('/', function () {
  return view('index');
});

Route::get('/new', function () {
  return view('coupons/new');
});

Route::get('/claimed', function () {
  return view('coupons/claimed');
});

Route::get('/update', function () {
  return view('coupons/update');
});

Route::get('/list', function () {
  return view('coupons/list');
});
