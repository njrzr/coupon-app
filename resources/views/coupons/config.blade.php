@extends('index')

@section('content')
  @if (session('success'))
    <div class="relative flex items-center justify-center w-10/12 mx-auto mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">{{ session('success') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  <form class="relative flex flex-wrap w-11/12 md:w-10/12 mx-auto my-2 p-4 rounded-lg bg-slate-300" action="/config-update" method="POST" enctype="multipart/form-data">
    @csrf
    <p class="w-full text-center mb-4 text-2xl md:text-4xl">Actualizar Configuracion</p>
    <label class="md:w-3/12 mt-1 p-1 font-semibold text-xl md:text-2xl" for="discount">Discount</label>
    <input class="w-full md:w-9/12 mb-1 p-1 text-base md:text-xl rounded-sm" id="discount" name="discount" type="text" placeholder="ej: H&M" value="{{ $config->discount }}" required />

        <label class="md:w-3/12 mt-1 p-1 font-semibold text-xl md:text-2xl" for="max_coupons">Max Coupons</label>
    <input class="w-full md:w-9/12 mb-1 p-1 text-base md:text-xl rounded-sm" id="max_coupons" name="max_coupons" type="text" placeholder="ej: H&M" value="{{ $config->max_coupons }}" required />


    <button class="w-full text-white bg-slate-400 active:bg-slate-500 mt-1 p-1 font-semibold text-xl md:text-2xl cursor-pointer rounded-sm">
      Actualizar
    </button>
  </form>

  @foreach ($errors->all() as $error)
    <div class="relative flex items-center justify-center w-10/12 mx-auto my-1 p-2 bg-red-400 rounded-lg" x-data="{ open: true }" x-show="open">
      <p class="text-sm text-white">{{ $error }}</p>
      <button class="absolute right-4 text-white bg-red-300 px-2 rounded-sm" x-on:click="open = ! open">x</button>
    </div>
  @endforeach
@endsection
