<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homepage</title>

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
        <a href="{{ url('marketplace') }}" class="home-link" style=" ">Market Place</a>
        <a href="{{ url('foodrecipe') }}" class="home-link" style="left: 50%; top: 60%">Food Recipe</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="home-login-button">{{ __('Logout') }}</button>
        </form>
        <?php
            $avatar = Auth::user()->avatar;
        ?>
        <img class="crop" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
    </body>
</html>

