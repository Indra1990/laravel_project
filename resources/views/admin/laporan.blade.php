@extends('layouts.backend')
@section('sidebar')
<style type="text/css">
    .paginate{
        margin-top: -20px;
    }
    .search{
        padding-left: 1px;
        margin-bottom: 10px;
    }
    .date{
        margin-bottom: -60px;
    }
    .cari{
        margin-top: 24px;
    }
    
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/search.css')}}">

<br>

<div class="row">
        <div class="col-md-8 col-md-offset-1">

       
        <div class="row">
        <div class="col-md-10 date">
            <form action="{{ action('AdminController@laporan_order') }}" method="GET" role="search">
            {{ csrf_field() }}
            <div class="col-md-4 search">
                    <div class="form-group ">
                        <label for="lastname" class="control-label">Dari</label>
                        <input class="form-control" type="text" id="time1" name="search"  />
                    </div>
                  </div>

                     <div class="col-md-4">
                    <div class="form-group">
                        <label for="Due Date" class="control-label">Sampai</label>
                        <input class="form-control" type="text" id="due_date" name="search2"  />
                    </div>
                  </div>
                <div class="col-md-2">
                    <div class="form-group cari ">
                  <input type="submit" class="btn btn-primary " value="Cari" >
                </div>
                </div>
         </form>
    </div>

    <div class="col-md-3 col-md-offset-9">
    <div class="text-right">
        <a href="{{ url('admin/downloadExcelLaporan') }}"><button class="btn btn-success">Laporan Order Barang</button></a>
        </div>
    </div>

</div>
<br>
<div class="panel panel-primary" >
<!-- Default panel contents -->

  <div class="panel-heading"><h4 class="text-center" ><b>Laporan Order Barang</b></h4></div>

  <!-- Table -->
  <table class="table" >
    <thead>
    	<tr>
            <th class="text-center">No Order</th>
			<th class="text-center">Nama Barang</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Status</th>
            <th class="text-center">Tgl Order</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Sales</th>


    	</tr>
    	 @foreach($orders as $order)
            @foreach($order->barang as $barang_)
    	<tr>
            <td class="text-center" id="no_order">B00{{ $order->id }}</td>
    		<td class="text-center">{{ $barang_->nama_barang }}</td>
            <td class="text-center">{{ $barang_->pivot->quantity }}</td>
            <td class="text-center">{{ $order->status }}</td>
    		<td class="text-center">{{ date('d-m-Y', strtotime($order->tanggal_order)) }}</td>
    		<td class="text-center">{{ $order->user->name }}</td>
            <td class="text-center">{{ $order->user->sales }}</td>

    	</tr>
    	 
        @endforeach
         @endforeach
    </thead>
  </table>
</div>
 <div class="pagination paginate">{!! $orders->render() !!} </div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
<script type="text/javascript">
 $('#time1').datetimepicker({
        format: 'D-M-YYYY',
        defaultDate:'now',
    });
 $('#due_date').datetimepicker({
        format: 'D-M-YYYY',
        //defaultDate:'now',
    });
</script>
@endsection