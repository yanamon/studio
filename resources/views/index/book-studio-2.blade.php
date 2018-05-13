@extends('layouts.header-footer')

@section('body')
<br><br>

<div class="content-wrapper">

        <!--header-->
    <form action="{{ route('booking.store') }}" id="form-booking" method="post">
        {{ csrf_field() }} 
        <input type="hidden" name="id_studio" value="{{$id_studio}}">
        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
        <input type="hidden" name="hari_tgl_booking" value="{{$tgl_booking}}">
        <input type="hidden" name="mulai_booking" value="{{$mulai_booking}}">
        <input type="hidden" name="selesai_booking" value="{{$selesai_booking}}">
        <input type="hidden" name="biaya_booking" value="{{$biaya_booking}}">
        <header class="head">
            <h1>Your <strong>Bookings</strong></h1><br>
            <div class="row" style="width:100%">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <label>Studio Musik</label>
                </div>
                <div class="col-lg-1">
                    <label>:</label>
                </div>
                <div class="col-lg-5">
                    <label>{{$studioMusik->nama_studio_musik}}</label>
                </div>
            </div>
            <div class="row" style="width:100%">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <label>Studio</label>
                </div>
                <div class="col-lg-1">
                    <label>:</label>
                </div>
                <div class="col-lg-5">
                    <label>{{$studio->nama_studio}}</label>
                </div>
            </div>
            <div class="row" style="width:100%">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <label>Tanggal Booking</label>
                </div>
                <div class="col-lg-1">
                    <label>:</label>
                </div>
                <div class="col-lg-5">
                    <label>{{$tgl_booking}}</label>
                </div>
            </div>
            <div class="row" style="width:100%">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <label>Dari Jam</label>
                </div>
                <div class="col-lg-1">
                    <label>:</label>
                </div>
                <div class="col-lg-5">
                    <label>{{$mulai_booking}}</label>
                </div>
            </div>
            <div class="row" style="width:100%">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <label>Sampai Jam</label>
                </div>
                <div class="col-lg-1">
                    <label>:</label>
                </div>
                <div class="col-lg-5">
                    <label>{{$selesai_booking}}</label>
                </div>
            </div>
            <div class="row" style="width:100%">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <label>Biaya</label>
                </div>
                <div class="col-lg-1">
                    <label>:</label>
                </div>
                <div class="col-lg-5">
                    <label>Rp. {{$biaya_booking}}</label>
                </div>
            </div>
            <br>
            <div class="price-switcher">
                <a class="active" href="{{ '/bookStudio/'.$studio->id }}"><i style="color:white" class="fa fa-angle-double-left"></i> Back</a>
                <a href="javascript:{}" onclick="document.getElementById('form-booking').submit();">
                    Submit <i class="fa fa-angle-double-right"></i></a>
            </div>
        </header>
        <!--end header-->
    </form>
</div>

@endsection

