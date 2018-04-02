<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Studio</title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/regis.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
	
	@section('css')
	@show
</head>
<body>
    @auth
        @if(Auth::user()->previlege==1)
            @if((Auth::user()->verified==0 || Auth::user()->confirmed==0))
                <nav style="background-color: white; padding-top: 10px; padding-bottom: 15px;">
                    <h5>
                        @if(Auth::user()->verified==0)
                            Cek email anda untuk verifikasi,
                            <a href="{{route("studioMusik.resendVerifikasi")}}"
                                onclick="event.preventDefault();
                                         document.getElementById('resendVerifikasi').submit();">
                                kirim ulang verifikasi?</a>
                            <form id="resendVerifikasi" action="{{route("studioMusik.resendVerifikasi")}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>|
                        @endif
                        @if(Auth::user()->confirmed==0)
                            Studio anda belum dikonfirmasi oleh admin
                        @endif
                    </h5>
                </nav>
            @endif
        @endif	
    @endauth
	<nav>
    	<ul>
    		<div id="warna"><h1>STUDIO OF MUSIC</h1></div>
            <li><a href="{{route("home")}}">Home</a></li>
			@guest
                <li><a href="{{route("login")}}">Masuk</a></li>
				<li><a href="{{route("home.")}}">Daftar Studio</a></li> 
            @else
                @if(Auth::user()->previlege==1)
                    <li><a href="{{route("studioMusik.index")}}">Dashboard</a></li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ str_limit(Auth::user()->name, 50) }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li><a href="">Profil</a></li>
                    </ul>
                </li>  
            @endguest 
            
            
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


