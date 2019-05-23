<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>List of Transaction</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            
        </style>
    </head>
    <body style="background-color: white">
        <p class="judul" style="top: 15%;">List of Transaction</p>
        <img src="/img/mppl11.png" class="login-img9">  
        <img src="/img/mppl12.png" class="login-img10">
        <img src="/img/mppl12.png" class="login-img11" style="top: 55%;"> 
        <img src="/img/mppl13.png" class="login-img12"> 
        <img src="/img/mppl15.png" class="login-img15"> 
        
        <div class="container" style="top: 47%; width: 60%">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Amount</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Resi</th>
                <th>Bukti</th>
                <th>Tanggal Order</th>
                <th>Menu</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($order as $item)
              <tr class="success">
                <td>{{$item->barang_dijual->nama_barang}}</td>
                <td>{{$item->barang_dijual->harga}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->amount*$item->barang_dijual->harga}}</td>
                @if (!isset($item->bukti))
                    <td>Silahkan upload bukti transfer didetail order</td>
                @elseif (!isset($item->resi))
                    <td>Barang sedang diproses</td>
                @elseif ($item->status == 0)
                    <td>Barang sedang dikirim</td>
                @elseif ($item->status == 1)
                    <td>Barang telah diterima</td>
                @endif
                @if (isset($item->resi))
                <td><img src="/storage/{{$item->resi}}" style="height: 10%; width: auto"></td>
                @else
                <td></td>
                @endif
                <td><img src="{{$item->bukti}}" style="height: 8%"></td>
                <td>{{$item->created_at->format('d M Y')}}</td>
                <td>
                    <form method="POST" action="{{route('profil.barangDiterima')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        @if ($item->status != 1)
                          <button class='btn btn-sm btn-success delete-btn' type='submit'>Barang Diterima </button>    
                        @else
                          <button disabled class='btn btn-sm btn-success delete-btn' type='submit'>Barang Diterima </button>    
                        @endif
                      </form>
                    
                    <a class="btn btn-sm btn-primary delete-btn" href="/profil/detail/{{$item->id}}">Detail Order</a>
                </td>
              </tr>
            @endforeach         
            </tbody>
          </table>
        </div>
        <?php
            $avatar = Auth::user()->avatar;
        ?>
        <img class="crop" style="width: 98px; height: 98px; object-fit: cover" src=<?php echo $avatar ?>>
        <a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
        <a href="/home" class="logout" style="top: 80%;">Back</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">{{ __('Logout') }}</button>
        </form>
    </body>
</html>

