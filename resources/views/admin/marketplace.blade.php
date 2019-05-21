<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table User</title>
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

<div class="container" style="top: 35%">
  <h2>Table Marketplace</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID Barang</th>
        <th>ID Penjual</th>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Tipe</th>
        <th>Filename</th>
        <th>Created At</th>
        <th>Menu</th>
      </tr>
    </thead>
    <tbody>
    	@if(count($marketplace))
    		@foreach($marketplace as $u)
		      <tr class="success">
            <td>{{$u->id_barang}}</td>
		        <td>{{$u->id_penjual}}</td>
		        <td>{{$u->nama_barang}}</td>
		        <td>{{$u->deskripsi}}</td>
		        <td>{{$u->harga}}</td>
            <td>{{$u->tipe}}</td>
            <td>{{$u->filename}}</td>
		        <td>{{$u->created_at}}</td>
		        <form method="POST" action="{{route('admin.deleteItem')}}">
              @csrf
                  <input type="hidden" name="table" value="1">
                  <input type="hidden" name="id" value="{{$u->id_barang}}">
                <td><button class='btn btn-sm btn-danger delete-btn' type='submit'>Delete </button></td>  
            </form>
		      </tr>      
      		@endforeach
      	@else
      		<p>Ga laku</p>
      	@endif
    </tbody>
  </table>
</div>
<a href="{{route('admin.dashboard')}}" class="logout" style="top: 80%;">Back</a>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
</body>
</html>
