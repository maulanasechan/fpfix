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
  <h2>Table User</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>Username</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Avatar</th>
        <th>Created At</th>
        <th>Menu</th>
      </tr>
    </thead>
    <tbody>
    	@if(count($user))
    		@foreach($user as $u)
		      <tr class="success">
            <td>{{$u->id}}</td>
		        <td>{{$u->username}}</td>
		        <td>{{$u->email}}</td>
		        <td>{{$u->alamat}}</td>
		        <td>{{$u->avatar}}</td>
		        <td>{{$u->created_at}}</td>
		        <form method="POST" action="{{route('admin.deleteItem')}}">
              @csrf
                  <input type="hidden" name="table" value="7">
                  <input type="hidden" name="id" value="{{$u->id}}">
                <td><button class='btn btn-sm btn-danger delete-btn' type='submit'>Delete </button></td>  
            </form>
</td>
		      </tr>      
      		@endforeach
      	@else
      		<p>Ga laku</p>
      	@endif
    </tbody>
  </table>
    {{$user->links()}}
</div>
<a href="{{route('admin.dashboard')}}" class="logout" style="top: 80%;">Back</a>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
</body>
</html>

