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
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Konfirmasi Studio Musik</h4>

                    {{-- @if(session()->has('message'))
					<div class="alert alert-success" role="alert">
						{{ session()->get('message') }}
					</div>
                    @endif --}}

                        <div class="table-responsive">
                            <table id="table_id" class="table">
                                <thead class="thead-dark">
                                    <th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Telp</th>	
									<th>Aksi&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
								</thead>
								<tbody>
								@foreach($users as $i => $user)
									   <tr>
                                       <td>{{$i+1}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->telp}}</td>
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



<div id="mymodal" class="modal fade custom-modal modal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content po-relative">
           <div class="modal-body p-0 ">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="modal-bg">
                            <h1 class="font-light text-muted text-center" >
                                Form Input Barang
                            </h1>
                            <h6 class="subtitle m-t-20 text-center">
                                Masukkan Daftar Barang Sewa HMTI.
                            </h6>

                            <form class="form-material m-t-40" method="POST" action="{{-- route('barang.store') --}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input id="kd_brg" class="form-control" type="text" name="kd_brg" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input id="nama" class="form-control" type="text" name="nama" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <form class="p-r-20">
                                        <div class="form-group">
                                            <label class="control-label">Stok</label>
                                            <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="stok_brg"> </div>
                                    </form>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input id="hrg_brg" class="form-control" type="text" name="hrg_brg" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Upload Foto Profile</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file">
                                                <span name="foto_barang" class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="hidden">
                                                <input type="file" name="foto_barang"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-outline-success">Submit</button>
                                    </div>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
@endsection
@section('script')
    @parent
    <script>
        jQuery(document).ready(function() {
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'btn-xs ti-plus',
                verticaldownclass: 'btn-xs ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
        });
    </script>
    @if(session()->has('delete'))
    <script>
        $(document).ready(function(){
            deleteComplete();
        })
        function deleteComplete(){
            swal("Deleted!", "Datamu Sudah Terhapus.", "success")
        }
    </script>
    @endif

@endsection
