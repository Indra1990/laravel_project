@extends('layouts.app')

@section('content')
<style type="text/css">
  .quantity{
    margin-top: 10px;
  }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="container">
  <div class="row">
  <div class="col-xs-6">
@if(Session::has('insert'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('insert') }}
        </div>
        @endif
  </div>
  </div>
<div class="row">
  <form method="post" action="{{ action('UserController@barang_order_store')}}" >
     {{ csrf_field() }}
  <div class="col-xs-6 col-sm-3"> 
    <label>Tanggal Order</label>
        <div class="form-group">
          <input class="form-control " type="text" id="time1" name="tanggal_order" readonly=true />
        </div>
        <h5><b>Nama Barang</b></h5>
  <ul class="list-group">
    @foreach($Barang as $key => $value)
    <li class="list-group-item"><label><input type="checkbox" value="{{ $key }}" name="barang[]" >{{ $value }}</label>
    </li>
    @endforeach
  </ul>
  </div>
<br><br><br>


  <div class="col-xs-6 col-sm-1"><h5><b>Quantity</b></h5>
      <p><label><input type="text" class="form-control" name="quantity[]" value="" required></label></p>
      <p><label><input type="text" class="form-control" name="quantity[]" value=""></label></p>
      <p><label><input type="text" class="form-control" name="quantity[]" value=""></label></p>
      <p><label><input type="text" class="form-control" name="quantity[]" value=""></label></p>
      <p><label><input type="text" class="form-control" name="quantity[]" value=""></label></p>
  </div>

<input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</div>
<div class="row">
  
    <div class="col-md-2">
      <input type="submit" class="btn btn-primary " value="Simpan">
    </div>
</div>

  </form>
</div>

</div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

<script type="text/javascript">
 $('#time1').datetimepicker({
        format: 'YYYY-M-D',
        defaultDate:'now',
    });
</script>
<div class="row">
        <div class="col-md-10 col-md-offset-1">
 <div id="chart" style="width:100%"></div>
    @barchart('Votes', 'chart')
</div>
</div>


                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
@endsection

<!---dfdfsdf--->
@extends('layouts.app')

@section('content')
<style type="text/css">
  .quantity{
    margin-top: 10px;
  }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<div class="container">
  <div class="row">
  <div class="col-xs-6">
@if(Session::has('insert'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('insert') }} 
        </div>
        @endif
  </div>
  </div>


  <form method="post" action="{{ action('UserController@barang_order_store')}}" >
     {{ csrf_field() }}
<div class="row">
  <div class="col-xs-6 col-sm-3"> 
    <label>Tanggal Order</label>
        <div class="form-group">
          <input class="form-control " type="text" id="time1" name="tanggal_order" readonly=true />
        </div>

        <div class="form-group" required>
      <label for="sel1">Pilih Barang:</label>
      <select class="form-control" name="barang[]" required>
        <option value="" disabled selected>-- Pilih Barang --</option>
          @foreach($Barang as $key => $value)
        <option value="{{$key}}" >{{ $value }}</option>
            @endforeach
      </select>
        </div>

  
  </div>
<br><br><br>


  <div class="col-xs-6 col-sm-1"><h5><b>Quantity</b></h5>
      <p><label><input type="text" class="form-control" name="quantity[]" value="" required></label></p>
      
  </div>
</div>

<input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="row"> 
    <div class="col-md-2">
      <input type="submit" class="btn btn-primary " value="Simpan" >
    </div>
    <br><br>
</div>

    </div>
  </form>
  </div>
</div>
</div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
<script type="text/javascript">
 $('#time1').datetimepicker({
        format: 'YYYY-M-D',
        defaultDate:'now',
    });
</script>

<script type="text/javascript">
 document.getElementById("srt").value = document.getElementById("barang").value;
</script>

@endsection <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>