<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Coupons Menu</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body class="relative box-border bg-slate-200 font-rosario">
    @include('navbar')
    @yield('content')
  </body>
</html>
