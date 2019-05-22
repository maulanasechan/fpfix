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

<div class="container" style="top: 50%">
  <h2>Table Foodrecipe</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>ID User</th>
        <th>Nama Makanan</th>
        <th>Bahan</th>
        <th>Peralatan</th>
        <th>Langkah</th>
        <th>Tipe</th>
        <th>Filename</th>
        <th>Created At</th>
        <th>Menu</th>
      </tr>
    </thead>
    <tbody>
    	@if(count($foodrecipe))
    		@foreach($foodrecipe as $u)
		      <tr class="success">
            <td>{{$u->id_resep}}</td>
		        <td>{{$u->id_user}}</td>
		        <td>{{$u->nama_makanan}}</td>
		        <td>{{$u->bahan}}</td>
		        <td>{{$u->peralatan}}</td>
            <td>{{$u->langkah}}</td>
            <td>{{$u->tipe}}</td>
            <td>{{$u->filename}}</td>
		        <td>{{$u->created_at}}</td>
            <form method="POST" action="{{route('admin.deleteItem')}}">
              @csrf
                  <input type="hidden" name="table" value="2">
                  <input type="hidden" name="id" value="{{$u->id_resep}}">
                <td><button class='btn btn-sm btn-danger delete-btn' type='submit'>Delete </button></td>  
            </form>
		        
		      </tr>      
      		@endforeach
      	@else
      		<p>Ga laku</p>
      	@endif
    </tbody>
  </table>
    {{$foodrecipe->links()}}
</div>
<a href="{{route('admin.dashboard')}}" class="logout" style="top: 80%;">Back</a>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
</body>
</html>
