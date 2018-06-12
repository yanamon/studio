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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <style>
        #col-10{
            padding-left : 40px;
            padding-right : 20px;
            padding-bottom : 20px;
        }    
    </style>
    @section('css')
	@show
    <!--end stylesheets-->

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Raleway|Tangerine" rel="stylesheet">
    <!--end google fonts-->
</head>

<body>

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
            {{-- <li><a href="{{ route('studioMusik.index') }}" class="{{ Request::is('studioMusik') ? 'active' : '' }}"><i class="fa fa-th-large"></i><span>Studio Musik</span></a></li> --}}
            <li><a href="{{ route('studioMusik.index') }}" class="{{ Request::is('studioMusik') ? 'active' : '' }}"><i class="fa fa-th-large"></i><span>Studio Musik</span></a></li>
            <li><a href="/selesaiBooking" class="{{ Request::is('selesaiBooking') ? 'active' : '' }}"><i class="fa fa-th-large"></i><span>Studio Booking</span></a></li>
        </ul>
        <div class="logout"> <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout</a></div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
    </div>
</div>
<!--end side menu-->
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
            <div class="col-lg-2 col-md-3">
                
            </div>
            <div class="col-lg-7 col-md-6">
                <h3 class="footer-logo">Harmon</h3>
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
<script src="{{ asset('3rdparty/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('3rdparty/js/popper.js') }}"></script>
<script src="{{ asset('3rdparty/js/bootstrap.js') }}"></script>
<script src="{{ asset('3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script>
<script src="{{ asset('3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js') }}"></script>
<script src="{{ asset('3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

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

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    } );
</script>
@section('script')
    @show
<!--end script-->
<?php Session::forget('validate'); ?> 

</body>
</html>