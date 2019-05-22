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
</head>
<body style="background-color: white">
<p class="judul" style="top: 21%">Market Place</p>
<img src="/img/mppl11.png" class="login-img9">  
<img src="/img/mppl12.png" class="login-img10">
<img src="/img/mppl12.png" class="login-img11"> 
<img src="/img/mppl13.png" class="login-img12"> 
<img src="/img/mppl15.png" class="login-img15"> 
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel" id="theCarousel" style="padding: 0px 100px">
        <div class="carousel-inner">
          @if(count($barang))
            <!-- {{count($barang)}} -->
            @foreach($barang as $b)
              @if($loop->first)
              <div class="item active">
              <div class="col-xs-4"><a href="foodprofil/{{$b->id_barang}}"><img src="/storage/{{$b->filename}}" class="img-responsive" style="width: 100%; height: 300px; "><p style="margin-top: 2%">{{$b->nama_barang}}</p><p style="margin-top: -2%">{{$b->penjual->nama_penjual}}</p></a></div>
             </div>
             @else
              <div class="item">
              <div class="col-xs-4"><a href="foodprofil/{{$b->id_barang}}"><img src="/storage/{{$b->filename}}" class="img-responsive" style="width: 100%; height: 300px; "><p style="margin-top: 2%">{{$b->nama_barang}}</p><p style="margin-top: -2%">{{$b->penjual->nama_penjual}}</p></a></div>
             </div>
             @endif
            @endforeach
            
          @else
            <p class="judul">Tidak Ada Data</p>
          @endif
          </div>       
          <!--  Example item end -->
        
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div>
<?php
    $avatar = Auth::user()->avatar;
?>
<img class="crop" src=<?php echo $avatar ?>>
<a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
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
</script>
</body>
</html>