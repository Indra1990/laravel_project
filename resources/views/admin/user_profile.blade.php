@extends('layouts.backend')
@section('sidebar')
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/search.css')}}">

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
    
         <div class="row">
        <div class="col-md-6">
            <form action="{{ action('AdminController@search_user') }}" method="GET" role="search">
            {{ csrf_field() }}
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" name="search" placeholder="Nama,Email,Sales" />
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
        <a href="{{ URL::to('admin/downloadExcelUser') }}"><button class="btn btn-success">Laporan Data User</button></a>
        </div>
        </div>
    </div>
    
        
       
       <br>
        
<div class="panel panel-primary" >
<!-- Default panel contents -->

  <div class="panel-heading"><h4 class="text-center"><b>Daftar User</b></h4></div>

  <!-- Table -->
  <table class="table" >
    <thead>
    	<tr>
			<th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Email</th>
            <th class="text-center">Sales</th>
    	</tr>
    	@foreach($users as $index => $user)
    	<tr>
    		<td class="text-center">{{$index +1}}</td>
    		<td class="text-center">{{$user->name}}</td>
    		<td class="text-center">{{$user->email}}</td>
    		<td class="text-center">{{$user->sales}}</td>
    	</tr>
    	@endforeach
    </thead>
  </table>
</div>
</div>
</div>
@endsection 