<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body style="background-color: white">
    <a href="/foodrecipe">
        <p class="judul" style="top: 21%; z-index: 1010;">Main Course</p>

    </a>
    <img src="/img/mppl11.png" class="login-img9">
    <img src="/img/mppl12.png" class="login-img10">
    <img src="/img/mppl12.png" class="login-img11">
    <a href="/home">
        <img src="/img/mppl13.png" class="login-img12">
    </a>
    <img src="/img/mppl15.png" class="login-img15">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-content">


                @if (count($resep) > 0)
                <div class="owl-carousel owl-theme">
                    @foreach ($resep as $b)
                    <div class="item">

                        <a href="resepprofil/{{$b->id_resep}}" class="mkt-list">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 1em 2em 1em 1em;">
                                    <div class="mkt-image">
                                        <img src="/storage/{{$b->filename}}" class="img-responsive mkt-image">
                                    </div>
                                    <h4 class="text-center" style="margin-top: 2%">{{$b->nama_makanan}}</h4>
                                    <p class="text-center" style="margin-top: -2%">{{$b->user->username}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div class="custom-nav owl-nav"></div>
                    </div>
                </div>
                @else
                <p class="judul">Tidak Ada Data</p>
                @endif

                {{-- <div class="carousel slide multi-item-carousel" id="theCarousel">
        <div class="carousel-inner">
          @foreach( $resep as $item)
          @if ($loop->first)
          <div class="item active">
            <div class="col-xs-4"><a href="#1"><img src="/storage/{{$item->filename}}" class="img-responsive"
                style="width: 70%"><p style="margin-top: 2%">{{$item->nama_makanan}}</p>
                <p style="margin-top: -2%">{{$item->user->username}}</p></a>
            </div>
        </div>
        @else
        <div class="item">
            <div class="col-xs-4"><a href="#1"><img src="/storage/{{$item->filename}}" class="img-responsive"
                        style="width: 70%">
                    <p style="margin-top: 2%">{{$item->nama_makanan}}</p>
                    <p style="margin-top: -2%">{{$item->user->username}}</p>
                </a></div>
        </div>
        @endif
        @endforeach


        <!-- add  more items here -->
        <!-- Example item start:  -->

        <!--  Example item end -->
    </div>
    <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i
            class="glyphicon glyphicon-chevron-left"></i></a>
    <a class="right carousel-control" href="#theCarousel" data-slide="next"><i
            class="glyphicon glyphicon-chevron-right"></i></a>
    </div> --}}
    </div>
    </div>
    </div>
    <?php
    $avatar = Auth::user()->avatar;
?>
    <img class="crop" src=<?php echo $avatar ?>>
    <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
    <a href="/foodrecipe" class="logout" style="top: 80%;">Back</a>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">{{ __('Logout') }}</button>
    </form>

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
        // Instantiate the Bootstrap carousel
        $('.multi-item-carousel').carousel({
            interval: false
        });

        // for every slide in carousel, copy the next slide's item in the slide.
        // Do the same for the next, next item.
        $('.multi-item-carousel .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length > 0) {
                next.next().children(':first-child').clone().appendTo($(this));
            } else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });


        $('.owl-carousel').owlCarousel({
            center: true,
            loop: true,
            margin: 30,
            navText: [
                '<i class="fas fa-angle-left"></i>',
                '<i class="fas fa-angle-right"></i>'
            ],
            navContainer: '.main-content .custom-nav',
            stagePadding: 50,
            merge: true,
      
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3,
                    mergeFit: true
                },
                1000: {
                    items: 3,
                    mergeFit: true
                }
            }
        })

    </script>
</body>

</html>
