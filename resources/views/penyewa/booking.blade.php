@extends('layouts.header-footer')

@section('body')


<!--dashboard content-->
<div class="slide-container" style="margin-left:110px">
    <div class="dashboard-content">

      <!--my listings-->
        <div class="holder" style="margin:0%">
            <div class="top-part"><strong>My Booking</strong><i class="fa fa-list"></i></div>
            @foreach($bookings as $i => $booking)
            <div class="my-listing" style="padding:1rem;">
                <div class="row">
                    <div class="col-lg-6">
                            <h5><a href="/detailStudio/{{$booking->studio->studioMusik->id}}">{{$booking->studio->studioMusik->nama_studio_musik}}</a> -> <a href="/bookStudio/{{$booking->studio->id}}">{{$booking->studio->nama_studio}}</a></h5>
                    </div>
                    <div class="col-lg-6">
                            <span> <em>Status : {{$booking->status}}</em></span> <br>
                           
                        </div>
                        
                </div>
                <div class="row">
                        <div class="col-lg-6">
                                
                                <div class="rating-stars">
                                        <em>{{$booking->tgl_booking}}, dari {{$booking->jamMulai->jam}} sampai {{$booking->jamSelesai->jam}}</em>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <span> <em>Kode : {{$booking->kode_unik}}</em></span>
           
                                </div>
                             </div>
                
                
            </div>
            @endforeach
        </div>
            <!--end my listings-->

            <div class="ui-pagination">
                    {{$bookings->links()}}
                </div>
    </div>
</div>
<!--end dashboard content-->

@endsection
