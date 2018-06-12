@extends('layouts.user-layout')

@section('css')
    <style>
        input{
            height:30px;
            
        }
    </style>
@endsection

@section('body')


<div class="">
    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle" data-toggle="modal" data-target="#mymodal"><i class="ti-plus text-white"></i></button>
</div>

    <div class="container-fluid">
    <div class="row">
		<div class="col-2"></div>
        <div class="col-10" id="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 style="margin-bottom:30px" class="card-title">Studio Bookings
                        <div style="float:right;">
                            <form action="selesaiBooking">
                                <select name="id_studio_musik" id="" class="" style="float:right;" onchange="this.form.submit()">
                                    <option value="">--Semua Studio Musik--</option>
                                    @foreach($studioMusiks as $i => $studioMusik)
                                    <option value="{{$studioMusik->id}}" @if($studioMusik->id==$id_studio_musik) class="option selected" @endif>{{$studioMusik->nama_studio_musik}}</option>
                                    @endforeach
                            </select>
                            </form>
                        </div>
                    </h4>

                    {{-- @if(session()->has('message'))
					<div class="alert alert-success" role="alert">
						{{ session()->get('message') }}
					</div>
                    @endif --}}

                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered">
                                <thead class="thead-dark">
                                    <th>No</th>
                                    <th>Studio Musik</th>
									<th>Studio Room</th>
                                    <th>Nama User</th>
                                    <th>Tgl Booking</th>	
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>Biaya</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
								</thead>
								<tbody>
								@foreach($bookings as $i => $booking)
									   <tr>
                                       <td>{{$i+1}}</td>
                                       <td>{{$booking->nama_studio_musik}}</td>
										<td>{{$booking->nama_studio}}</td>
										<td>{{$booking->name}}</td>
										<td>{{$booking->tgl_booking}}</td>
										<td>{{$booking->mulai_booking}}</td>
										<td>{{$booking->selesai_booking}}</td>
                                        <td>{{$booking->biaya_booking}}</td>
                                        <td>{{$booking->status}}</td>
										<td><center>											
											@if($booking->status=="batal")
												<a href="#">
													<i class="fa fa-ban" style="color:red; font-size:20px;"></i>
                                                </a>
                                            @elseif($booking->status=="selesai")
                                                <a href="#">	
                                                    <i class="fa fa-check-square-o" style="color:green; font-size:18px;"></i>
												</a>
                                            @else 
                                                <a href="{{route("booking.confirm")}}"
                                                    onclick="event.preventDefault();document.getElementById('confirm{{$booking->id}}').submit();">
                                                    <i class="fa fa-square-o" style="color:#337ab7; font-size:20px;"></i>
                                                </a>
                                                <form id="confirm{{$booking->id}}" action="{{route("booking.confirm")}}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$booking->id}}">
                                                </form>

                                                <a href="{{route("booking.cancel")}}"
                                                    onclick="event.preventDefault();document.getElementById('cancel{{$booking->id}}').submit();">
                                                    <i class="fa fa-times" style="color:red; font-size:20px;"></i>
                                                </a>
                                                <form id="cancel{{$booking->id}}" action="{{route("booking.cancel")}}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$booking->id}}">
                                                </form>
                                            @endif	
                                            </center>											
										</td>
									</tr>
								@endforeach
								</tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
