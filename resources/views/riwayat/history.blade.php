@extends('layouts.app')

@section('content')
<style type="text/css">
  .belum_diambil{
    background-color: red;
    color :white;
  }
  .sudah_diambil{
      background-color: green;
      color :white;
  }
  .silakan_diambil{
      background-color: blue;
      color :white;
  }
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary" >
<!-- Default panel contents -->

  <div class="panel-heading"><h4 class="text-center" ><b>History Order Barang</b></h4></div>

  <!-- Table -->
 
    
 <div class="row">
  <div class="col-md-2">
    <h4 class="text-center bg-primary"><b>No Order</b></h4><hr>
    @foreach($user->order as $order_)
        <li class="text-center" style="list-style-type:none"> B00{{ $order_->id }}  </li>
        @endforeach
      </div>

  <div class="col-md-2">
    <h4 class="text-center bg-primary"><b>Status</b></h4><hr>
    @foreach($user->order as $order_)
        <li class="text-center" style="list-style-type:none"> <strong>{{ $order_->status }}</strong></li>
        @endforeach
      </div>

  <div class="col-md-2">
    <h4 class="text-center bg-primary"><b>Tanggal Order</b></h4><hr>
      @foreach($user->order as $order_)
      <li class="text-center" style="list-style-type:none"> {{ Carbon\Carbon::parse($order_->created_at)->format('d-m-Y ') }} </li>
        @endforeach
      </div>

      <div class="col-md-2">
    <h4 class="text-center bg-primary"><b>Due Date</b></h4><hr>
      @foreach($user->order as $order_)
      <li class="text-center" style="list-style-type:none"> {{ date('d-m-Y', strtotime($order_->due_date)) }} </li>
        @endforeach
      </div>

<div class="col-md-2">
    <h4 class="text-center bg-primary"><b>Reminder</b></h4><hr>
      @foreach($user->order as $order_)
        @if($order_->status === 'Selesai')
          <li class="text-center" style="list-style-type:none"><b class="sudah_diambil">Sudah Diambil</b></li>
        @elseif($order_->status === 'Order')
          <li class="text-center" style="list-style-type:none"><b class="belum_diambil">Belum Diproses</b></li>
        @elseif($order_->status === 'Proses')
          <li class="text-center" style="list-style-type:none"><b class="silakan_diambil">Silakan Diambil</b></li>
        @endif
      @endforeach
      </div>

      <div class="col-md-2">
    <h4 class="text-center bg-primary"><b>Waktu Tunggu</b></h4><hr>
      @foreach($user->order as $order_)
        <li style="list-style-type:none"><center>{{$order_->tanggal_order +1}} Hari </center></li>        
      @endforeach
      </div>
</div>          
</div>
		</div>
	</div>
</div>
@endsection