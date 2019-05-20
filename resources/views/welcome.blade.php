<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Foodies</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>

        <img src="/img/mppl4.png" class="login-img6" style="top: 90%;">

        <div class="box" style="top: 89%; border: none; left: 7%; width: 11%; text-align: center;"><a href="/penjual/login" class="userlogin" >Seller Login</a></div>
        <img src="/img/mppl1.png" class="login-img1">
        <img src="/img/mppl3.png" class="login-img2">
        <img src="/img/mppl4.png" class="login-img3">
        <img src="/img/mppl6.png" class="login-img4">
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="login-link">Register</a>
        @endif
        <center><a href="{{ route('login') }}" class="round-button-login">Login</a></center>
    </body>
</html>
