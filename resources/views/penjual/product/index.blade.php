@extends('penjual.layout')

@section('content')

<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-success float-right btn-sm" href="{{url('/penjual/product/create')}}"><i class="fa fa-plus-circle"></i> Add new product</a>
            <i class="fas fa-table"></i>
            Product List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>gambar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>gambar</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{$product->nama_barang}}</td>
                    <td>{{$product->deskripsi}}</td>
                    <td>{{$product->harga}}</td>
                    <td><img src="/storage/{{$product->filename}}" style="width: 100%; height: auto; max-width: 100px;"></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
@endsection