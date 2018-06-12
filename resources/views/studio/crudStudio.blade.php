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
                    <h4 style="margin-bottom:30px" class="card-title">List Studio Musik
                    <a href="{{ route('studio.createStudio', $studioMusik->id) }}"><button class="btn btn-outline-success" style="float:right;">Tambah Studio</button></a>
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
									<th>Nama</th>
                                    <th>Biaya Booking</th>
                                    <th>Deskripsi Studio</th>	
									<th>Aksi</th>
								</thead>
								<tbody>
								@foreach($studios as $i => $studio)
									   <tr>
                                       <td>{{$i+1}}</td>
										<td>{{$studio->nama_studio}}</td>
										<td>{{$studio->biaya_booking}}</td>
										<td>{{$studio->deskripsi_studio}}</td>
										<td><center>											
											@if($studio->banned==1)
												<a href="{{route("admin.unbanUser")}}"
													onclick="event.preventDefault();document.getElementById('unbanUser{{$studio->id}}').submit();">
													<i class="fa fa-ban" style="color:red; font-size:20px;"></i>
												</a>
												<form id="unbanUser{{$studio->id}}" action="{{route("admin.unbanUser")}}" method="POST" style="display: none;">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{$studio->id}}">
                                                </form>
                                            @else 
                                                <a href="{{ route('studio.studioPreview', $studio->id) }}">
                                                    <i class="fa fa-eye" style="color:#337ab7; font-size:20px;"></i>
                                                </a>

                                                <a href="{{ route('studio.edit', $studio->id) }}">
                                                    <i class="fa fa-pencil-square-o" style="color:#337ab7; font-size:20px;"></i>
                                                </a>

                                                <a data-id="{{ $studio->id }}" href="#" class="hapus" data-toggle="modal" data-target="#modal-hapus">
                                                    <i class="fa fa-trash" style="color:#337ab7; font-size:20px;"></i>
                                                </a>
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

    <div id="modal-hapus" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <center>	
                <div class="modal-header">
                    <h4 class="modal-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hapus Studio Ini?</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="delete-form">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button class="btn btn-info" data-dismiss="modal">&nbsp;Batal&nbsp;</button>	
                    </form>
                </div>
                </center>
            </div>
        </div>
    </div>

@endsection

@section('script')
	<script>
		$(document).on("click", ".hapus", function () {
			var id = $(this).data('id');
			var link = '/hapusStudio/' + id;
			$('#delete-form').attr("action", link);
		});
	</script>
@endsection