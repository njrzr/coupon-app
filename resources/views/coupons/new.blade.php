@extends('index')

@section('content')
  @if (session('success'))
    <div class="relative flex items-center justify-center w-10/12 mx-auto mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">{{ session('success') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  <form class="relative flex flex-wrap w-10/12 mx-auto my-2 p-4 rounded-lg bg-slate-300" action="/create" method="POST" enctype="multipart/form-data">
    @csrf
    <p class="w-full text-center mb-4 text-4xl">Crear cupon.</p>
    <label class="w-3/12 mt-1 p-1 font-semibold text-2xl" for="store">Tienda</label>
    <input class="w-9/12 mb-1 p-1 text-xl rounded-sm" id="store" name="store" type="text" placeholder="ej: H&M" value="{{ old('store') }}" required />

    <label class="w-3/12 mt-1 p-1 font-semibold text-2xl" for="store-logo">Logo de la Tienda</label>
    <input class="w-9/12 mb-1 p-1 text-xl rounded-sm" id="store-logo" name="store-logo" type="url" placeholder="ej: google.drive.com/image.png" value="{{ old('store-logo') }}" required />

    <label class="w-3/12 mt-1 p-1 font-semibold text-2xl" for="coupon-code">Codigo</label>
    <input class="w-9/12 mb-1 p-1 text-xl rounded-sm" id="coupon-code" name="coupon-code" type="text" placeholder="ej: 0000ABCD" value="{{ old('coupon-code') }}" required />

    <label class="w-3/12 mt-1 p-1 font-semibold text-2xl" for="coupon-quantity">Cantidad</label>
    <input class="w-9/12 mb-1 p-1 text-xl rounded-sm" id="coupon-quantity" name="coupon-quantity" type="number" placeholder="ej: 100" value="{{ old('coupon-quantity') }}" required />

    <label class="w-3/12 mt-1 p-1 font-semibold text-2xl" for="coupon-discount">Descuento</label>
    <input class="w-9/12 mb-1 p-1 text-xl rounded-sm" id="coupon-discount" name="coupon-discount" type="text" placeholder="ej: €5" value="{{ old('coupon-discount') }}" required />

    <button class="w-full text-white bg-slate-400 active:bg-slate-500 mt-1 p-1 font-semibold text-2xl cursor-pointer rounded-sm">
      Crear
    </button>
  </form>

  @foreach ($errors->all() as $error)
    <div class="relative flex items-center justify-center w-10/12 mx-auto my-1 p-2 bg-red-400 rounded-lg" x-data="{ open: true }" x-show="open">
      <p class="text-sm text-white">{{ $error }}</p>
      <button class="absolute right-4 text-white bg-red-300 px-2 rounded-sm" x-on:click="open = ! open">x</button>
    </div>
  @endforeach
@endsection
