@extends('index')

@section('content')
  <div class="relative flex flex-col items-center justify-between gap-1 bg-slate-300 w-11/12 mx-auto my-1 p-2 rounded-lg">
    <div class="grid grid-cols-5 gap-1 w-full">
      <p class="font-semibold text-white bg-slate-400 rounded-lg p-1">Tienda</p>
      <p class="font-semibold text-white bg-slate-400 rounded-lg p-1">Codigo</p>
      <p class="font-semibold text-white bg-slate-400 rounded-lg p-1">Descuento</p>
      <p class="font-semibold text-white bg-slate-400 rounded-lg p-1">Cantidad</p>
      <p class="font-semibold text-white bg-slate-400 rounded-lg p-1">Canjeados</p>
    </div>
    @foreach ($claimed as $claim)
      @if ($claim->claimed != 0)
        <div class="grid grid-cols-5 gap-1 w-full">
          <p class="border border-slate-400 rounded-lg p-1">{{ $claim->store }}</p>
          <p class="border border-slate-400 rounded-lg p-1">{{ $claim->code }}</p>
          <p class="border border-slate-400 rounded-lg p-1 text-right">{{ $claim->coupon_discount }}</p>
          <p class="border border-slate-400 rounded-lg p-1 text-right">{{ $claim->coupon_quantity }}</p>
          <p class="border border-slate-400 rounded-lg p-1 text-right">{{ $claim->claimed }}</p>
        </div>
      @endif
    @endforeach
  </div>

  <div class="w-11/12 mx-auto">
    {{ $claimed->links() }}
  </div>
@endsection
