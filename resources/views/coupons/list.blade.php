@extends('index')

@section('content')
  @if (session('claimed'))
    <div class="relative flex items-center justify-center w-11/12 mx-auto mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">{{ session('claimed') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  <p class="w-11/12 mx-auto my-4 text-4xl text-center">Cupones disponibles.</p>

  <div class="grid grid-cols-4 gap-2 mx-auto mb-2 p-1 rounded-lg w-11/12">
    @foreach ($coupons as $coupon)
      <a class="grid grid-cols-6 gap-2 bg-slate-300 hover:bg-slate-200 rounded-lg p-2 cursor-pointer drop-shadow-md transition duration-100" href="/claim/{{ $coupon->id }}">
        <picture class="col-span-2 flex items-center justify-center">
          <img class="w-full p-1 rounded-lg object-cover" src="{{ $coupon->store_image }}" alt="Logo de tienda.">
        </picture>
        <div class="col-span-4">
          <p class="font-semibold">{{ $coupon->store }}</p>
          <p>Descuento: € {{ $coupon->coupon_discount }}</p>
          <p>Disponibles: {{ $coupon->coupon_quantity - $coupon->claimed }}</p>
        </div>
      </a>
    @endforeach
  </div>

  <div class="w-11/12 mx-auto">
    {{ $coupons->links() }}
  </div>
@endsection
