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

<!--top navbar-->
<nav class="ui-nav">
    <div class="logo"><a href="{{route("home")}}">Harmon</a></div>
    <ul class="list-unstyled menu">
       
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