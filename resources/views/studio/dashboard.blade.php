@extends('layouts.header-footer')

@section('body')
	@if(Auth::user()->verified==0 || Auth::user()->confirmed==0)
		<h1>Dashboard Studio Musik tidak dapat diakses sebelum akun terverifikasi dan dikonfirmasi oleh admin</h1>
	@else
		<h1>Ini Dashboard Studio Musik</h1>
	@endif
@endsection
