@extends('layouts.backend')
@section('sidebar')
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><b>Edit User</b></h3>
					</div>
						<div class="panel-body">
		
    <br>

								
							<form action="{!! url('admin/user_edit',$users->id)!!}" method="post">
								<div class="form-group">
      							<label for="name">Nama</label>
       							<input type="text" class="form-control" id="name" name="name" value="<?php echo $users->name ?>">
   							 	 	@if($errors->has('name'))
      								<span class="text-danger">{{ $errors->first('name') }}</span>
      								@endif
   							 	</div>

   							 	<div class="form-group">
      							<label for="email">Email</label>
       							<input type="email" class="form-control" id="email" name="email" value="<?php echo $users->email ?>">
   							 		@if($errors->has('email'))
      								<span class="text-danger">{{ $errors->first('email') }}</span>
      								@endif
   							 	</div>

   							 	<div class="form-group">
							    	<label for="divisi">Sales</label>
							        <select  class="form-control" name="sales" id="sales">
							            <option value="{{$users->sales}}">{{$users->sales}}</option>
							            <option value="B2B">B2B </option>
							        	<option value="B2C">B2C</option>

							        </select> 
							        @if($errors->has('sales'))
  	     								<span class="text-danger">{{ $errors->first('sales') }}</span>
      								@endif
							    </div>
 

    							<input type="hidden" name="_method" value="PATCH">
      							<input type="hidden" name="_token" value="{{ csrf_token() }}">
      							<input type="submit" class="btn btn-primary " value="Update">
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection