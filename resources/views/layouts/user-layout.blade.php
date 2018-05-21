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
                        <a href="#" data-frm="login-frm" id="login-frm" class="tab active">Login</a>
                        <a href="#" data-frm="register-frm" id="register-frm" class="tab">Register</a>
                    </div>
                    <form class="login-frm frm" id="login-frm2" action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email1">Email:</label>
                            <input type="email" required name="email" autocomplete="email" id="email1">
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password:</label>
                            <input type="password" required name="password" id="pass1">
                        </div>
                        <div class="remember-me">
                            <div>
                                <input type="checkbox" id="test1" name="remember" />
                                <label for="test1">Remember Me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="sub-btn">
                            <input type="submit" class="btn ui-btn info" value="SIGN IN">
                        </div>
                    </form>
                    <form class="register-frm frm hide" id="register-frm2" action="{{ route("penyewa.store") }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" required name="nama_penyewa">
                        </div>
                        <div class="form-group">
                            <label for="email2">Email:</label>
                            <input type="email" required name="email" autocomplete="email" id="email2">
                        </div>
                        <div class="form-group">
                            <label for="pass3">Password:</label>
                            <input type="password" required name="password" id="pass3">
                        </div>
                        <div class="form-group">
                            <label for="pass2">Confirm Password:</label>
                            <input type="password" required name="password_confirmation" id="pass2">
                        </div>
                        <div class="sub-btn">
                            <input type="submit" class="btn ui-btn info" value="REGISTER">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
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
                    @if(Auth::user()->previlege==1)
                    <li><a href="{{ route('studioMusik.index') }}">Studio Dashboard</a></li>
                    @endif
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

<!--side menu-->
<div class="side-nav">
    <div class="dash-logo">
        <i class="fa fa-times cls-nav"></i>
        <h2>Harmon</h2>
    </div>
    <div class="links-container">
        <div class="panel-user">
            <div class="panel-user-img">
                <img src="{{ asset('/image/user/'.Auth::user()->foto_user) }}" alt="">
            </div>
            <a href="#"><strong>{{Auth::user()->name}}</strong></a>
        </div>
        <ul class="list-unstyled dash-links">
            <li><a href="{{ route('studioMusik.index') }}" class="{{ Request::is('studioMusik') ? 'active' : '' }}"><i class="fa fa-th-large"></i> <span>Dashboard</span></a></li>
            <li><a href="/userBooking" class="{{ Request::is('userBooking/') ? 'active' : '' }}"><i class="fa fa-drivers-license-o"></i> <span>My Bookings</span></a></li>
            <li><a href="/userProfile" class="{{ Request::is('userProfile/') ? 'active' : '' }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
        </ul>
        <div class="logout"><a href="index.html">Logout</a></div>
    </div>
</div>
<!--end side menu-->
@section('body')
    @show


<!--footer section-->
<div class="footer">
    <div class="row">
        <div class="col-lg-2 col-md-6">
            <div class="footer-sec">
                <h6>Who We Are</h6>
                <a href="#">About Us</a>
                <a href="#">Careers</a>
                <a href="#">Feature Tour</a>
                <a href="#">Presentation</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="footer-sec">
                <h6>Support</h6>
                <a href="#">Knowledge Base</a>
                <a href="#">Video Guides</a>
                <a href="#">Report an Issue</a>
                <a href="#">Terms of Use</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="footer-sec">
                <h6>Contact Us</h6>
                <a href="mailto:someone@example.com">someone@example.com</a>
                <span>10100 thuy NY</span>
                <span>+1 285 6658 5476215</span>
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
                <h6>News Letter</h6>
                <span>Subscribe to our newsletter and getter some cool staff every week.</span>
                <form action="http://serv.neonweb.me/" method="post">
                    <input type="email" required placeholder="Your Email Here">
                    <button type="submit" class="btn ui-btn dark-blue"><i class="fa fa-send-o"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-strip">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h3 class="footer-logo">Harmon</h3>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav>
                    <a href="#">Apps</a>
                    <a href="#">Science</a>
                    <a href="#">Services</a>
                    <a href="#">Nature</a>
                    <a href="#">Creative</a>
                    <a href="#">Search</a>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <p class="copyright"><i  class="fa fa-copyright"></i> 2017 - todate Ui-DesignLab</p>
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