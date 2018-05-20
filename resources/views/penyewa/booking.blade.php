@extends('layouts.user-layout')

@section('body')


<!--dashboard content-->
<div class="slide-container">
    <div class="dashboard-content">

      <!--my listings-->
        <div class="holder">
            <div class="top-part"><strong>My Booking</strong><i class="fa fa-list"></i></div>
            @foreach($bookings as $i => $booking)
            <div class="my-listing">
                <h5>{{$booking->studio->studioMusik->nama_studio_musik}} -> {{$booking->studio->nama_studio}}</h5>
                <span><i class="fa fa-check-circle-o text-success"></i> <em>{{$booking->status}}</em></span>
                <div class="rating-stars">
                    <em>{{$booking->tgl_booking}}, dari {{$booking->jamMulai->jam}} sampai {{$booking->jamSelesai->jam}}</em>
                </div>
            </div>
            @endforeach
        </div>
            <!--end my listings-->

        <!--dashboard footer-->
        <div class="dash-footer">
            <span>&copy; Serv: All Rights Reserved.</span>
        </div>
        <!--end dashboard footer-->

    </div>
</div>
<!--end dashboard content-->

@endsection
