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
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11"> 
        <img src="/img/mppl13.png" class="login-img12">
        <a href="/foodrecipe/appetaizer" class="logout" style="top: 80%;">Back</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">{{ __('Logout') }}</button>
        </form>
        
        <p class="judul">Add Product</p>
        <form method="POST" action="{{ route('marketplace.store') }}" enctype="multipart/form-data">
            @csrf
            <?php 
                $id = 1;  
            ?>
            <input type="text" name="nama_barang" placeholder="Nama Barang" style="top: 40%; height: 7%">
            <input type="hidden" name="id_penjual" value= "{{Auth::guard('penjual')->user()->id}}">
            <input type="text" name="deskripsi" placeholder="Deskripsi Barang" style="top: 48%; height: 7%">
            <select name="tipe" style="top: 56%; height: 7%">
              <option value="1">Appetaizer</option>
              <option value="2">Main Course</option>
              <option value="3">Dessert</option>
            </select>
            <input type="number" name="harga" placeholder="Harga" style="top: 64%; height: 7%">
            <input type="file" name="cover" class="avatar" style="top: 72%">
            <center>
                <button type="submit" class="round-button-login-new" style="top: 86%; width: 5%; height: 10%">Post</button>
            </center>
        </form>
    </body>
</html>

