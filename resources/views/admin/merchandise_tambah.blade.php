@extends('layouts.backend')
@section('sidebar')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<br><br>
<div class="container">
    <div class="col-md-9 col-md-offset-1">
   
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Tambah Barang Baru </b></h3>
  </div>
  
 <div class="panel-body">

  <form class="" action="{{ action('AdminController@merchandise_tambahh')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="post">
    
    <div class="form-group {{ $errors->has('kode_barang') ? ' has-error' : '' }}" >
    <label for="kode_barang">Kode Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="kode_barang" placeholder="kode barang" value="{{ old('kode_barang') }}">
      @if($errors->has('kode_barang'))
      <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
      @endif
    </div>

  <div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
    <label for="nama_merchandise">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang" placeholder="nama barang" value="{{ old('nama_barang') }}">
      @if($errors->has('nama_barang'))
      <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
      @endif
  </div>

  <div class="form-group {{ $errors->has('satuan_barang') ? ' has-error' : '' }}">
    <label for="satuan_barang">Satuan Barang</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="satuan_barang" placeholder="satuan barang" value="{{ old('satuan_barang') }}">
     @if($errors->has('satuan_barang'))
      <span class="text-danger">{{ $errors->first('satuan_barang') }}</span>
      @endif
    </div>
    
    <div class="form-group {{ $errors->has('jumlah_barang') ? ' has-error' : '' }}">
    <label for="photo" class="">Jumlah Barang</label>
    <input type="text" name="jumlah_barang" class="form-control" placeholder="jumlah barang" value="{{ old('jumlah_barang') }}">
      @if($errors->has('jumlah_barang'))
      <span class="text-danger">{{ $errors->first('jumlah_barang') }}</span>
      @endif
      </div>
   
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" class=" btn btn-primary" value="Simpan"  >
	</form>
	</div>
	</div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
 @if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::pull('sweet_alert.alert') !!});
    </script>
@endif

@endsection    