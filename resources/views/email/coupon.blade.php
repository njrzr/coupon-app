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
        font-family: 'Helvetica'
      }

      .container {
        position: relative;
        background: url('coupon.webp') no-repeat;
        background-size: cover;
        background-position: center center;
        display: flex;
        width: 800px;
        height: 400px;
        margin: auto;
        overflow: hidden;
      }

      .code {
        position: absolute;
        width: 300px;
        padding-right: 30px;
        left: 140px;
        top:60px;

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
        font-size:28px;
        color: #c36332;
        left: 180px;
        top: 55px;
      }

      .store {
        position: absolute;
        width: 300px;
        left: 430px;
        padding-left: 80px;
        top:50px;
      }

      .coupon {
        transform: rotate(-90deg);
        transform-origin: top left;
        text-transform: uppercase;
        left: 63px;
        top: 130px;
        position:absolute;
        font-size: 1.3rem;
        font-weight: 600;
      }

      .discount {
        position: absolute;
        font-size: 7rem;
        left: 82px;
        top: 20px;
        font-weight: 600;
      }

      .discount, .coupon {
        color: #ef3c37;
        font-weight: bolder;
      }

      .store-name, .weblink {
        position: relative;
        font-size: 38px;
        left: 0px;
        top: 140px;
        font-weight: bold;
        color: #c36332;
      }

      .name {
        position: relative;
        font-size: 38px;
        left: 0px;
        top: 140px;
        font-style: italic;
        color: #c36332;
      }

       .weblink{
        font-size: 28px;
        margin-left:-50px;
        margin-top:10px;
       }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="code">
        <img class="qr-image" src="qr-code.png" alt="Codigo QR">
        <p class="code-text">{{ $user->id }}</p>
      </div>

      <div class="store">
        <p class="coupon">cupon</p>
        <p class="discount">{{ $config->discount }}€</p>
        <p class="store-name">{{ $user->store_name }}</p>
        <p class="name">{{ $user->name }}</p>
        <p class="weblink">www.paradaonline.cat</p>
      </div>
    </div>
  </body>
</html>
