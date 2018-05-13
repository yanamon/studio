@extends('layouts.admin-layout')

@section('body')
<!--top bar-->
<div class="top-bar">
	<div class="slide-container">
		<div class="top-strip">
			<i class="fa fa-angle-left fa-2x side-nav-toggle"></i>
		</div>
		<div class="bottom-strip">
			<a href="index.html">Home</a> <i class="fa fa-angle-right"></i>
			<a href="dashboard.html">&nbsp Dashboard</a>
		</div>
	</div>
</div>
<!--end top bar-->
<div class="slide-container">
<div class="dashboard-content">
<div class="container">
	<div class="row">	
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-bordered" style="background-color: white;">
					<thead>
						<th>Studio</th>
						<th>Pemilik</th>
						<th>Telp</th>			
						<th>No KTP</th>
						<th>Lokasi</th>
						<th>Aksi&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
					</thead>
					<tbody>
					@foreach($users as $i => $user)
				   		<tr>
				        	<td>{{$user->studioMusik->nama_studio_musik}}</td>
				        	<td>{{$user->penyewa->nama_penyewa}}</td>
				        	<td>{{$user->studioMusik->telp_studio}}</td>
				        	<td>{{$user->studioMusik->no_ktp}}</td>
				        	<td>{{$user->studioMusik->lokasi}}</td>
							<td>
					        	@if($user->confirmed==0)		
					        		<a href="{{route("admin.confirmStudio")}}"
		                                onclick="event.preventDefault();document.getElementById('confirmStudio{{$user->id}}').submit();">
		                                <i class="fa fa-square-o" style="color:#337ab7; font-size:20px;"></i>
		                            </a>
		                            <form id="confirmStudio{{$user->id}}" action="{{route("admin.confirmStudio")}}" method="POST" style="display: none;">
		                                {{ csrf_field() }}
		                                <input type="hidden" name="id" value="{{$user->id}}">
									</form>
									<a href="{{route("admin.banStudio")}}"
		                                onclick="event.preventDefault();document.getElementById('banStudio{{$user->id}}').submit();">
		                                <i class="fa fa-circle" style="color:#337ab7; font-size:20px;"></i>
		                            </a>
		                            <form id="banStudio{{$user->id}}" action="{{route("admin.banStudio")}}" method="POST" style="display: none;">
		                                {{ csrf_field() }}
		                                <input type="hidden" name="id" value="{{$user->id}}">
		                            </form>
								@elseif($user->confirmed==1)
									<a href="{{route("admin.unconfirmStudio")}}"
		                                onclick="event.preventDefault();document.getElementById('unconfirmStudio{{$user->id}}').submit();">	                
		                                <i class="fa fa-check-square-o" style="color:#337ab7; font-size:18px;"></i>
		                            </a>
		                            <form id="unconfirmStudio{{$user->id}}" action="{{route("admin.unconfirmStudio")}}" method="POST" style="display: none;">
		                                {{ csrf_field() }}
		                                <input type="hidden" name="id" value="{{$user->id}}">
									</form>
									<a href="{{route("admin.banStudio")}}"
		                                onclick="event.preventDefault();document.getElementById('banStudio{{$user->id}}').submit();">
		                                <i class="fa fa-circle" style="color:#337ab7; font-size:20px;"></i>
		                            </a>
		                            <form id="banStudio{{$user->id}}" action="{{route("admin.banStudio")}}" method="POST" style="display: none;">
		                                {{ csrf_field() }}
		                                <input type="hidden" name="id" value="{{$user->id}}">
		                            </form>
								@elseif($user->confirmed==2)
									<a href="{{route("admin.unbanStudio")}}"
										onclick="event.preventDefault();document.getElementById('unbanStudio{{$user->id}}').submit();">
										<i class="fa fa-ban" style="color:#337ab7; font-size:20px;"></i>
									</a>
									<form id="unbanStudio{{$user->id}}" action="{{route("admin.unbanStudio")}}" method="POST" style="display: none;">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{$user->id}}">
									</form>
								@endif		
					        		
								<a href="/detailStudio/{{$user->id}}"><i class="fa fa-eye"></i></a>
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
