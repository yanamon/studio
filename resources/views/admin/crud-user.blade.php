@extends('layouts.admin-layout')

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
                    <h4 class="card-title">List User</h4>

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
									<th>Email</th>
									<th>Telp</th>	
									<th>Aksi</th>
								</thead>
								<tbody>
								@foreach($users as $i => $user)
									   <tr>
                                       <td>{{$i+1}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->telp}}</td>
										<td><center>											
											@if($user->banned==1)
												<a href="{{route("admin.unbanUser")}}"
													onclick="event.preventDefault();document.getElementById('unbanUser{{$user->id}}').submit();">
													<i class="fa fa-ban" style="color:red; font-size:20px;"></i>
												</a>
												<form id="unbanUser{{$user->id}}" action="{{route("admin.unbanUser")}}" method="POST" style="display: none;">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{$user->id}}">
                                                </form>
                                            @else 
                                                <a href="{{route("admin.banUser")}}"
                                                    onclick="event.preventDefault();document.getElementById('banUser{{$user->id}}').submit();">
                                                    <i class="fa fa-times" style="color:red; font-size:20px;"></i>
                                                </a>
                                                <form id="banUser{{$user->id}}" action="{{route("admin.banUser")}}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$user->id}}">
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
