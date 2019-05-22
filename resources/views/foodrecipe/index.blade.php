<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food Recipe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body style="background-color: white">
        <p class="judul">Food Recipe</p>
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11"> 
        <img src="/img/mppl13.png" class="login-img12"> 
        <img src="/img/mppl15.png" class="login-img15"> 
        
        <a href="{{ route('foodrecipe.appetaizer') }}"><img class='top-right' src="{{ asset('img/appetaizer.png') }}" style="width: auto; height: 20%; right: 64%; top: 40%;"></a>
        <a href="{{ route('foodrecipe.maincourse') }}"><img class='top-right' src="{{ asset('img/maincourse.png') }}" style="width: auto; height: 20%; right: 43%; top: 40%;"></a>
        <a href="{{ route('foodrecipe.dessert') }}"><img class='top-right' src="{{ asset('img/dessert.png') }}" style="width: auto; height: 20%; right: 22%;
            top: 40%;"></a>
        <center><a href="/home" class="round-button-login-new" style="font-size: 100%; line-height: 400%">Back</a></center>
        <?php
            $avatar = Auth::user()->avatar;
        ?>
        <img class="crop" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
        <a href="/foodrecipe/create" class="logout" style="top: 79%;">Add</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">{{ __('Logout') }}</button>
        </form>
    </body>
</html>

