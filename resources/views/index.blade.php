<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cupones</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/4cd87bf5ed.js" crossorigin="anonymous"></script>
  </head>
  <body class="relative flex box-border bg-slate-200 font-noto">
    @include('navbar')

    <div class="relative flex flex-col w-full pl-20 pr-2">
      @yield('content')

      @if (url()->current() == url('/'))
        <p class="relative w-full my-4 uppercase font-bold text-center text-5xl">bienvenido</p>
        <p class="relative w-full my-4 uppercase font-bold text-center text-2xl">elige cualquiera de las opciones a la izquierda</p>
      @endif
    </div>
  </body>
</html>
