<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      .container {
        position: relative;
        background: url('coupon.webp') no-repeat;
        background-size: cover;
        display: flex;
        width: 600px;
        height: 300px;
        margin: auto;
        overflow: hidden;
      }

      .code {
        position: absolute;
        width: 300px;
        padding-right: 10px;
        left: 0;
      }

      .qr-image {
        position: relative;
        width: 150px;
        height: 150px;
        left: 150px;
        top: 50px;
        background: #ffffff;
        border-radius: 10px;
      }

      .code-text {
        position: relative;
        font-weight: 600;
        color: #15803d;
        left: 200px;
        top: 60px;
      }

      .store {
        position: absolute;
        width: 300px;
        left: 300px;
        padding-left: 10px;
      }

      .coupon {
        position: absolute;
        transform: rotate(-90deg);
        transform-origin: top left;
        text-transform: uppercase;
        left: 0;
        top: 120px;
        font-size: 1.2rem;
        font-weight: 600;
        color: #15803d;
      }

      .discount {
        position: absolute;
        font-size: 5rem;
        left: 22px;
        top: 35px;
        font-weight: 600;
        color: #15803d;
      }

      .username, .store-name, .weblink {
        position: relative;
        font-size: 24px;
        left: 0px;
        top: 130px;
        font-weight: 600;
        font-style: italic;
        color: #15803d;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="code">
        <img class="qr-image" src="qr-code.png" alt="Codigo QR">
        <p class="code-text">{{ $store->code }}</p>
      </div>

      <div class="store">
        <p class="coupon">cupon</p>
        <p class="discount">{{ $store->coupon_discount }}€</p>
        <p class="username">{{ $user->username }}</p>
        <p class="store-name">{{ $store->store }}</p>
        <p class="weblink">www.paradaonline.cat</p>
      </div>
    </div>
  </body>
</html>
