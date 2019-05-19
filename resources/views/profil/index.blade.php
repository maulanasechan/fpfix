<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <style>
          .avatar{
            top: 63%;
            left: 8%;
            z-index: 2;
            position: absolute;
          }
        </style>
    </head>
    <body style="background-color: white">
            <img src="/img/mppl11.png" class="login-img9">  
            <img src="/img/mppl12.png" class="login-img10">
            <img src="/img/mppl12.png" class="login-img11"> 
            <img src="/img/mppl13.png" class="login-img12"> 
            <p class="judul" style="">Edit Profile</p>
            <a href="/home" class="logout" style="top: 80%;">Back</a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">{{ __('Logout') }}</button>
            </form>
            
            <img class="cropprof" src=<?php echo $user->avatar ?>>
            <form method="POST" action="{{ route('profil.edit') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" class="avatar">
                <center>
                        <input id="name" type="text" class="" name="name" required autofocus placeholder="Username" style="top: 38%; height: 6%" value = <?php echo $user->username; ?> >
                </center>

                <center>
                        <input id="email" type="text" class="" name="email" required style="top: 45%; height: 6%" placeholder="Email" value = <?php echo $user->email; ?>>
                </center>

                <center>
                        <input id="password" type="password" class="" name="password" required placeholder="Old Password" style="top: 52%; height: 6%">
                </center>

                <center>
                        <input id="new_password" type="password" class="" name="new_password" placeholder="New Password" style="top: 59%; height: 6%">
                </center>
                <center>
                        <input id="confirm_password" type="password" class="" name="confirm_password"  placeholder="Confirm Password" style="top: 66%; height: 6%">
                </center>

                <center>
                        <input id="alamat" type="text" class="" name="alamat" required autofocus placeholder="alamat" style="top: 73%; height: 6%" value = <?php echo $user->alamat; ?>>
                </center>
                        <input type="hidden" name="id" value='{{$user->id}}'>
                <center>
                        <button type="submit" class="round-button-login-new" style="top: 87.2%; width: 5%; height: 10%">Save</button>
                </center>       
            </form>
      
</div>

