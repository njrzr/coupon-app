<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class CouponController extends Controller
{
  public function create(Request $request)
  {
    $request->validate([
      'store' => ['required'],
      'store-logo' => ['required'],
      'coupon-code' => ['required'],
      'coupon-quantity' => ['required'],
      'coupon-discount' => ['required']
    ]);

    $coupon = new Coupon;
    $coupon->store = $request['store'];
    $coupon->code = $request['coupon-code'];
    $coupon->coupon_discount = $request['coupon-discount'];
    $coupon->coupon_quantity = $request['coupon-quantity'];
    $coupon->store_image = $request['store-logo'];
    $coupon->save();

    return redirect()->back()->with('success', 'Cupon creado.');
  }
}
