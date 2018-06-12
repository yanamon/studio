@extends('layouts.header-footer')

@section('body')

<!--dashboard content-->
<div class="slide-container" style="margin-left:110px">
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
                                    <img src="{{ asset('/image/user/'.Auth::user()->foto_user) }}"  alt="">
                                </div>
                                <strong>{{Auth::user()->name}}</strong>
                            </div>
                            <hr>
                            <div class="client-contact-info">
                                <span>Email</span>
                                <i>{{Auth::user()->email}}</i>
                                <span>Phone</span>
                                <i>{{Auth::user()->telp}}</i>
                                <span>Address</span>
                                <i>{{Auth::user()->alamat}}</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="holder" style="margin:0%">
                        <div class="top-part"><strong>Edit Profile</strong><i class="fa fa-edit"></i></div>
                        <form class="edit-profile" action="{{ route('penyewa.update', Auth::user()->id) }}" method="post">
                            <input type="hidden" name="_METHOD" value="PUT">
                            {{ csrf_field() }}
                            {{ method_field("PUT") }}
                            <div class="form-group">
                                <input value="{{ Auth::user()->name }}" name="name" required type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input value="{{ Auth::user()->email }}" name="email" required type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input value="{{ Auth::user()->telp }}" name="telp" required type="tel" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input value="{{ Auth::user()->alamat }}" name="alamat" required type="text" class="form-control" placeholder="Address">
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

@endsection
