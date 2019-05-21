<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Order</title>
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
<p class="judul" style="top: 28%; word-spacing: 30px;">List of Order</p>
<center><div class="container" style="top: 50%">
  <table class="table" style="width: 85%;">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>ID User</th>
        <th>ID Barang</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Created At</th>
        <th>Menu</th>
      </tr>
    </thead>
    <tbody>
      @if(count($transaksi))
        @foreach($transaksi as $u)
          <tr class="success">
            <td>{{$u->id}}</td>
            <td>{{$u->id_user}}</td>
            <td>{{$u->id_barang}}</td>
            <td>{{$u->amount}}</td>
            <td>{{$u->status}}</td>
            <td><img src="{{$u->bukti}}" style="width: auto; height: 10%"></td>
            <td>{{$u->created_at}}</td>
            <td><button data-toggle="modal" data-target="#myModal" style="background-color: #354857; color: white; padding: 8px;">Resi</button></td>  
          </tr>      
          @endforeach
        @else
          <p>Ga laku</p>
        @endif
    </tbody>
  </table>
  {{$transaksi->links()}}
</div>
</center>

  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog" style="width: 50%">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%; height: 190px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #354857">Upload Resi</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('foodprofil.rate') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="">
            <button type="submit" class="round-button-login-new" style="top: 150%; width: 7%; height: 100%">Save</button>
          </form>
        </div>
      </div>  
    </div>
  </div>


<?php
    $avatar = Auth::user()->avatar;
?>
<img class="crop" src=<?php echo $avatar ?>>
<a href="/profil" class="home-link" style="left: 6%; top: 49%; font-size: 150%">Profile</a>
<a href="{{route('penjual.dashboard')}}" class="logout" style="top: 80%;">Back</a>
<form id="logout-form" action="{{ route('penjual.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
</body>
</html>
