<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Product</title>
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
<p class="judul" style="top: 17%; word-spacing: 30px;">List of Product</p>
<center><div class="container" style="top: 50%">
  <table class="table" style="width: 85%;">
    <thead>
      <tr>
        <th>ID Barang</th>
        <th>ID Penjual</th>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Tipe</th>
        <th>Gambar Produk</th>
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
            @if ($u->tipe == 1)
              <td>Appetizer</td>
            @elseif ($u->tipe == 2)
              <td>Main Course</td>
            @elseif ($u->tipe == 3)
              <td>Dessert</td>
            @endif
            <td><img src="/storage/{{$u->filename}}" style="width: auto; max-height: 50px; margin: 0 auto; display: block;"></td>
            <td>{{$u->created_at}}</td>
            <form method="GET" action="{{route('penjual.update')}}">
              @csrf
                  <input type="hidden" name="table" value="1">
                  <input type="hidden" name="id" value="{{$u->id_barang}}">
                <td><button class='btn btn-sm btn-danger delete-btn' type='submit' style="background-color: #354857; border : none;">Update </button></td>  
            </form> 
            <form method="POST" action="{{route('penjual.deleteItem')}}">
              @csrf
                  <input type="hidden" name="table" value="1">
                  <input type="hidden" name="id" value="{{$u->id_barang}}">
                <td><button class='btn btn-sm btn-danger delete-btn' type='submit' style="border : none;">Delete </button></td>  
            </form>
          </tr>      
          @endforeach
        @else
          <p>Belum Ada Data</p>
        @endif
    </tbody>
  </table>
  {{$marketplace->links()}}
</div>
</center>

<a href="{{route('penjual.dashboard')}}" class="logout" style="top: 81%;">Back</a>
<a href="{{route('marketplace.create')}}" class="logout" style="top: 74%;">Add</a>
<form id="logout-form" action="{{ route('penjual.logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">{{ __('Logout') }}</button>
</form>
</body>
</html>