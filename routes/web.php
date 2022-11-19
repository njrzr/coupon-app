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

Route::get('/list', [CouponController::class, 'list'])->name('list');

/* Route to the see the coupon sent on email */
Route::get('/coupon-view', function () {
  return view('/email/coupon');
});

// Route::get('/claim/{id}', [CouponController::class, 'claim'])->name('claim');
// Route::post('/claim', [CouponController::class, 'sendCoupon'])->name('send-coupon');

/* These routes should use the auth middleware */

Route::get('/', [CouponController::class, 'admin'])->name('admin');
Route::get('/new', [CouponController::class, 'new'])->name('new');
Route::post('/create', [CouponController::class, 'create'])->name('create');
Route::get('/claimed', [CouponController::class, 'claimed'])->name('claimed');
Route::get('/update', [CouponController::class, 'listUpdate'])->name('list-update');
Route::post('/update', [CouponController::class, 'update'])->name('update');
