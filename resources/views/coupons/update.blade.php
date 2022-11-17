@extends('index')

@section('content')
  @if (session('update'))
    <div class="relative flex items-center justify-center w-11/12 mx-auto mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">{{ session('update') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  <p class="w-11/12 mx-auto my-4 text-4xl text-center">Actualizar cupones.</p>

  <div class="grid gap-2 mx-auto mb-2 p-1 rounded-lg w-11/12">
    @foreach ($coupons as $coupon)
      <div class="flex justify-between items-center gap-2 bg-slate-300 rounded-lg p-2 drop-shadow-md">
        <picture class="flex items-center justify-center">
          <img class="w-12 p-1 rounded-lg object-cover" src="{{ $coupon->store_image }}" alt="Logo de tienda.">
        </picture>
        <form class="flex gap-4 items-center pr-8" action="/update" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $coupon->id }}">
          <label for="store">Tienda:</label>
          <input class="p-1 rounded-sm text-center" type="text" id="store" name="store" value="{{ $coupon->store }}">
          <label for="code">Codigo:</label>
          <input class="p-1 rounded-sm text-center" type="text" id="code" name="coupon-code" value="{{ $coupon->code }}">
          <label for="discount">Descuento:</label>
          <input class="p-1 rounded-sm w-16 text-center" type="text" id="discount" name="coupon-discount" value="{{ $coupon->coupon_discount }}">
          <label for="quantity">Cantidad:</label>
          <input class="p-1 rounded-sm w-20 text-center" type="number" id="quantity" name="coupon-quantity" value="{{ $coupon->coupon_quantity }}">
          <button class="bg-slate-400 px-2 py-1 rounded-lg text-white font-semibold hover:bg-slate-500 transition duration-150">Actualizar</button>
        </form>
      </div>
    @endforeach
    {{ $coupons->links() }}
  </div>
@endsection
