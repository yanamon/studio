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
                <div class="col-lg-3 col-md-4"></div>
                <div class="col-lg-3 col-md-4" >
                    <select name="tgl_booking" class="form-control" style="width:100%; height:50px" id="book-day">
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
  <div class="container-fluid">
      <br><br>
      <div class="listings" style="padding:0rem 0rem" >
        <div class="row">  
          <div class="col-lg-12 col-md-12">
              <div class="listing-two-item">
                  <div class="cover-photo">
                      <img style="height:180px" src="{{ asset('/image/studio-musik/'.$studio->foto_studio) }}" alt="">
                      <div class="cover-photo-hover">
                          <div class="share-like-two">
                              <a href="#"><i class="fa fa-heart-o"></i></a>
                              <a href="#"><i class="fa fa-share-alt"></i></a>
                              <a href="#"><i class="fa fa-bookmark-o"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="listing-two-item-info">
                      <div class="user-two-pic">
                          <img src="img/avatar2.jpg" alt="">
                      </div>
                      <strong>{{$studio->nama_studio}}</strong>
                      <p>
                              {{ $studio->deskripsi_studio }}
                      </p>
                      <div class="rating-bt">                        
                          <div class="rating-stars">
                              <i class="fa fa-dollar yel"></i>
                              <span style="color:#337ab7; font-size:16px;">Mulai dari Rp.50.000/jam</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>

 
    @foreach($bookings as $i => $booking)
        <h4></h4>
        <table id="day{{$i}}" class="table table-bordered" style="background-color:white;">
            <tr>
                <th rowspan="12"><br>{{$dates[$i]}}<br>{{$booking[$i]->tgl_booking}}<br>Available Time</th>
            </tr>
            @foreach($booking as $j => $book)
                @if($j==0||$j==16||$j==32)<tr>@endif
                <td id="jam{{$i.$j}}" class="@if($book->mulai_booking!=NULL){{"booked"}}@else{{"unbooked"}}@endif">{{ $book->jam }}</td>
                @if($j==15||$j==31||$j==47)</tr>@endif
            @endforeach
        </table>
    @endforeach

  </div>
</div>
@endsection

@section('script')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script>
        $('.timepicker').timepicker({
            timeFormat: 'H:i',
            interval: 60,
            defaultTime: '11',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
 
    
@endsection