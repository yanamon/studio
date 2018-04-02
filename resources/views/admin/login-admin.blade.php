@extends('layouts.admin-layout')

@section('body')
	<div class="form">
		<div id="login">   
			<h1>Admin Login</h1>		
			<form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                {{ csrf_field() }}
				<div class="field-wrap">
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label>Username<span class="req">*</span></label>
						<input id="email" type="text" class="form-control" name="email" required autofocus>      
					</div>
				</div>		
				<div class="field-wrap">
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label>Password<span class="req">*</span></label>
					<input id="password" type="password" class="form-control" name="password" required>
				</div>
					<br>
					<div class="checkbox">
					<label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}></label>
					<label for="remember"><i class="octicon octicon-check"></i> &nbspRemember all the things</label>
				</div>
				
				<p><label class="checkbox"></p></br></label>
				</div>
					<button type="submit" class="button button-block"/>Masuk</button>
			</form>
		</div><!-- tab-content -->
	</div> <!-- /form -->
@endsection
