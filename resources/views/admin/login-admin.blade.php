@extends('layouts.admin-layout')

@section('body')
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
@endsection
