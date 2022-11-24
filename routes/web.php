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

// This route list the coupons.
Route::get('/coupons', [CouponController::class, 'list'])->name('coupons');

// These routes are for claim coupons through the app
Route::get('/claim/{id}', [CouponController::class, 'claim'])->name('claim');
Route::post('/claim', [CouponController::class, 'sendCoupon'])->name('send-coupon');

Route::get('/', [CouponController::class, 'admin'])->name('admin');

Route::middleware('auth')->group(function () {
  Route::get('/new', [CouponController::class, 'new'])->name('new');
  Route::post('/create', [CouponController::class, 'create'])->name('create');
  Route::get('/claimed', [CouponController::class, 'claimed'])->name('claimed');
  Route::get('/user-claimed', [CouponController::class, 'userClaimed'])->name('user-claimed');
  Route::get('/update', [CouponController::class, 'listUpdate'])->name('list-update');
  Route::post('/update', [CouponController::class, 'update'])->name('update');
  Route::get('/view-token', [CouponController::class, 'tokenView'])->name('token-view');
  Route::post('/create-token', [CouponController::class, 'createToken'])->name('token-create');
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});

require __DIR__ . '/auth.php';
