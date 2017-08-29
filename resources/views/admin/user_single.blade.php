@extends('layouts.backend')
@section('sidebar')
<br>
   <div class="row">
   		<div class="col-md-8 col-md-offset-1">
   			 <div class="panel panel-default">
                  <div class="panel-heading"><h4 style=" font-weight: bold; color:#286090; ">Daftar User</h4></div>
                        <div class="panel-body">
                            <table class="table table-bordered table-list table table-striped" style="text-align: center;">
                                <tr>
                                    <td><b>ID</b></td>
                                    <td><b>{{$users->id}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><b>{{$users->name}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><b>{{$users->email}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Sales</b></td>
                                    <td><b>{{$users->sales}}</b></td>
                                </tr>
                              
                                <tr>
                                    <td><b>Aksi</b></td>   
                                    <td><a href="{{url('admin/user_profile')}}"> 
                                    <button type="button" class=" btn btn-primary btn-block active">Kembali</button>
                                </a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
		</div>
    </div>
@endsection
