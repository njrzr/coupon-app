<?php

use App\Http\Controllers\CouponController;
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

Route::post('/create', [CouponController::class, 'create'])->name('create');

Route::get('/claimed', function () {
  return view('coupons/claimed');
});

Route::get('/update', [CouponController::class, 'list_update'])->name('list-update');
Route::post('/update', [CouponController::class, 'update'])->name('update');
Route::get('/list', [CouponController::class, 'list'])->name('list');
