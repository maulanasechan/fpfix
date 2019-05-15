<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Market Place</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
        <!-- Styles -->
          <link href="{{ asset('css/style.css') }}" rel="stylesheet">  
          <style type="text/css">
             .avatar{
                z-index: 2;
                position: absolute;
                left: 38.5%;
                top: 71%;
                transform: translate(-50%, -50%);
             }
          </style>
    </head>
    <body style="background-color: white">
        <?php 
            $username = Auth::user()->username; 
            $email = Auth::user()->email; 
            $alamat = Auth::user()->alamat; 
            $avatar = Auth::user()->avatar;
            $id = Auth::user()->id;
          ?>
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11"> 
        <img src="/img/mppl13.png" class="login-img12">
        <img src="/img/mppl15.png" class="login-img15"> 
        <a href="/foodrecipe" class="logout" style="top: 80%;">Back</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">{{ __('Logout') }}</button>
        </form>
        
        <img class="crop" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
        <p class="judul">Add Recipe</p>
        <form method="POST" action="{{ route('foodrecipe.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nama_makanan" placeholder="Nama Makanan" style="top: 40%; height: 7%">
            <input type="hidden" name="id_user" value= <?php echo $id; ?> >
            <select name="tipe" style="top: 48%; height: 7%">
              <option value="1">Appetaizer</option>
              <option value="2">Main Course</option>
              <option value="3">Dessert</option>
            </select>
            <input type="text" name="bahan" placeholder="Bahan" style="top: 56%; height: 7%">
            <input type="text" name="alat" placeholder="Alat" style="top: 64%; height: 7%">
            <input type="file" name="cover" class="avatar" style="top: 72%">
            <center>
                <button type="submit" class="round-button-login-new" style="top: 86%; width: 5%; height: 10%">Post</button>
            </center>
        </form>
    </body>
</html>

