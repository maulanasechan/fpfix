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
        <style>
            
        </style>
    </head>
    <body style="background-color: white">
        <form method="POST" action="{{ route('marketplace.store') }}" enctype="multipart/form-data">
            @csrf
            <?php 
                $id = 1;  
            ?>
            <input type="text" name="nama_barang" placeholder="Nama Barang">
            <input type="hidden" name="id_penjual" value= <?php echo $id; ?> >
            <input type="text" name="deskripsi" placeholder="Deskripsi Barang">
            <select name="tipe">
              <option value="1">Appetaizer</option>
              <option value="2">Main Course</option>
              <option value="3">Dessert</option>
            </select>
            <input type="number" name="harga" placeholder="Harga">
            <input type="file" name="cover">
            <input type="submit" name="submit">
        </form>
    </body>
</html>

