<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body class="relative w-full h-screen p-4">
    <div class="relative flex flex-col md:flex-row items-center justify-center w-full md:w-10/12 h-full mx-auto p-2 bg-coupon bg-cover md:bg-contain text-green-700">
      <div class="relative flex flex-col items-center justify-center md:items-end md:justify-end w-full md:w-1/2">
        <img class="relative bg-white object-contain w-64 h-64 rounded-lg" src="qr-code.png" alt="Codigo QR">
        <p class="relative transform md:-translate-x-12 text-4xl font-bold">{{ $store->code }}</p>
      </div>

      <div class="relative mt-8 md:mt-0 p-2 w-full md:w-1/2">
        <p class="relative text-3xl -rotate-90 transform origin-top-left uppercase font-bold top-24">cupon</p>
        <p class="relative text-9xl font-bold transform translate-x-8 -translate-y-14">{{ $store->coupon_discount }}€</p>
        <p class="relative text-3xl md:text-5xl italic font-bold transform -translate-y-14">{{ $user->username }}</p>
        <p class="relative text-3xl md:text-5xl italic font-bold transform -translate-y-12">{{ $store->store }}</p>
        <p class="relative text-3xl md:text-5xl italic font-bold transform -translate-y-12">paradaonline.cat</p>
      </div>
    </div>
  </body>
</html>
