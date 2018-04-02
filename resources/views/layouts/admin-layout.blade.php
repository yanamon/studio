<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Studio</title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/regis.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

	
	@section('css')
	@show
</head>
<body>	
	<nav>
    	<ul>
    		<div id="warna">
    		<h1>STUDIO OF MUSIC</h1></div>
			
            @auth('admin')
                <li><a href="">Dashboard</a></li>
                <li><a href="{{route('admin.unconfirmedStudio')}}">Konfirmasi Studio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user('admin')->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li><a>Profil</a></li>
                    </ul>
                </li>
            @endauth
            
            
    	</ul>
                        
	</nav>
	
	@section('body')
	@show
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script  src="{{ asset('js/index.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	@section('script')
	@show
</body>
</html>


