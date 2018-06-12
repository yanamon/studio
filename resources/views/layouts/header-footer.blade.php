<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!--meta tags-->
    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--end meta tags-->

    <title>Harmon</title>

    <!--stylesheets-->
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/jquery-nice-select-1.1.0/css/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/OwlCarousel2-2.2.1/owl.theme.green.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('3rdparty/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    @section('css')
	@show
    <!--end stylesheets-->

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Raleway|Tangerine" rel="stylesheet">
    <!--end google fonts-->
</head>

<body>
<!-- Login/register Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="auth-wrapper">
                    <div class="form-tabs">
                        <a href="#" data-frm="login-frm" id="login-frm" class="tab active">Login User</a>
                        <a href="#" data-frm="register-frm" id="register-frm" class="tab">Login Studio</a>
                    </div>
                    <form class="login-frm frm" id="login-frm2" action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="previlege" value="0">
                        <div class="form-group">
                            <label for="email1">Email:</label>
                            <input type="email" required name="email" autocomplete="email" >
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password:</label>
                            <input type="password" required name="password" >
                        </div>
                        <div class="remember-me">
                            <div>
                                <input type="checkbox"  name="remember" />
                                <label for="test1">Remember Me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="sub-btn">
                            <input type="submit" class="btn ui-btn info" value="SIGN IN">
                        </div>
                    </form>
                    <form class="register-frm frm hide" id="register-frm2" action="{{ route("login") }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="previlege" value="1">
                        <div class="form-group">
                            <label for="email1">Email:</label>
                            <input type="email" required name="email" autocomplete="email">
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password:</label>
                            <input type="password" required name="password" >
                        </div>
                        <div class="remember-me">
                            <div>
                                <input type="checkbox" id="" name="remember" />
                                <label for="test1">Remember Me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="sub-btn" >
                            <input type="submit" class="btn ui-btn info" value="SIGN IN">
                        </div>
                    </form>
                    <div class="sub-btn" style="margin-top:-9px;margin-bottom:0px">
                        
                   <label><center>or</center></label>
                    </div>
                    <div class="sub-btn"  style="margin-top:-4px">
                    <input style="cursor: pointer;" onclick="window.location='{{ route("home.regisUser") }}'" class="login-frm frm btn ui-btn info" type="button"  value="SIGN UP">
                    <input style="cursor: pointer;" onclick="window.location='{{ route("home.regisStudio") }}'" class="register-frm frm hide btn ui-btn info" type="button" value="DAFTARKAN STUDIO">
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end Login/register Modal -->

<!--top navbar-->
<nav class="ui-nav">
    <div class="logo"><a href="{{route("home")}}">Harmon</a></div>
    <ul class="list-unstyled menu">
        <li class="list-inline-item menu-li"><a href="{{route("home")}}">Home</a></li>
        <li class="list-inline-item menu-li"><a href="{{route("home.listStudio")}}">Studio List</a></li>
        @guest
            <li class="list-inline-item menu-li"><a href="#" data-toggle="modal" data-target="#Modal">Login/Register</a></li>
        @else
        <li class="list-inline-item menu-li"><a href="#">{{ str_limit(Auth::user()->name, 30) }} <i class="fa fa-angle-down"></i></a>
                <ul class="list-unstyled drop">
                    
                    <li><a href="/userBooking">My Bookings</a></li>
                    <li><a href="/userProfile">Profile</a></li>
                    <li style="border-top: 1px solid gray;"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest 
    </ul>
    <i class="fa fa-bars open-menu"></i>
</nav>
<!--end top navbar-->


@section('body')
    @show


<!--footer section-->
<div class="footer">
    <div class="row">
        <div class="col-lg-2 col-md-6">
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="footer-sec">
                <h6>Our Team</h6>
                <a href="#">Uchiha Sasuke</a>
                <a href="#">Naruto Uzumaki</a>
                <a href="#">Sakura Haruno</a>
                <a href="#">Kakashi Hatake</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="footer-sec">
                <h6>Contact Us</h6>
                <a href="mailto:someone@example.com">harmon_studio@gmail.com</a>
                <span>Sanur, Denpasar Bali</span>
                <span>+6289 8737 9267</span>
                <div class="footer-social">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-facebook-f"></i>
                    <i class="fa fa-rss"></i>
                    <i class="fa fa-linkedin"></i>
                    <i class="fa fa-google-plus"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="footer-sec">
                <h6>About Us</h6>
                <span>Helping people discover splendid places around them, from every music studios, So you have all that you need to make a perfect choice..</span>
                
            </div>
        </div>
    </div>
    <div class="footer-strip">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h3 class="footer-logo">Harmon</h3>
            </div>
            <div class="col-lg-6 col-md-6">
               
            </div>
            <div class="col-lg-3 col-md-3">
                <p class="copyright"><i  class="fa fa-copyright"></i> 2018 - Praktikum-Prognet</p>
            </div>
        </div>
    </div>
</div>
<!--end footer section-->

<!--pre-loader-->
<div class="preloader"><span class="beacon"></span></div>
<!--end pre-loader-->

<!--script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('3rdparty/js/popper.js') }}"></script>
<script src="{{ asset('3rdparty/js/bootstrap.js') }}"></script>
<script src="{{ asset('3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script>
<script src="{{ asset('3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js') }}"></script>
<script src="{{ asset('3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@if(isset(Auth::user()->previlege))
@elseif(!empty(Session::get('validate')))
    @if(Session::get('validate') == 1)
        <script>
            $(function() {
                $('#Modal').modal('show');
            });
        </script>
    @elseif(Session::get('validate') == 2)
        <script>
            $(function() {
                $('.frm').addClass('hide');
                $('#register-frm2').removeClass('hide');
                $('.tab').removeClass('active');
                $('#register-frm').addClass('active')
                $('#Modal').modal('show');
            });
        </script>
    @endif
@endif
@section('script')
    @show
<!--end script-->
<?php Session::forget('validate'); ?> 

</body>
</html>