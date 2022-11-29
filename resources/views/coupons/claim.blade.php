@extends('index')

@section('content')
  <div class="relative flex items-center justify-center my-2">
    <div class="relative flex flex-col items-center justify-center p-2 bg-slate-500 text-white rounded-lg">
      <p class="text-2xl md:text-4xl mb-4 font-semibold">Reclamar cupón</p>

      <picture class="w-16 md:w-32">
        <img class="w-full rounded-lg" src="{{ $coupon->store_image }}" alt="Store Logo.">
      </picture>

      <div class="flex flex-col items-center gap-2">
        <p class="text-xl mt-2 font-semibold">{{ $coupon->store }}</p>
        <p class="text-xl mb-2 font-semibold">€{{ $coupon->coupon_discount}}</p>
      </div>

      <form class="grid grid-cols-2 mb-1 gap-2" action="/claim" method="POST">
        @csrf
        <input type="hidden" name="store-id" value="{{ $coupon->id }}" />
        <label class="p-1 font-semibold" for="username">Nombre: </label>
        <input class="text-black p-1 rounded-sm" type="text" id="username" name="username" placeholder="ej: John Doe" required />
        @error('username')
        @enderror
        <label class="p-1 font-semibold" for="phone">Telefono: </label>
        <input class="text-black p-1 rounded-sm" type="tel" id="phone" name="phone" placeholder="ej: +1555444333" required />
        @error('phone')
        @enderror
        <label class="p-1 font-semibold" for="email">Correo: </label>
        <input class="text-black p-1 rounded-sm" type="email" id="email" name="email" placeholder="ej: johndoe@mail.com" required />
        @error('email')
        @enderror

        @if ($coupon->coupon_quantity - $coupon->claimed != 0)
          <button class="mt-2 font-semibold rounded-sm col-span-2 p-2 mx-auto bg-slate-400 active:bg-opacity-75">Reclamar</button>
        @else
          <button class="mt-2 font-semibold rounded-sm col-span-2 p-2 mx-auto bg-slate-400" disabled>Cupones agotados</button>
        @endif
      </form>

      @foreach ($errors->all() as $error)
        <div class="relative flex items-center justify-center w-full mx-auto my-1 p-2 bg-red-400 rounded-lg" x-cloack x-data="{ open: true }" x-show="open">
          <p class="text-sm text-white">{{ $error }}</p>
          <button class="absolute right-4 text-white bg-red-300 px-2 rounded-sm" x-on:click="open = ! open">x</button>
        </div>
      @endforeach
    </div>
  </div>
@endsection
