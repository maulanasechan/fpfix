<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food Recipe | Create</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
        <!-- Styles -->
          <link href="{{ asset('css/style.css') }}" rel="stylesheet">  
          <style type="text/css">
            body {
                background-color: #fff;
                overflow: hidden;
            }

             .avatar{
                z-index: 2;
                position: absolute;
                left: 38.5%;
                top: 71%;
                transform: translate(-50%, -50%);
             }

             form.inputForm {
                 position: absolute;
                 top: 20%;
                 left: 50%;
                 transform: translateX(-50%);
                 width: 100%;
                 margin-bottom: 30vh;
                 overflow-y: scroll;
                 padding: 3em 0;
             }

             form.inputForm input, form.inputForm select{
                 display: block;
                 position: relative;
                 margin: .25em;
             }

             .btn-tambahLangkah {
                 color: #fff;
                 background: linear-gradient(to right, #354857 , #19354B);
                 text-align: center;
                 border: 0;
                 border-radius: .5em;
                 padding: 1em;
             }
          </style>
    </head>
    <body style="background-color: white; position: relative">
        <?php 
            $username = Auth::user()->username; 
            $email = Auth::user()->email; 
            $alamat = Auth::user()->alamat; 
            $avatar = Auth::user()->avatar;
          ?>
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11"> 
        <img src="/img/mppl13.png" class="login-img12">
        <img src="/img/mppl15.png" class="login-img15"> 
        <a href="/foodrecipe/" class="logout" style="top: 80%;">Back</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">{{ __('Logout') }}</button>
        </form>
        
        <img class="crop" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
        <p class="judul" style="top: 6.5%; font-size: 250%">Add Recipe</p>
        <form method="POST" action="{{ route('foodrecipe.store') }}" enctype="multipart/form-data" class="inputForm">
            @csrf
            
            <input type="text" name="nama_makanan" placeholder="Nama Makanan" style="top: 20%; height: 6%" required>
            <input required type="text" name="deskripsi" placeholder="Deskripsi Makanan" style="top: 26.5%; height: 6%">
            <input type="text" required name="alat" placeholder="Alat" style="top: 33%; height: 6%">
            <input type="text" required name="bahan" placeholder="Bahan" style="top: 39.5%; height: 6%">
            <select name="tipe" style="top: 46%; height: 6%">
              <option value="1" style="color: #354857">Appetaizer</option>
              <option value="2" style="color: #354857">Main Course</option>
              <option value="3" style="color: #354857">Dessert</option>
            </select>
            <input type="text" name="langkah[]" placeholder="Langkah 1" style="top: 52.5%; height: 6%" required>
            <input type="text" name="langkah[]" placeholder="Langkah 2" style="top: 59%; height: 6%" required>
            <input type="text" name="langkah[]" placeholder="Langkah 3" style="top: 65.5%; height: 6%" required>
            <input type="text" name="langkah[]" placeholder="Langkah 4" style="top: 72%; height: 6%" required>
            <input type="text" name="langkah[]" placeholder="Langkah 5" style="top: 78.5%; height: 6%" required>
            <input required type="file" name="cover" class="avatar" style="top: 84%">
            <center>
                <button type="submit" class="round-button-login-new" style="top: 90%; width: 5%; height: 10%">Post</button>
            </center>
        </form>

        {{-- <form method="POST" action="{{ route('foodrecipe.store') }}" enctype="multipart/form-data" class="inputForm">
            @csrf
            
            <input type="text" name="nama_makanan" placeholder="Nama Makanan" style=" height: 6%" required>
            <input required type="text" name="deskripsi" placeholder="Deskripsi Makanan" style=" height: 6%">
            <input type="text" required name="alat" placeholder="Alat" style="height: 6%">
            <input type="text" required name="bahan" placeholder="Bahan" style=" height: 6%">
            <select name="tipe" style="top: 46%; height: 6%">
              <option value="1">Appetaizer</option>
              <option value="2">Main Course</option>
              <option value="3">Dessert</option>
            </select>
            <input type="text" name="langkah[]" placeholder="Langkah 1" style="height: 6%" id="langkahTemplate">
            <center>
                <button type="button" onclick="tambahLangkah()" class="btn-tambahLangkah">Tambah Langkah</button>
            </center>
            <input required type="file" name="cover" class="avatar" style="">
            <center>
                <button type="submit" class="round-button-login-new" style="position: absolute; bottom: -20vh; top:auto; ;width: 5vw; height: 10vh">Post</button>
            </center>
        </form> --}}

        <script>
            let langkah = document.getElementById('langkahTemplate');
            let number = 1;
            function tambahLangkah() {
                let clone = langkah.cloneNode(true);
                
                clone.setAttribute( 'id', 'newId'+ ++number );
                clone.setAttribute( 'placeholder', 'Langkah ' + number  );
                let newTop = parseInt(clone.style.top)  + 6.5;
                clone.style.top = newTop + '%';
                langkah.after(clone);
                langkah = clone;
            }

        </script>
    </body>
</html>

