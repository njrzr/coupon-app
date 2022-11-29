@extends('index')

@section('content')
  @if (session('send'))
    <div class="relative flex items-center justify-center w-full mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">{{ session('send') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  <p class="w-full my-4 text-2xl md:text-4xl text-center">Cupones disponibles</p>

  <div class="grid md:grid-cols-4 gap-2 mx-auto mb-2 p-1 rounded-lg w-full">
    @foreach ($coupons as $coupon)
      @if ($coupon->coupon_quantity - $coupon->claimed != 0)
        <a class="relative grid grid-cols-6 gap-2 bg-slate-300 md:hover:bg-slate-200 rounded-lg p-2 cursor-pointer drop-shadow-md transition duration-100 overflow-hidden" href="/claim/{{ $coupon->id }}">
          <picture class="col-span-2 flex items-center justify-center">
            <img class="w-full p-1 rounded-lg object-cover" src="{{ $coupon->store_image }}" alt="Logo de tienda.">
          </picture>
          <div class="col-span-4">
            <p class="font-semibold">{{ $coupon->store }}</p>
            <p>Descuento: € {{ $coupon->coupon_discount }}</p>
            <p>Disponibles: {{ $coupon->coupon_quantity - $coupon->claimed }}</p>
          </div>
        </a>
      @else
        <a class="relative grid grid-cols-6 gap-2 bg-slate-300 rounded-lg p-2 drop-shadow-md transition duration-100 overflow-hidden">
          <picture class="col-span-2 flex items-center justify-center">
            <img class="w-full p-1 rounded-lg object-cover" src="{{ $coupon->store_image }}" alt="Logo de tienda.">
          </picture>
          <div class="col-span-4">
            <p class="font-semibold">{{ $coupon->store }}</p>
            <p>Descuento: € {{ $coupon->coupon_discount }}</p>
            <p>Disponibles: {{ $coupon->coupon_quantity - $coupon->claimed }}</p>
          </div>
          <p class="absolute font-semibold text-white top-8 -right-10 uppercase bg-slate-400 px-8 py-1 transform rotate-45">reclamados</p>
        </a>
      @endif
    @endforeach
  </div>

  <div class="w-full">
    {{ $coupons->links() }}
  </div>
@endsection
