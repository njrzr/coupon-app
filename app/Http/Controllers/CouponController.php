<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

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

    $coupon = Coupon::create([
      'store' => $request['store'],
      'code' => $request['coupon-code'],
      'coupon_discount' => $request['coupon-discount'],
      'coupon_quantity' => $request['coupon-quantity'],
      'store_image' => $request['store-logo'],
    ]);

    $coupon->save();

    return redirect()->back()->with('success', 'Cupon creado.');
  }

  public function list()
  {
    $coupons = Coupon::paginate(12);
    return view('coupons/list', ['coupons' => $coupons]);
  }

  public function list_update()
  {
    $coupons = Coupon::paginate(10);
    return view('coupons/update', ['coupons' => $coupons]);
  }

  public function update(Request $request)
  {
    $coupon = Coupon::find($request->id);

    $coupon->update([
      'store' => $request['store'],
      'code' => $request['coupon-code'],
      'coupon_discount' => $request['coupon-discount'],
      'coupon_quantity' => $request['coupon-quantity']
    ]);

    $coupon->save();

    return redirect()->back()->with('update', 'Cupon actualizado.');
  }
}
