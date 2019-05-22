<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Page</title>

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
        <img src="/img/mppl13.png" class="login-img12" style="left: 7%; top: 6%; height: 7%"> 
        <img src="/img/mppl14.png" class="login-img13" style="left: 30%; height: 4%; top: 25%">
        <img src="/img/mppl15.png" class="login-img14" style="left: 35%; height: 4%; top: 25%"> 
        <img src="/img/mppl14.png" class="login-img13" style="left: 40%; height: 4%; top: 40%">
        <img src="/img/mppl15.png" class="login-img14" style="left: 45%; height: 4%; top: 40%"> 
        <img src="/img/mppl14.png" class="login-img13" style="left: 50%; height: 4%; top: 55%">
        <img src="/img/mppl15.png" class="login-img14" style="left: 55%; height: 4%; top: 55%"> 
        <img src="/img/mppl14.png" class="login-img13" style="left: 60%; height: 4%; top: 70%">
        <img src="/img/mppl15.png" class="login-img14" style="left: 65%; height: 4%; top: 70%">
        <p  class="home-link" style="font-size: 180%; left: 2%; top: 0%; z-index: 2; position: absolute; ">Admin</p>
        <a href="{{ route('admin.marketplace') }}" class="home-link" style="font-size: 300%; left: 10%; top: 22%; ">Market Place</a>
        <a href="{{ route('admin.foodrecipe') }}" class="home-link" style="font-size: 300%; left: 40%; top: 22%">Food Recipe</a>
        <a href="{{ route('admin.report') }}" class="home-link" style="font-size: 300%; left: 28%; top: 37%">Report</a>
        <a href="{{ route('admin.transaksi') }}" class="home-link" style="font-size: 300%; left: 50%; top: 37%">Transaksi</a>
        <a href="{{ route('admin.rating') }}" class="home-link" style="font-size: 300%; left: 39%; top: 52%">Rating</a>
        <a href="{{ route('admin.komentar') }}" class="home-link" style="font-size: 300%; left: 59%; top: 52%">Komentar</a>
        <a href="{{ route('admin.user') }}" class="home-link" style="font-size: 300%; left: 51%; top: 67%">User</a>
        <a href="{{ route('admin.penjual') }}" class="home-link" style="font-size: 300%; left: 70%; top: 67%">Penjual</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="home-login-button">{{ __('Logout') }}</button>
        </form>
    </body>
</html>

