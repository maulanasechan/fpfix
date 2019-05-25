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
            <p class="judul" style="top: 7%; font-size: 250%">Edit Profile</p>
            <a href="/home" class="logout" style="top: 80%;">Back</a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">{{ __('Logout') }}</button>
            </form>
            
            <img class="cropprof" src=<?php echo $penjual->avatar ?>>
            <form method="POST" action="{{ route('profil.edit') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" class="avatar">
                <center>
                        <input id="name" type="text" class="" name="name" required autofocus placeholder="Nama Penjual" style="top: 20%; height: 6%" value = <?php echo $penjual->nama_penjual; ?> >
                </center>

                <center>
                        <input id="email" type="text" class="" name="email" required style="top: 26.5%; height: 6%" placeholder="Email" value = <?php echo $penjual->email; ?>>
                </center>

                <center>
                        <input id="password" type="password" class="" name="password" placeholder="Old Password" style="top: 33%; height: 6%">
                </center>

                <center>
                        <input id="new_password" type="password" class="" name="new_password" placeholder="New Password" style="top: 39.5%; height: 6%">
                </center>
                <center>
                        <input id="confirm_password" type="password" class="" name="confirm_password"  placeholder="Confirm Password" style="top: 46%; height: 6%">
                </center>

                <center>
                        <input id="alamat" type="text" class="" name="alamat" required autofocus placeholder="alamat" style="top: 52.5%; height: 6%" value = <?php echo $penjual->alamat; ?>>
                </center>
                <center>
                        <input id="waktu_buka" type="text" class="" name="waktu_buka" required autofocus placeholder="Waktu Buka" style="top: 59%; height: 6%" value = <?php echo $penjual->waktu_buka; ?>>
                </center>
                <center>
                        <input id="waktu_tutup" type="text" class="" name="waktu_tutup" required autofocus placeholder="Waktu Tutup" style="top: 65.5%; height: 6%" value = <?php echo $penjual->waktu_tutup; ?>>
                </center>
                <center>
                        <input id="rekening" type="text" class="" name="rekening" required autofocus placeholder="Rekening" style="top: 72%; height: 6%" value = <?php echo $penjual->rekening; ?>>
                </center>
                <center>
                        <input id="atas_nama" type="text" class="" name="atas_nama" required autofocus placeholder="Atas Nama" style="top: 78.5%; height: 6%" value = <?php echo $penjual->atas_nama; ?>>
                </center>
                        <input type="hidden" name="id" value='{{$penjual->id}}'>
                <center>
                        <button type="submit" class="round-button-login-new" style="top: 90%; width: 5%; height: 10%">Save</button>
                </center>       
            </form>
      
</div>

