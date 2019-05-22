<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
      .cropprof{
        top: 15%;
        z-index: 2;
        position: absolute;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
      }
  </style>
</head>
<body style="background-color: white">
<?php
    $avatar = Auth::user()->avatar;
    $username = Auth::user()->username;
?>
<img class="cropprof" src=<?php echo $user->avatar ?>>

<img src="/img/mppl11.png" class="login-img9" style="height: 25%">  
<img src="/img/mppl12.png" class="login-img10" style="height: 4%">
<img src="/img/mppl12.png" class="login-img11"> 
<img src="/img/mppl13.png" class="login-img12"> 
{{-- <div class="container" style="position: absolute; top: 70%">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel" id="theCarousel" style="padding: 0 100px">
        <div class="carousel-inner">
          @if(count($barang))
            
            @foreach($barang as $b)
              @if($loop->first)
              <div class="item active">
              <div class="col-xs-4"><a href="#1"><img src="/storage/{{$b->filename}}" class="img-responsive" style="width: 50%; height: 150px; "><p style="margin-top: 2%">{{$b->nama_makanan}}</p></div>
             </div>
             @else
              <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="/storage/{{$b->filename}}" class="img-responsive" style="width: 50%; height: 150px; "><p style="margin-top: 2%">{{$b->nama_makanan}}</p></div>
             </div>
             @endif
            @endforeach
            
          @else
            <div class="item active">
              <div class="col-xs-4" style="padding: 5%;"><p style="margin-top: 2%">Anda Tidak Memiliki Resep</p></div>
             </div>
          @endif
          </div>       
          <!--  Example item end -->
        
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div> --}}
<p  class="home-link2" style="top: 32%; font-size: 120%;left: 50%; margin-right: -50%; transform: translate(-50%, -50%);"><?php echo $username; ?></p>
<p  class="home-link2" style="top: 36%; font-size: 120%;left: 50%; margin-right: -50%; transform: translate(-50%, -50%);"><?php echo $user->email; ?></p>
<p  class="home-link2" style="top: 40%; font-size: 120%;left: 50%; margin-right: -50%; transform: translate(-50%, -50%);"><?php echo $user->alamat; ?></p>

<a href="/profil/edit" class="home-link" style="top: 47%; font-size: 150%;left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">Edit Profile</a>

<a href="/profil/list" class="home-link" style="top: 52%; font-size: 150%;left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">List Order</a>
<a href="{{route('home')}}" class="logout" style="top: 81%;">Back</a>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
<script type="text/javascript">
  // Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</body>
</html>