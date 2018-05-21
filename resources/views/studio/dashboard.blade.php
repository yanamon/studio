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

        <!--statistics-->
        <div class="statistics">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1>621 <span>Views</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1>153 <span>Reviews</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1>756 <span>Bookmarks</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1>17 <span>Listings</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <!--end statistics-->

        <div class="row">
            <div class="col-lg-8">
                <div class="holder">
                    <div class="graph">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="holder">
                    <div class="account-activity">
                        <div class="top-part"><strong>Account Activity</strong></div>
                        <div class="activity">
                            <div class="user-icon">
                                <img src="img/avatar.jpg" alt="">
                            </div>
                            <div class="act-info">
                                <strong>Megan</strong>
                                <em>sent message</em>
                            </div>
                            <i class="time">4 minutes ago</i>
                        </div>
                        <div class="activity smoke">
                            <div class="user-icon na">
                            </div>
                            <div class="act-info">
                                <strong>Carol</strong>
                                <em>commented</em>
                            </div>
                            <i class="time">16 minutes ago</i>
                        </div>
                        <div class="activity">
                            <div class="user-icon">
                                <img src="img/user.jpg" alt="">
                            </div>
                            <div class="act-info">
                                <strong>Brand</strong>
                                <em>orderd service</em>
                            </div>
                            <i class="time">36 minutes ago</i>
                        </div>
                        <div class="activity">
                            <div class="user-icon">
                                <img src="img/avatar2.jpg" alt="">
                            </div>
                            <div class="act-info">
                                <strong>Jacki</strong>
                                <em>sent message</em>
                            </div>
                            <i class="time">2 hrs ago</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end dashboard content-->
@endif
@endsection
