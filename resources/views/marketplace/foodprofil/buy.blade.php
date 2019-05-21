<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Buying page</title>

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
        <img src="/img/mppl13.png" class="login-img9" style="top: 40%; left: 8%; height: 15%">  
        <div style="top: 30%; z-index: 2; position: absolute; left: 38%">
        <p style="color: #354857; font-weight: bold; margin-bottom: 5%">Silahkan membayar uang sebesar <i style="color: #AD9336;">Rp. {{$order->amount*$order->barang_dijual->harga}}</i> dengan cara mentransfer ke rekening berikut :</p>
        <p style="color: #AD9336; font-weight: bold;">No.rek : {{$order->barang_dijual->penjual->rekening}}</p>
        <p style="color: #AD9336; font-weight: bold;">Atas Nama : {{$order->barang_dijual->penjual->atas_nama}}</p>
        <p style="color: #354857; font-weight: bold; margin-top: 5%">Kemudian foto bukti transfer dan upload foto pada laman ini.</p>
        <p style="color: #354857; ">Anda dapat mengakses halaman ini melalui halaman profile anda</p>
        <p style="color: #354857; font-weight: bold;">Apabila barang tidak diterima sampai 3 hari silahkan report penjual.</p>
        <p style="color: #354857; font-weight: bold; margin-bottom: 5%">Penjual yang di report akan dikenakan sanksi dan diwajibkan mengembalikan uang ke pelanggan.</p>
        <form id="logout-form" action="{{ route('uploadBukti') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label style="color: #AD9336; font-weight: bold;">Bukti Transaksi</label></br>
            <input type="file" name="bukti_pembayaran" style="margin-top: 1.5%" required>
            <input type="hidden" name="id_order" value="{{$order->id}}">
            <button type="submit" class="home-login-button" style="width: 13%; height:12%; top: 105%">{{ __('Upload') }}</button>
        </form>
        </div>
        <!-- <?php
            $avatar = Auth::user()->avatar;
        ?>
        <img class="crop" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a> -->
    </body>
</html>

