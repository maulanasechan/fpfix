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
      <img src="/img/mppl13.png" class="login-img12"> 
      <img src="/img/mppl15.png" class="login-img15">
      <p class="judul" style="top: 20%">{{$resep->nama_makanan}}</p>
      <img class="cropprof"  src="/storage/{{$resep->filename}}" style="left: 25%;">      
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
      <div class="box" style="top: {{47.5+($loop->index*6.5)}}%">
        Langkah {{$loop->index+1}} : {{$item->langkah}}
      </div>
      @endforeach
      
      <p class="rating" style="top: 81%">Rating {{$rating}} from 5</p>
      <p class="rating" style="top: 83%">Your rating : {{$userRate}}</p>
      <button class="komen" style="right: 34.5%; top : 80%;" data-toggle="modal" data-target="#myModal" >
        Rate it
      </button>
      <button class="komen" data-toggle="modal" data-target="#myModalkomen" style="background-color: #EFC113; top : 80%;">
        Comment
      </button>
      <button class="komen" data-toggle="modal" data-target="#myModalreport" style="background-color: red; right: 39.5%; top : 80%;">
        Report
      </button>

      
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
          <form method="POST" action="{{ route('resepprofil.rate') }}" enctype="multipart/form-data">
            @csrf
            <button class="komen" name="rate" value="1" style="background-color: #EFC113; left: 2%;">
              Sangat Buruk
            </button>
            <button class="komen" name="rate" value="2" style="background-color: #EFC113; left: 18.5%">
              Buruk
            </button>
            <button class="komen" name="rate" value="3" style="background-color: #EFC113; left: 27.5%">
              Lumayan
            </button>
            <button class="komen" name="rate" value="4" style="background-color: #EFC113; left: 39.5%">
              Enak
            </button>
            <button class="komen" name="rate" value="5" style="background-color: #EFC113; left: 47.5%">
              Sangat Enak
            </button>
            <input type="hidden" name="id_resep" value="{{$resep->id_resep}}">
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

          <h4 class="modal-title" style="color: #354857">Leave a Comment for This Food</h4>

        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('resepprofil.komen') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_resep" value='{{$resep->id_resep}}'>
            <input required type="text" name="komen" placeholder="Type Your Comment" style="width: 80%; height: 150%; top: 120%;">
            <button type="submit" class="round-button-login-new" style="top: 380%; width: 10%; height: 250%">Save</button>
          </form>
        </div>
      </div>  
    </div>
  </div>  

<!-- <<<<<<< HEAD:resources/views/foodprofil/index.blade.php -->

  <div class="modal fade" id="myModalreport" role="dialog" >
    <div class="modal-dialog" style="width: 50%">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%; height: 230px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" style="color: #354857">Leave a Report for This Food</h4>

        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('resepprofil.report') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_resep" value="{{$resep->id_resep}}">
            <input required type="text" name="report" placeholder="Type Why You Report This Food" style="width: 80%; height: 150%; top: 120%; ">
            <button type="submit" class="round-button-login-new" style="top: 380%; width: 10%; height: 250%">Save</button>
          </form>
        </div>
      </div>  
    </div>
  </div> 
  <!-- <p class="judul" style="top: 85%">Komentar</p> -->
  <<?php $s = 92; ?>
  @foreach ($komen as $item)
  <div class="postkomen" style="height: 20%; top: {{100+($loop->index*25)}}%">
    <?php $s = 92+($loop->index*25); ?>
    <img src="{{$item->user->avatar}}" style="position: absolute; z-index: 2; width: 10%; left: 2%; top: 10%; height: 56px;">
    <img src="/img/comment.png" style="position: absolute; z-index: 2; width: 7%; right: 5%; top: 10%;">  
    <p style="position: absolute; z-index: 2; top: 20%; left: 15%">{{$item->user->username}}</p> 
    <p style="position: absolute; z-index: 2; top: 32%; left: 15%">{{$item->created_at->format('d M Y')}}</p> 
    <div style="background-color: white; width: 96%; height: 40%; position: absolute; z-index: 2; top: 52%; left: 2%">
      <p style="color: #354857; margin-left: 1%; margin-top: 1%; font-weight: bold">{{$item->komen}}</p>
    </div>
  </div>
    <!-- <div class="postkomen" style="top:{{100+($loop->index*16)}}%">
      <img src="{{$item->user->avatar}}" style="width: 10%; height: 50px;"></br>
      {{$item->user->username}}
      <br>" {{$item->komen}} "
    </div> -->
  @endforeach
  
  
  <img src="/img/mppl12.png" class="login-img10" style="top : {{$s-10}}%">
  @switch($barang->tipe)
      @case(1)
        <a href="/foodrecipe/appetaizer" class="logout" style="top: {{$s-8}}%;">Back</a>
          @break
      @case(2)
        <a href="/foodrecipe/maincourse" class="logout" style="top: {{$s-8}}%;">Back</a>
          @break
      @case(3)
        <a href="/foodrecipe/dessert" class="logout" style="top: {{$s-8}}%;">Back</a>
          @break
      @default
        <a href="/foodrecipe" class="logout" style="top: {{$s-8}}%;">Back</a>
        @break        
  @endswitch
  <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout" style="top: {{$s}}%">{{ __('Logout') }}</button>
  </form>

</body>
</html>
