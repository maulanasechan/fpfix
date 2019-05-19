<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <img src="/img/mppl11.png" class="login-img9">  
      <img src="/img/mppl12.png" class="login-img10">
      <img src="/img/mppl12.png" class="login-img11"> 
      <img src="/img/mppl13.png" class="login-img12"> 
      <img src="/img/mppl15.png" class="login-img15">
      <p class="judul" style="top: 20%">Pecel Bu Nanik</p>
      <img class="cropprof"  src="/img/Resep-pecel.jpg" style="left: 30%">      
      <div class="box">
        Harga :
      </div>
      <div class="box" style="top: 41%">
        Deskripsi :
      </div>
      <div class="box" style="top: 48%">
        Nama Penjual :
      </div>
      <p class="rating" style="top: 56%">Rating 8 from 10</p>
      <button class="komen" style="right: 35%" data-toggle="modal" data-target="#myModal">
        Rate it
      </button>
      <button class="komen"  data-toggle="modal" data-target="#myModalkomen" style="background-color: #EFC113;">
        Comment
      </button>
      <center><a href="/home" class="round-button-login-new" style="font-size: 100%; line-height: 400%">Buy</a></center>
      <a href="/foodrecipe" class="logout" style="top: 79%;">Back</a>
      <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">{{ __('Logout') }}</button>
      </form>
      <?php
          $avatar = Auth::user()->avatar;
      ?>
      <img class="crop" src=<?php echo $avatar ?>>
      <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog" style="width: 50%">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%; height: 140px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #354857">Rate This Food</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('marketplace.store') }}" enctype="multipart/form-data">
            @csrf
            <button class="komen" value="1" style="background-color: #EFC113; left: 2%;">
              Sangat Buruk
            </button>
            <button class="komen" value="1" style="background-color: #EFC113; left: 18.5%">
              Buruk
            </button>
            <button class="komen" value="1" style="background-color: #EFC113; left: 27.5%">
              Lumayan
            </button>
            <button class="komen" value="1" style="background-color: #EFC113; left: 39.5%">
              Enak
            </button>
            <button class="komen" value="1" style="background-color: #EFC113; left: 47.5%">
              Sangat Enak
            </button>
          </form>
        </div>
      </div>  
    </div>
  </div>

  <div class="modal fade" id="myModalkomen" role="dialog" >
    <div class="modal-dialog" style="width: 50%">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%; height: 230px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #354857">Rate This Food</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('marketplace.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="komen" placeholder="Type Your Comment" style="width: 80%; height: 150%; top: 120%;">
            <button type="submit" class="round-button-login-new" style="top: 380%; width: 10%; height: 250%">Save</button>
          </form>
        </div>
      </div>  
    </div>
  </div>  

</body>
</html>
