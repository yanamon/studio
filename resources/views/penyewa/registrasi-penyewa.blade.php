@extends('layouts.header-footer')

@section('body')
	<div id="regis_user">
		<h2><center>Daftar Sebagai User</center></h2></br>

		<form action="{{ route("penyewa.store") }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group has-feedback">
	    		<i class="form-control-feedback glyphicon glyphicon-user"></i><input class="form-control" type="text" name="nama_penyewa" id="nm_depan" placeholder="Nama Anda/Nama Band*">
	    	</div>

	    	<div class="form-group has-feedback">
				<i class="form-control-feedback glyphicon glyphicon-envelope"></i><input type="email" class="form-control" name="email" id="email_u" placeholder="Email*">
			</div>

			<div class="form-group has-feedback">
				<i class="form-control-feedback glyphicon glyphicon-lock"></i><input type="password" class="form-control" name="password" id="pass_u" placeholder="Password*">
			</div>

			<div class="form-group has-feedback">
				<i class="form-control-feedback glyphicon glyphicon-lock"></i><input type="password" class="form-control" name="password_confirmation" id="pass_u" placeholder="Ketik Ulang Password*">
			</div>

			<div class="form-group has-feedback">
				<i class="form-control-feedback glyphicon glyphicon-earphone"></i><input type="number" class="form-control" name="telp" id="telp" placeholder="Nomor HP/Telp*">
			</div><br>

			<h4><b><button type="submit" class="button button-block" name="submit" value="Kirim">SUBMIT</button></b></h4>
		</form>
	</div>
@endsection