@extends('layouts.backend')
@section('sidebar')
<title>Muhammad Indra</title>
<style type="text/css">
    .paginate{
        margin-top: -20px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/search.css')}}">

<br>

<div class="row">
	    <div class="col-md-8 col-md-offset-1">
        

        @if(Session::has('insert'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('insert') }}
        </div>
        @endif

        @if(Session::has('update'))
        <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <i class="fa fa-info-circle"></i>    {{ Session::get('update') }}
        </div>
        @endif

        @if(!empty($push))

     <div class="row">
        <div class="col-md-6">
            <form action=" {{ action('AdminController@search_cek_barang_order') }}" method="GET" role="search">
            {{ csrf_field() }}
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" name="search" placeholder="Barang Tanggal order" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
    </div>
<br>
<div class="panel panel-primary" >
<!-- Default panel contents -->

  <div class="panel-heading"><h4 class="text-center" ><b>Cek Order Barang</b></h4></div>

  <!-- Table -->
  <table class="table" >
    <thead>
    	<tr>
            <th class="text-center">No Order</th>
			<th class="text-center">Nama Barang</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Status</th>
            <th class="text-center">Tgl Order</th>
            <th class="text-center">Due_Date</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Sales</th>
            <th class="text-center">Stok Barang</th>
            <th class="text-center">Aksi</th>

    	</tr>
    	 @foreach($orders as $order)
            @foreach($order->barang as $barang_)
    	<tr>
            <td class="text-center">B00{{ $order->id }}</td>
    		<td class="text-center">{{ $barang_->nama_barang }}</td>
            <td class="text-center">{{ $barang_->pivot->quantity }}</td>
            <td class="text-center">{{ $order->status }}</td>
    		<td class="text-center">{{ date('Y-m-d', strtotime($order->tanggal_order)) }}</td>
            <td class="text-center">{{ date('Y-m-d', strtotime($order->due_date)) }}</td>
    		<td class="text-center">{{ $order->user->name }}</td>
            <td class="text-center">{{ $order->user->sales }}</td>
            <td class="text-center">{{ $barang_->jumlah_barang}}</td>
            <td class="text-center"><a class='btn btn-success btn-xs' href="{{ url('admin/edit_cek_barang_order')}}/{{$order->id }}"><span class="glyphicon glyphicon-edit"></span> Proses</a>
            <a class='btn btn-primary btn-xs' href="{{ url('admin/selesai_cek_order_barang')}}/{{$order->id }}"><span class="fa fa-check-circle"></span> Selesai</a>
            </td>
        </tr>
    	 @endforeach
        @endforeach
    </thead>
  </table>

</div>
<div class="pagination paginate">{!! $orders->render() !!} </div>
</div>
 @else
              <div class="alert alert-info">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <i class="fa fa-info-circle">Order Barang Tidak Ada</i>
        </div>
        @endif
</div>

@endsection