@extends('index')

@section('content')
  @if (session('update'))
    <div class="relative flex items-center justify-center w-full mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">{{ session('update') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  <p class="w-full my-4 text-4xl text-center">Actualizar cupones.</p>

  <div class="grid gap-2 mb-2 p-1 rounded-lg w-full">
    <div class="grid md:grid-cols-6 gap-1 w-full bg-slate-300 rounded-lg p-2">
      <p class="text-center font-semibold text-white bg-slate-400 rounded-lg p-1">Imagen</p>
      <p class="text-center font-semibold text-white bg-slate-400 rounded-lg p-1">Tienda</p>
      <p class="text-center font-semibold text-white bg-slate-400 rounded-lg p-1">Codigo</p>
      <p class="text-center font-semibold text-white bg-slate-400 rounded-lg p-1">Descuento</p>
      <p class="text-center font-semibold text-white bg-slate-400 rounded-lg p-1">Cantidad</p>
      <p class="text-center font-semibold text-white bg-slate-400 rounded-lg p-1">Accion</p>
    </div>

    @foreach ($coupons as $coupon)
      <div class="grid md:grid-cols-6 justify-between items-center gap-2 bg-slate-300 rounded-lg p-2 drop-shadow-md">
        <picture class="col-span-5 md:col-span-1 flex items-center justify-center">
          <img class="w-12 p-1 rounded-lg object-cover" src="{{ $coupon->store_image }}" alt="Logo de tienda.">
        </picture>
        <form class="grid md:grid-cols-5 col-span-5 gap-2 items-center" action="/update" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $coupon->id }}">
          <input class="p-1 rounded-sm text-center" type="text" name="store" value="{{ $coupon->store }}">
          <input class="p-1 rounded-sm text-center" type="text" name="coupon-code" value="{{ $coupon->code }}">
          <input class="p-1 rounded-sm text-center" type="text" name="coupon-discount" value="{{ $coupon->coupon_discount }}">
          <input class="p-1 rounded-sm text-center" type="number" name="coupon-quantity" value="{{ $coupon->coupon_quantity }}">
          <button class="bg-slate-400 px-2 py-1 rounded-lg text-white font-semibold hover:bg-slate-500 transition duration-150">Actualizar</button>
        </form>
      </div>
    @endforeach

    <div class="w-full">
      {{ $coupons->links() }}
    </div>
  </div>
@endsection
