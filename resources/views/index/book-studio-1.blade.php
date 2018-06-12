@extends('layouts.header-footer')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.timepicker.css')}}">
     <style>
        .unbooked{
            
        }

        .selected{
            background : rgba(204, 51, 255, 0.7);
        }

        .suggestion{
            background : rgba(92, 184, 92, 0.7);
        }

        .booked{
            background: rgba(252, 252, 105, 0.4);
        }
    </style>
@endsection
@section('body')
<nav class="ui-nav-2">
    <div class="contrainer-fluid">
        <form action="{{ route('booking.rekapBooking') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-3 col-md-4" style="color:red;">@if ($errors->any())
                        {{ implode('', $errors->all(':message')) }}
                @endif</div>
                <div class="col-lg-3 col-md-4" >
                    <select id="tgl_booking" name="tgl_booking" class="form-control" style="width:100%; height:50px" id="book-day">
                        <option>-- Tanggal Booking --</option>
                        @foreach($bookings as $i => $booking)
                            <option value="{{$dates[$i].", ".$booking[$i]->tgl_booking}}">{{$dates[$i].", ".$booking[$i]->tgl_booking}}</option>
                        @endforeach
                    <select>
                </div>
                <div class="col-lg-2 col-md-3">
                    <input type="text" class="timepicker" placeholder="Jam Mulai" id="book-start" name="mulai_booking">
                 
             
                </div>
                <div class="col-lg-2 col-md-3">
                    <input type="text" class="timepicker" placeholder="Jam Selesai" id="book-end" name="selesai_booking">
  
             
                </div>
                <div class="col-lg-2 col-md-2">
                    <input class="btn btn-outline-success" type="submit">
                </div>
                <input type="hidden" name="id_studio" value="{{$studio->id}}">
            </div>
        </form>
    </div>
</nav>

<div class="content-wrapper">

        <!--listing detail-->
        <div class="listing-detail">
    
            <!--main section-->
            <div class="detail-main-section">
                <div class="detail-cover-img">
                    <img style="height:450px" src="{{ asset('/image/studio/'.$studio->foto_studio) }}" alt="">
                    <div class="cover-shade">
                        
                        <h4>{{$studio->nama_studio}}</h4>
                        {{-- <strong><i class="fa fa-map-marker text-info"></i>{{$studioMusik->kota}}</strong> --}}
                    </div>
                </div>
                <div class="detail-action">
                    <strong><i class="fa fa-check-circle-o text-success"></i> Available Time</strong>
                    <div class="action">
                    </div>
                </div>
                <div class="detail-content">
                    <div class="reviews" style="margin-top:0px">
                        <div class="listings" style="padding:0rem 0rem" >
                            
                        </div>
                        <!--review form-->
                                            <!--end review form-->
    
                    </div>
    
                </div>
    
            </div>
            <!--end main section-->
    
            <!--aside section-->
            <aside class="detail-aside-section">
                <div class="box">
                    <div class="rating-b">
                        <p class="text-center" style="margin-bottom:0px; margin-top:20px;">Harga</p>
                        <h1 class="text-center">Rp.{{ $studio->biaya_booking }}</h1>
                       
                        <p class="text-center">/jam</p>
                    </div>
                </div>
                <div class="service-sidebar" style="height:280px">
                    <h4>Deskripsi</h4>
                    <hr>
                    <ul class="list-unstyled cont-info">
                        <li><span>{{$studio->deskripsi_studio}}</span></li>
                    </ul>
    
    
                </div>
            </aside>
            <!--end aside section-->
        </div>
        <!--listing detail-->
        <div class="content-wrapper" style="margin-top:-130px">

                <!--listing detail-->
                <div class="listing-detail">
            
              
                        <div class="row" style="width:102%; padding-left:12px">          
                @foreach($bookings as $i => $booking)
               
                <h4></h4>
                <table id="day{{$i}}" class="table table-bordered" style="background-color:white;">
                    <tr>
                        <th rowspan="12">{{$dates[$i]}}, {{$booking[$i]->tgl_booking}}</th>
                    </tr>
                    @foreach($booking as $j => $book)
                        @if($j==0||$j==14)<tr>@endif
                        <td id="jam{{$i.$j}}" class="@if($book->mulai_booking!=NULL){{"booked"}}@else{{"unbooked"}}@endif">{{ $book->jam }}</td>
                        @if($j==13||$j==27)</tr>@endif
                    @endforeach
                </table>
            
            @endforeach
        </div>
                    </div></div>
@endsection


@section('script')

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script>
    $('.timepicker').timepicker({
        timeFormat: 'H:i',
        step: 60,
        defaultTime: '11',
        minTime: '10:00',
        maxTime: '23:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
</script>


@endsection