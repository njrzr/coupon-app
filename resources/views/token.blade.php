@extends('index')

@section('content')
  <p class="relative w-full my-4 text-4xl text-center">Generar token</p>

  <form class="relative flex items-center justify-center my-2 w-full" action="/create-token" method="POST">
    @csrf
    @if ($created)
      <button class="bg-green-400 hover:bg-green-500 p-2 text-center text-white text-xl rounded-lg">Recrear Token</button>
    @else
      <button class="bg-green-400 hover:bg-green-500 p-2 text-center text-white text-xl rounded-lg">Crear Token</button>
    @endif
  </form>

  @if (session('created'))
    <div class="relative flex flex-col items-center justify-center w-full mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">Token creado, copialo y guardalo.</p>
      <p class="text-center text-xl text-white font-semibold">{{ session('token') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif

  @if (session('updated'))
    <div class="relative flex flex-col items-center justify-center w-full mt-2 p-2 bg-blue-400 rounded-lg" x-data="{ open: {{ session('open') }} }" x-show="open">
      <p class="text-center text-xl text-white font-semibold">Token regenerado, copialo y guardalo.</p>
      <p class="text-center text-xl text-white font-semibold">{{ session('token') }}</p>
      <button class="absolute right-4 text-white bg-blue-300 px-2 rounded-sm" x-on:click="open = !open">x</button>
    </div>
  @endif
@endsection
