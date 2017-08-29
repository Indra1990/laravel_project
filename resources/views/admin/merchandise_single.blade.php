@extends('layouts.backend')
@section('sidebar')
<br>
   <div class="row">
   		<div class="col-md-8 col-md-offset-1">
   			 <div class="panel panel-primary">
                  <div class="panel-heading"><h4 style=" font-weight: bold; color:#FFFFF; ">Daftar Barang</h4></div>
                        <div class="panel-body">
                            <table class="table table-bordered table-list table table-striped" style="text-align: center;">
                                <tr>
                                    <td><b>ID</b></td>
                                    <td><b>{{$barangs->id_barang}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Kode Barang</b></td>
                                    <td><b>{{$barangs->kode_barang}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Barang</b></td>
                                    <td><b>{{$barangs->nama_barang}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Barang</b></td>
                                    <td><b>{{$barangs->jenis_barang}}</b></td>
                                </tr>
                                 <tr>
                                    <td><b>Jumlah Barang</b></td>
                                    <td><b>{{$barangs->jumlah_barang}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Aksi</b></td>   
                                    <td><a href="{{url('admin/merchandise_profile')}}"> 
                                    <button type="button" class=" btn btn-primary btn-block active">Kembali</button>
                                </a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
		</div>
    </div>
@endsection
