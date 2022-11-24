<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\UserEmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CouponController extends Controller
{
  public function admin()
  {
    return view('/index');
  }

  public function new()
  {
    return view('coupons/new');
  }

  public function claimed()
  {
    $claimed = Coupon::paginate(10);
    return view('coupons/claimed', ['claimed' => $claimed]);
  }

  public function tokenView()
  {
    if (isset(Auth::user()->tokens[0]) !== true) return view('/token', ['created' => false]);
    return view('/token', ['created' => true]);
  }

  public function userClaimed()
  {
    $users = UserEmail::paginate(10);
    return view('coupons/users', ['users' => $users]);
  }

  public function create(Request $request)
  {
    $request->validate([
      'store' => ['required', 'string'],
      'store-logo' => ['required', 'string'],
      'coupon-code' => ['required', 'string'],
      'coupon-quantity' => ['required', 'integer'],
      'coupon-discount' => ['required', 'numeric']
    ]);

    $coupon = Coupon::create([
      'store' => $request['store'],
      'code' => $request['coupon-code'],
      'coupon_discount' => $request['coupon-discount'],
      'coupon_quantity' => $request['coupon-quantity'],
      'store_image' => $request['store-logo']
    ]);

    $coupon->save();

    return redirect()->back()->with(['success' => 'Cupon creado.', 'open' => true]);
  }

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

  public function createToken()
  {
    if (isset(Auth::user()->tokens[0]) !== false) {
      Auth::user()->tokens()->delete();
      $token = Auth::user()->createToken('admin');
      return redirect()->back()->with(['updated' => 'Token regenerado.', 'token' => $token->plainTextToken, 'open' => true]);
    } else {
      $token = Auth::user()->createToken('admin');
      return redirect()->back()->with(['created' => 'Token creado.', 'token' => $token->plainTextToken, 'open' => true]);
    }
  }

  public function list()
  {
    $coupons = Coupon::paginate(12);
    return view('coupons/list', ['coupons' => $coupons]);
  }

  public function listUpdate()
  {
    $coupons = Coupon::paginate(10);
    return view('coupons/update', ['coupons' => $coupons]);
  }

  public function claim(Request $request)
  {
    $coupon = Coupon::find($request->id);
    return view('coupons/claim', ['coupon' => $coupon]);
  }

  public function sendCoupon(Request $request)
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

  public function update(Request $request)
  {
    $coupon = Coupon::find($request->id);

    $coupon->update([
      'store' => $request['store'],
      'code' => $request['coupon-code'],
      'coupon_discount' => $request['coupon-discount'],
      'coupon_quantity' => $request['coupon-quantity']
    ]);

    return redirect()->back()->with(['update' => 'Cupon actualizado.', 'open' => true]);
  }
}
