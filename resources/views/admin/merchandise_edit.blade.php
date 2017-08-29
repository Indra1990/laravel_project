@extends('layouts.backend')
@section('sidebar')
<script type="text/javascript">
	function calc() {
		var n1 = parseInt(document.getElementById('n1').value);
		var n2 = parseInt(document.getElementById('n2').value);
		var oper = document.getElementById('operator').value;

		if (oper === '+') {
			document.getElementById('result').value= n1+n2;
		}

	}
</script>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><b>Tambah Jumlah Barang</b></h3>
					</div>
						<div class="panel-body">
		
   						 <br>

							<form enctype="multipart/form-data" action="{{ url('admin/merchandise_edit',$barangs->id) }}" method="post">
								
								<div class="row">
								<div class="col-md-4">

        						<input type="text" class="form-control" id="n1" value="<?php echo $barangs->jumlah_barang ?>" readonly>
    							<select id='operator' style="display:none">
    								<option  value="+">+</option>
    							</select>
    							<label>Tambah Jumlah Barang</label>
    							<input type="number" class="form-control" id="n2" pattern="[0-9]"><br>
    							
    							<div class="form-group {{ $errors->has('jumlah_barang') ? ' has-error' : '' }}">
        						<input type="text" class="form-control" id="result" name="jumlah_barang"  readonly>
    							@if($errors->has('jumlah_barang'))
      							<span class="text-danger">{{ $errors->first('jumlah_barang') }}</span>
      							@endif
    							</div>
    							</div>

							
								

								 	
								</div>
    							<input type="hidden" name="_method" value="PATCH">
      							<input type="hidden" name="_token" value="{{ csrf_token() }}">

      							<div class="form-group">
      							<input type="submit" onclick="calc()" class="btn btn-primary " value="Tambah">
      							</div>  

							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection