@extends('layouts.header-footer')

@section('body')
	<div class="form">
		<div id="login">   
			<h1>Welcome!</h1>		
			<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
				<div class="field-wrap">
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label>Email Address<span class="req">*</span></label>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>      
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
					<br>
					<div class="or-box">
						<center><span class="or">OR</span></center>
						<br>
					</div>
			</form>
			<a href="{{route("penyewa.create")}}"><button class="button button-block"/>Daftar Sebagai User</button></a></div>
		</div><!-- tab-content -->
	</div> <!-- /form -->
@endsection
