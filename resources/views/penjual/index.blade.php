<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seller page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <style type="text/css">
            .logout {
                top: 3px;
            }
            .chat {
                top: 3px;
                right: 62px;
            }
        </style>
    </head>
    <body style="background-color: white">
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11"> 
        <img src="/img/mppl13.png" class="login-img12"> 
        <img src="/img/mppl14.png" class="login-img13">
        <img src="/img/mppl15.png" class="login-img14">
        <img src="/img/mppl15.png" class="login-img15">     
        <a href="{{ url('penjual/product') }}" class="home-link" style="word-spacing: 50px; ">List Product</a>
        <a href="{{ url('penjual/order') }}" class="home-link" style="left: 50%; top: 60%; word-spacing: 50px;">List Order</a>
        <?php
            $avatar = Auth::guard('penjual')->user()->avatar;
        ?>
        <img class="crop" style="width: 98px; height: 98px; object-fit: cover" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
        <form id="logout-form" action="{{ route('penjual.logout') }}" method="POST">
            @csrf
            <button type="submit" class="home-login-button">{{ __('Logout') }}</button>
        </form>
    </body>
</html>

