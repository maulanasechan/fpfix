<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resep Profil</title>
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
      <img src="/img/mppl12.png" class="login-img10"> 
      <img src="/img/mppl13.png" class="login-img12"> 
      <img src="/img/mppl15.png" class="login-img15">
      <p class="judul" style="top: 20%">{{$resep->nama_makanan}}</p>
      <img class="cropprof"  src="/storage/{{$resep->filename}}" style="left: 22%; top:30%; width: 250px; height: 250px; object-fit: cover">      
      <div class="box" style="top: 28%;">
        Bahan : {{$resep->bahan}}
      </div>
      <div class="box" style="top: 34.5%">
        Alat :  {{$resep->peralatan}}
      </div>
      <div class="box" style="top: 41%">
        Deskripsi : {{$resep->deskripsi}}
      </div>
      @foreach ($langkah as $item)
      <div class="box" style="top: {{47.5+($loop->index*6.5)}}%; ">
        Langkah {{$loop->index+1}} : {{$item->langkah}}
      </div>
      @endforeach
      
      <p class="rating" style="top: 82%">Rating {{$rating}} from 5</p>
      <a href="{{ route('resepprofil.updateresep') }}"><button class="komen" style="top : 82%; right: 33%;">
        Update
      </button></a>
      <a href="{{ route('resepprofil.deleteresep') }}">
      <button class="komen" data-toggle="modal" data-target="#myModalreport" style="background-color: red;  top : 82%;">
        Delete
      </button>
      </a>
      
      <?php
          $avatar = Auth::user()->avatar;
      ?>
      <img class="crop" style="width: 98px; height: 98px; object-fit: cover" src=<?php echo $avatar ?>>
      <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
<a href="/profil" class="logout" style="top: 80%;">Back</a>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
</body>
</html>
