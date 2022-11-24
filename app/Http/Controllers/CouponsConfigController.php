<?php

namespace App\Http\Controllers;

use App\Models\CouponsConfig;
use Illuminate\Http\Request;

class CouponsConfigController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $config = CouponsConfig::first();

    return view('coupons/config', ['config' => $config]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\CouponsConfig  $couponsConfig
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, CouponsConfig $couponsConfig)
  {
    $config = CouponsConfig::first();

    $config->update($request->all());

    return redirect()->back()->with(['success' => 'Configuración actualizada', 'open' => true]);
  }
}
