@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/panel.css')}}"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<div class="container">

  <div class="row">
  <div class="col-md-8">
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
        <div class="col-md-8">
          <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Order Barang</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body">
                    
                  <div class="row">
                     <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Tanggal Order</label>
                        <input class="form-control" type="text" id="time1" name="tanggal_order" readonly=true />
                    </div>
                  </div>

                     <div class="col-md-4">
                    <div class="form-group">
                        <label for="Due Date" class="control-label">Due Date</label>
                        <input class="form-control" type="text" id="due_date" name="due_date"  />
                    </div>
                  </div>

                  </div>

                  

                  <div class="row">
                     <div class="col-md-4">
                    <div class="form-group required">
                        <label for="lastname" class="control-label">Pilih Barang</label>
                  <select class="form-control" name="barang[]" required>
                  <option value="" disabled selected>-- Pilih Barang --</option>
                  @foreach($Barang as $key => $value)
                  <option value="{{$key}}" >{{ $value }}</option>
                  @endforeach
                  </select>                   
                  </div>
                  </div>

                    <div class="col-md-2">
                    <div class="form-group">
                        <label for="Quantity" class="control-label">Quantity</label>
                        <input type="text" class="form-control" id="Quantity" name="quantity[]" placeholder="Quantity" required>
                    </div>
                    </div>

                  </div>

                  <input type="hidden" name="_method" value="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">


                  <div class="row">
                  <div class="col-xs-3">
                  <input type="submit" class="btn btn-primary " value="Simpan" >
                  </div>
                  </div>

                </div>
            </div>
        </div>
     </div>
    
  </form>
  </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">
 $('#time1').datetimepicker({
        format: 'YYYY-M-D',
        defaultDate:'now',
    });
 $('#due_date').datetimepicker({
        format: 'YYYY-M-D',
        defaultDate:'now',
    });
</script>
<script type="text/javascript" src="{{asset('js/panel.js')}}"></script>

<script type="text/javascript">
 document.getElementById("srt").value = document.getElementById("barang").value;
</script>

    @if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::pull('sweet_alert.alert') !!});
    </script>
    @endif
@endsection