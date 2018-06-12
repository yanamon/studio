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
                        <div class="top-part"><strong>Tambah Studio</strong><i class="fa fa-edit"></i></div>
                        <form class="edit-profile" action="{{ route('studio.store') }}" method="post" enctype="multipart/form-data">
                           
                            {{ csrf_field() }}
                        <input type="hidden" name="id_studio_musik" value="{{$id_studio_musik}}" id="">
                            <div class="form-group">
                                <input  name="nama_studio" required type="text" class="form-control" placeholder="Nama Studio">
                            </div>
                            <div class="form-group">
                                <input name="biaya" required  class="form-control" placeholder="Biaya Booking">
                            </div>
                            <div class="form-group">
                                <input name="deskripsi" required type="tel" class="form-control" placeholder="Deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="msg">Upload Foto Studio</label>
                                <input type="file" data-preview="#preview" name="foto_studio_musik" value="gambar">
                            </div>
                            <button class="btn" type="submit">Tambah <i class="fa fa-save"></i></button>
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
