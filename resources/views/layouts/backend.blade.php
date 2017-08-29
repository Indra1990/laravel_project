<!DOCTYPE html>
<html lang="en">
    <title>Muhammad Indra</title>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar.css')}}">
<body>

	<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">{{ Auth::user()->name }}</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if(Auth::user()->name === 'Marketing')
				<li class="active"><a href="{{url('admin/home')}}">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li ><a href="{{url('admin/user_profile')}}">User<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li ><a href="{{url('admin/merchandise_profile')}}">Barang<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-shopping-bag fa-1x"></span></a></li>				
				<li><a href="{{ url('admin/cek_barang_order') }}">Cek Order Barang<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-inbox fa-lg"></span></a></li>
				<li ><a href="{{ url('admin/laporan') }}">Laporan order barang<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-check-circle"></span></a></li>
				<li ><a href="{{ url('/logout') }}">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-sign-out"></span></a>
					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                    </form>

				</li>
				@endif
				@if(Auth::user()->name === 'Mananger')
				<li class="active"><a href="{{url('admin/home')}}">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li ><a href="{{ url('admin/laporan') }}">Laporan order barang<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-check-circle"></span></a></li>
				<li ><a href="{{ url('/logout') }}">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-sign-out"></span></a>
					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                    </form>

				</li>
				@endif

			</ul>
		</div>
	</div>
</nav>
<div class="main">
<!-- Content Here -->
</div>

	<script type="text/javascript" src="{{asset('js/sidebar.js')}}"></script>
@yield('sidebar')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
</body>
</html>
