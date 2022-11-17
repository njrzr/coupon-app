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

Route::get('/', [CouponController::class, 'list'])->name('list');
Route::get('/claim/{id}', [CouponController::class, 'claim'])->name('claim');
Route::post('/claim', [CouponController::class, 'sendCoupon'])->name('send-coupon');

/* These routes should use the auth middleware */
Route::get('/admin', [CouponController::class, 'admin'])->name('admin');
Route::get('/new', [CouponController::class, 'new'])->name('new');
Route::post('/create', [CouponController::class, 'create'])->name('create');
Route::get('/claimed', [CouponController::class, 'claimed'])->name('claimed');
Route::get('/update', [CouponController::class, 'listUpdate'])->name('list-update');
Route::post('/update', [CouponController::class, 'update'])->name('update');
