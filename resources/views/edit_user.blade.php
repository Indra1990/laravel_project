@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

		@if($errors->any())
		   @foreach ($errors->all() as $error)
		        <div class="alert alert-danger">
		        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>{{ $error }}
                </div>
		  @endforeach
		@endif

          
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Edit User</b></h3>
  </div>
 <div class="panel-body">
    
  <form action="{{ url('edit_user',$users->id) }}" method="POST">
    <div class="form-group">
      <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $users->name ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $users->email ?>">
    </div>
    <div class="form-group">
      <label for="sales">Sales</label>
        <select  class="form-control" name="sales" id="sales">
            <option value="{{$users->sales}}">{{$users->sales}}</option>
            <option value="B2C">B2C</option>
            <option value="B2B">B2B</option>  
        </select> 
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

@endsection