@extends('layouts.user-layout')

@section('body')

@if(Auth::user()->verified==0 || Auth::user()->confirmed==0 || Auth::user()->confirmed==2)
<div class="slide-container">
    <div class="dashboard-content">
		<h1>Dashboard Studio Musik tidak dapat diakses sebelum email diverifikasi dan akun dikonfirmasi oleh admin</h1>
        <br><br>
        <h2>
        @if(Auth::user()->confirmed==2) Registrasi studio anda ditolak oleh admin
                <a href="{{ route('studioMusik.regisUlangStudio') }}"><button class="btn btn-outline-warning">Daftarkan Ulang Studio</button></a>
        @else
            @if(Auth::user()->verified==0)
                Email anda belum diverifikasi,
                <a href="{{route("studioMusik.resendVerifikasi")}}"
                    onclick="event.preventDefault();
                                document.getElementById('resendVerifikasi').submit();">
                    kirim ulang verifikasi?</a><br>
                <form id="resendVerifikasi" action="{{route("studioMusik.resendVerifikasi")}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
            @if(Auth::user()->confirmed==0)
                Akun anda belum dikonfirmasi oleh admin
            @endif
        @endif
		</h2>
	</div>
</div>


@else


<!--dashboard content-->
<div class="slide-container">
    <div class="dashboard-content">

        <!--client reviews-->
        <div class="dash-profile">
            <div class="row">
                <div class="col-lg-4">
                    <div class="holder" style="margin:0%">
                        <div class="top-part"><strong>Profile Details</strong><i class="fa fa-user"></i></div>
                        <div class="client-info">
                            <div class="client-photo">
                                <div class="user-icon">
                                    <img src="img/avatar.jpg" alt="">
                                </div>
                                <strong>Nancy McKenzie</strong>
                                <em>San Francisco, CA</em>
                            </div>
                            <hr>
                            <div class="client-contact-info">
                                <span>Email</span>
                                <i>mackenzie@nancy.com</i>
                                <span>Phone</span>
                                <i>+1 658 5646 545</i>
                                <span>Address</span>
                                <i>Anderson Road 32-30</i>
                                <i>San Fransisco, CA</i>
                                <i>United States</i>
                                <span>Social</span>
                                <i><em class="fa fa-facebook-f"></em> <em>facebook.com</em></i>
                                <i><em class="fa fa-twitter"></em> <em>twitter.com</em></i>
                                <i><em class="fa fa-google-plus"></em> <em>google.com</em></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="holder" style="margin:0%">
                        <div class="top-part"><strong>Edit Profile</strong><i class="fa fa-edit"></i></div>
                        <form class="edit-profile" action="#" method="post">
                          <div class="form-group">
                              <input required type="text" class="form-control" placeholder="First Name">
                          </div>
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input required type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input required type="tel" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Address">
                            </div>
                            <button class="btn" type="submit">Save Changes <i class="fa fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end client reviews-->

     
    </div>
</div>
<!--end dashboard content-->

@endif
@endsection
