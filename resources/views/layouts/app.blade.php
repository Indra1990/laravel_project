<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
    .navbar-custom {
    background-color: #3097D1 !important;
    }
    .navbar-color{
    color: #FFFFFF !important;

    }
     
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Muhammad Indra</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-custom navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed navbar-color" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::check())

                    <a class="navbar-brand navbar-color" href="{{ url('barang_order/') }}">
                        Order Barang
                    </a>
                    <a class="navbar-brand navbar-color" href="{{ url('/riwayat/history/'. Auth::user()->id) }}">
                        History
                    </a>
                    <a class="navbar-brand navbar-color" href="{{ url('/profile') }}">
                        Profile
                    </a>
                    @endif

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar --> 
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/register') }}"></a></li>
                            <li><a href="{{ url('/login') }}"></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle navbar-color" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Hi {{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                   

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
