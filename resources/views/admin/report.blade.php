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
  <h2>Table Report</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>ID User</th>
        <th>ID Barang</th>
        <th>Report</th>
        <th>Tipe</th>
        <th>Created At</th>
        <th>Menu</th>
      </tr>
    </thead>
    <tbody>
    	@if(count($report))
    		@foreach($report as $u)
		      <tr class="success">
            <td>{{$u->id}}</td>
		        <td>{{$u->id_user}}</td>
		        <td>{{$u->id_barang}}</td>
		        <td>{{$u->report}}</td>
		        <td>{{$u->tipe}}</td>
		        <td>{{$u->created_at}}</td>
		        <form method="POST" action="{{route('admin.deleteItem')}}">
              @csrf
                  <input type="hidden" name="table" value="3">
                  <input type="hidden" name="id" value="{{$u->id}}">
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

