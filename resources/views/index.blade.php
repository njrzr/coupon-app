<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cupones</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
  <body class="relative box-border bg-slate-200 font-noto">
    @if (Auth::check())
      @include('navbar')
    @endif

    @include('navbar')

    @yield('content')

    @if (url()->current() == url('/admin'))
      <p class="relative w-8/12 mx-auto my-12 uppercase font-bold text-center text-5xl">bienvenido</p>
      <p class="relative w-8/12 mx-auto my-12 uppercase font-bold text-center text-2xl">elige cualquiera de las opciones arriba a la derecha</p>
    @endif
  </body>
</html>
