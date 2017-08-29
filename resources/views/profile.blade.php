@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('update'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>    {{ Session::get('update') }}
                    </div>
            @endif

          
             <div class="panel panel-primary">
                  <div class="panel-heading"><h4 style=" font-weight: bold; color:#fffff; ">Daftar User</h4></div>
                        <div class="panel-body">
                            <table class="table table-bordered table-list table table-striped" style="text-align: center;">
                                <tr>
                                    <td><b>ID</b></td>
                                    <td><b>{{$user->id}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><b>{{$user->name}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><b>{{$user->email}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Sales</b></td>
                                    <td><b>{{$user->sales}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Aksi</b></td>   
                                    <td><a href="{{url('/edit_user')}}/{{$user->id}}"> 
                                    <button type="button" class="glyphicon glyphicon-edit btn btn-primary btn-block active">Edit</button>
                                </a></td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>        
    </div>
@endsection
