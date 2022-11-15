@extends('index')

@section('content')
  <p class="w-11/12 mx-auto my-4 text-4xl text-center">Cupones disponibles</p>

  <div class="grid grid-cols-4 gap-2 mx-auto mb-2 p-1 rounded-lg w-11/12">
    @foreach ($coupons as $coupon)
      <div class="grid grid-cols-6 gap-2 bg-slate-300 hover:bg-slate-200 rounded-lg p-2 cursor-pointer drop-shadow-md transition duration-100">
        <picture class="col-span-2 flex items-center justify-center">
          <img class="w-full" src="{{ $coupon->store_image }}" alt="Logo de tienda.">
        </picture>
        <div class="col-span-4">
          <p class="font-semibold">{{ $coupon->store }}</p>
          <p>Descuento: {{ $coupon->coupon_discount }}</p>
          <p>Disponibles: {{ $coupon->coupon_quantity }}</p>
        </div>
      </div>
    @endforeach
  </div>

  <div class="w-11/12 mx-auto">
    {{ $coupons->links() }}
  </div>
@endsection
