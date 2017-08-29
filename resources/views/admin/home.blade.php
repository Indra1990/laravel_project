@extends('layouts.backend')
@section('sidebar')
<style type="text/css">
    .user{
        font-size: 25px;
        font-family: 
    }
</style>
<br><br>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="user">User</div>
                                    <div class="user">{{ $users }}</div>
                                </div>
                            </div>
                        </div>
                        <a href=" {{ url('admin/user_profile') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-bag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="user">Barang</div>
                                    <div class="user">{{ $barangs }}</div>
                                </div>
                            </div>
                        </div>
                        <a href=" {{ url('admin/merchandise_profile') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-inbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="user">Order</div>
                                    <div class="user">{{ $orders }}</div>
                                </div>
                            </div>
                        </div>
                        <a href=" {{ url('admin/cek_barang_order') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <br><br>

@endsection
