<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>List of Transaction</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            
        </style>
    </head>
    <body style="background-color: white">
        <p class="judul" style="top: 23%;">List of Transaction</p>
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11" style="top: 55%;"> 
        <img src="/img/mppl13.png" class="login-img12"> 
        <img src="/img/mppl15.png" class="login-img15"> 
        
        <div class="container" style="top: 40%; width: 60%">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Bukti</th>
                <th>Resi</th>
                <th>Created At</th>
                <th>Menu</th>
              </tr>
            </thead>
            <tbody>
              <tr class="success">
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
                <td>f</td>
                <td><button class='btn btn-sm btn-danger delete-btn' type='submit'>Delete </button></td>
              </tr>         
            </tbody>
          </table>
        </div>
        <?php
            $avatar = Auth::user()->avatar;
        ?>
        <img class="crop" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
        <a href="/marketplace/create" class="logout" style="top: 80%;">Back</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">{{ __('Logout') }}</button>
        </form>
    </body>
</html>

