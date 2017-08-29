@extends('layouts.backend')
@section('sidebar')
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><b>Edit Order Status</b></h3>
					</div>
						<div class="panel-body">
		
   						 <br>

							<form enctype="multipart/form-data" action="{{ url('admin/selesai_cek_order_barang',$order->id) }}" method="post">
								
								<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
      							<label for="status">Status</label>

                                <select  class="form-control" name="status" id="sales">
                                <option value="<?php echo $order->status ?>"><?php echo $order->status ?></option>
                                <option value="Selesai">Selesai</option>
                                <option value="Barang Kosong">Barang Kosong</option>
                                <option value="Stok Tidak Tercukupi">Stok Tidak Tercukupi</option>

                                </select> 
      							
   							 	@if($errors->has('status'))
      							<span class="text-danger">{{ $errors->first('status') }}</span>
     							 @endif
   							 	</div>   	
    							<input type="hidden" name="_method" value="PATCH">
      							<input type="hidden" name="_token" value="{{ csrf_token() }}">

      							<div class="form-group">
      							<input type="submit" class="btn btn-primary " value="Update">
      							</div>  


              </form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection