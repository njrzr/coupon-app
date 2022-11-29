@extends('index')

@section('content')
  <div class="relative flex flex-col items-center justify-between gap-1 bg-slate-300 w-full my-2 p-2 rounded-lg overflow-x-auto">
    <div class="grid md:grid-cols-5 gap-1 w-full border border-slate-400 md:border-none p-2 md:p-0 rounded-lg">
      <p class="font-semibold text-white bg-slate-400  p-1">Tienda</p>
      <p class="font-semibold text-white bg-slate-400  p-1">Codigo</p>
      <p class="font-semibold text-white bg-slate-400  p-1">Descuento</p>
      <p class="font-semibold text-white bg-slate-400  p-1">Cantidad</p>
      <p class="font-semibold text-white bg-slate-400  p-1">Canjeados</p>
    </div>

    @foreach ($claimed as $claim)
      @if ($claim->claimed != 0)
        <div class="grid md:grid-cols-5 gap-1 w-full border border-slate-400 md:border-none p-2 md:p-0">
          <p class="border border-slate-400  p-1">{{ $claim->store }}</p>
          <p class="border border-slate-400  p-1">{{ $claim->code }}</p>
          <p class="border border-slate-400  p-1 text-right">{{ $claim->coupon_discount }}</p>
          <p class="border border-slate-400  p-1 text-right">{{ $claim->coupon_quantity }}</p>
          <p class="border border-slate-400  p-1 text-right">{{ $claim->claimed }}</p>
        </div>
      @endif
    @endforeach
  </div>

  <div class="w-full">
    {{ $claimed->links() }}
  </div>
@endsection
