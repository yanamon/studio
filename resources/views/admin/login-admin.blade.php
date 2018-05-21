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

<br><br><br><br><br>
<div id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-body">
    <div class="auth-wrapper">
			<div class="form-tabs">
				<a href="#" data-frm="login-frm" id="login-frm" class="tab active">Admin Login</a>
			</div>
			<form class="login-frm frm" id="login-frm2" action="{{ route('admin.login') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="email1">Email:</label>
					<input required name="email" autocomplete="email" id="email1">
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
		</div>
</div>
</div>
</div>


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
{{-- https://code.jquery.com/jquery-1.12.4.js
https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js --}}
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    } );
</script>
@section('script')
    @show
<!--end script-->

</body>
</html>
