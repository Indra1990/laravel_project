@extends('layouts.backend')
@section('sidebar')
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/search.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<br>
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        @if(Session::has('update'))
        <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <i class="fa fa-info-circle"></i>    {{ Session::get('update') }}
        </div>
        @endif


        @if(Session::has('delete'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('delete') }}
        </div>
        @endif

        @if(Session::has('insert'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('insert') }}
        </div>
        @endif
      

          <div class="row">
        <div class="col-md-6">
            <form action="{{ action('AdminController@search_merchandise') }}" method="GET" role="search">
            {{ csrf_field() }}
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" name="search" placeholder="barang, kode barang" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
        <div class="col-md-6">
            <div class="text-right">
<a href="{{ url('admin/merchandise_tambah') }}"><button class="btn btn-info ">Tambah Data Barang Baru</button></a>
        <a href="{{ url('admin/downloadExcelBarang') }}"><button class="btn btn-success ">Laporan Data Barang</button></a>
        </div>
        </div>
    </div>
<br>
<div class="panel panel-primary" >
<!-- Default panel contents -->

  <div class="panel-heading"><h4 class="text-center" ><b>Daftar Barang</b></h4></div>

  <!-- Table -->
  <table class="table" >
    <thead>
    	<tr>
			<th class="text-center">Kode </th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Satuan Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Update</th>
            <th class="text-center">Aksi</th>
    	</tr>
        @foreach($barangs as $barang )
    	<tr>
    		<td class="text-center">{{ $barang->kode_barang }}</td>
    		<td class="text-center">{{ $barang->nama_barang }}</td>
    		<td class="text-center">{{ $barang->satuan_barang }}</td>
    		<td class="text-center">{{ $barang->jumlah_barang }}</td>
            <td class="text-center">{{ date('Y-m-d', strtotime($barang->updated_at)) }}</td>
    		<td class="text-center"><a class='btn btn-success btn-xs' href="{{ url('admin/merchandise_edit')}}/{{$barang->id }}"><span class="glyphicon glyphicon-edit"></span> Tambah jumlah barang</a> </td>
    	</tr>
        @endforeach
    </thead>
  </table>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection 