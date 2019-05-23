<!DOCTYPE html>
<html lang="en">
<head>
  <title>Detail Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    html, body {
        background-color: white;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100%;
        margin: 0;
    }

    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: white;
      opacity: 0.7; /* Firefox */
    }
  </style>
</head>
{{-- @if (session('success'))
    <div class="alert alert-success col-sm-12">
        {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger col-sm-12">
        {{ session('error') }}
    </div>
  @endif --}}
<body>    
  <img src="/img/mppl11.png" class="login-img9">        
  <img src="/img/mppl12.png" class="login-img11"> 
  <img src="/img/mppl13.png" class="login-img12"> 
  <img src="/img/mppl15.png" class="login-img15">
  <p class="judul" style="top: 20%">{{$order->barang_dijual->nama_barang}}</p>
  <img class="cropprof"  src="/img/user.jpg" style="left: 25%;">      
  <div class="box">
    Nama Penjual : {{$order->barang_dijual->penjual->nama_penjual}}
  </div>
  <div class="box" style="top: 41%">
    Harga : {{$order->barang_dijual->harga}}
  </div>
    <div class="box" style="top: 48%">
    Jumlah :  {{$order->amount}}
  </div>
  <div class="box" style="top: 55%">
    Total Harga : {{$order->amount*$order->barang_dijual->harga}}
  </div>
  <p class="rating" style="top: 62%">Rating {{$rating}} from 5</p>
  <button class="komen" data-toggle="modal" data-target="#myModalreport" style="background-color: red; top : 62%;">
    Report
  </button>
  <form id="logout-form" action="{{ route('profil.uploadBukti') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label style="color: #AD9336; font-weight: bold; position: absolute; z-index: 2; top: 74%; left: 42%">Bukti Transaksi</label></br>
      
      @if (!isset($order->bukti))
        <input type="file" name="bukti_pembayaran" style="top: 78%; left: 42% ; position: absolute; z-index: 2" required>
        <input type="hidden" name="id_order" value="{{$order->id}}">
        <button type="submit" class="home-login-button" style="width: 7%; height:5%; top: 76%; left: 65%">{{ __('Upload') }}</button>
      @else
        <img src="{{$order->bukti}}" style="height: 25%; top: 78%; position: absolute; left: 45%; margin-bottom: 5%;">
      @endif
  </form>
  
  <?php
      $avatar = Auth::user()->avatar;
  ?>
  <img class="crop" style="width: 98px; height: 98px; object-fit: cover" src=<?php echo $avatar ?>>
  <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
  <!-- Trigger the modal with a button -->

 

 



  <div class="modal fade" id="myModalreport" role="dialog" >
    <div class="modal-dialog" style="width: 50%">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%; height: 230px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" style="color: #354857">Leave a Report for This Food</h4>

        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('foodprofil.report') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_barang" value="{{$order->barang_dijual->id_barang}}">
            <input required type="text" name="report" placeholder="Type Why You Report This Food" style="width: 80%; height: 150%; top: 120%; ">
            <button type="submit" class="round-button-login-new" style="top: 380%; width: 10%; height: 250%">Save</button>
          </form>
        </div>
      </div>  
    </div>
  </div> 
  <!-- <p class="judul" style="top: 85%">Komentar</p> -->
  <?php $s = 92; ?>
  
  
  <img src="/img/mppl12.png" class="login-img10" style="top : {{$s-10}}%">
  <a href="/profil" class="logout" style="top: {{$s-8}}%;">Back</a>
  <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout" style="top: {{$s}}%">{{ __('Logout') }}</button>
  </form>

</body>
</html>
