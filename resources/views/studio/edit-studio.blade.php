@extends('layouts.user-layout')

@section('body')

<!--dashboard content-->
<div class="slide-container" style="margin-left:110px">
    <div class="dashboard-content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
        <!--client reviews-->
        <div class="dash-profile">
            <div class="row">
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-8">
                    <div class="holder" style="margin:0%">
                        <div class="top-part"><strong>Edit Studio</strong><i class="fa fa-edit"></i></div>
                        <form class="edit-profile" action="{{ route('studio.update', $studio->id) }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_METHOD" value="PUT">
                            {{ csrf_field() }}
                            {{ method_field("PUT") }}
                        <input type="hidden" name="id_studio" value="{{$studio->id}}" id="">
                            <div class="form-group">
                                <input value="{{$studio->nama_studio }}" name="nama_studio" required type="text" class="form-control" placeholder="Nama Studio">
                            </div>
                            <div class="form-group">
                                <input value="{{$studio->biaya_booking }}" name="biaya" required  class="form-control" placeholder="Biaya Booking">
                            </div>
                            <div class="form-group">
                                <input value="{{$studio->deskripsi_studio }}" name="deskripsi" required type="tel" class="form-control" placeholder="Deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="msg">Upload Foto Studio</label>
                                <input onchange="$('#nama_foto').val('upload')" type="file" data-preview="#preview" name="foto_studio_musik" value="gambar">
                            </div>
                          <input id="nama_foto" type="hidden" value="{{$studio->foto_studio}}" name="nama_foto_studio_musik">
           
                            <button class="btn" type="submit">Save Changes <i class="fa fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end client reviews-->

     
    </div>
</div>
    </div>
</div>
<!--end dashboard content-->

@endsection
