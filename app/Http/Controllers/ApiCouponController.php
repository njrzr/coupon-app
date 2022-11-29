<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\UserEmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class ApiCouponController extends Controller
{
  public function apiCreate(Request $request)
  {
    $request->validate([
      'store' => ['required', 'string'],
      'store-logo' => ['required', 'string'],
      'coupon-code' => ['required', 'string']
    ]);

    $coupon = Coupon::create([
      'store' => $request['store'],
      'code' => $request['coupon-code'],
      'store_image' => $request['store-logo']
    ]);

    $coupon->save();

    return response()->json(['success' => 'Cupon creado.']);
  }

  public function apiSendCoupon(Request $request)
  {
    $request->validate([
      'username' => ['required', 'string'],
      'phone' => ['required', 'numeric'],
      'email' => ['required', 'email']
    ]);

    $couponStore = Coupon::find($request['store-id']);

    $userEmail = UserEmail::create([
      'username' => $request->username,
      'email' => $request->email,
      'phone' => $request->phone,
      'store_id' => $couponStore->id,
      'store_name' => $couponStore->store
    ]);

    if ($couponStore->claimed >= $couponStore->coupon_quantity) return response()->json(['claimed' => 'Cupones agotados.'], 400);

    $couponStore->update([
      'claimed' => $couponStore->claimed + 1
    ]);

    $pdf = Pdf::loadView('email.coupon', ['user' => $userEmail, 'store' => $couponStore]);

    Mail::send('email.message', ['user' => $userEmail, 'store' => $couponStore], function ($message) use ($userEmail, $pdf) {
      $message->from('no-reply@paradaonline.cat')
        ->to($userEmail->email)
        ->subject('¡' . $userEmail->username . ' tu cupon ha llegado.')
        ->attachData($pdf->output(), 'cupon.pdf');
    });

    return response()->json(['send' => 'Cupón enviado.']);
  }
}
