@extends('layouts.header-footer')

@section('body')

<br><br><br><br>
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-4">
        <center><h2>Sign Up</h2></center><br>
<form class="register-frm frm" id="register-frm2" action="{{ route("login") }}" method="post">
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
    <input type="submit" class="btn ui-btn info" value="SIGN UP">
</div>
</form>
</div>
</div>

@endsection