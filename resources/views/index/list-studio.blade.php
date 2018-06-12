@extends('layouts.header-footer')

@section('body')
<form action="{{ route('home.listStudio')}}" style="width:100%">
<div class="content-wrapper">

    <!--banner-->
    <div class="listings-banner">
        <br>
        <div class="row">
            @if(isset(Auth::user()->previlege))
                @if(Auth::user()->previlege!=1)
                    <h1 style="color:white">Punya Studio Musik?&nbsp</h1>
                    <a href="{{ route('home.regisStudio') }}"><button type="button" class="btn btn-outline-warning">Daftarkan Studio</button></a>
                @else
 
                @endif
            @else 
                <h1 style="color:white">Punya Studio Musik?&nbsp</h1>
                <a href="{{ route('home.regisStudio') }}"><button type="button" class="btn btn-outline-warning">Daftarkan Studio</button></a>
            @endif
        </div>            
        
            <div class="select-fields">
                <div class="sel">
                    <input type="text" value="@if(isset($keyword)) {{$keyword}} @endif" name="keyword" style="margin-bottom:0px" placeholder="Cari">
                </div>
                <div class="sel">
                    <input type="text" id="input" value="@if(isset($lokasi2)) {{$lokasi2}} @endif" name="lokasi" style="margin-bottom:0px" placeholder="Lokasi">
                </div>
                <button type="submit" class="btn ui-btn dark-blue">Submit</button>
            </div>
    </div>
    <!--end banner-->

    <!--switcher-->
   
    <!--end switcher-->

    <!--listings-->
        <div class="listings">
            <div class="row">        
                <div class="col-lg-9 col-md-12">
                    @if(count($studioMusiks)==0)
                        <center><h4>Hasil Tidak Ditemukan</h4></center>
                    @else 
                    @foreach($studioMusiks as $i => $studioMusik)
                    <div class="col-lg-12 col-md-12" style="cursor: pointer;" onclick="window.location='{{ route("index.detailStudio", ['id' => $studioMusik->id]) }}'">
                        <div class="listing-two-item">
                            <div class="cover-photo">
                                <img style="height:200px" src="{{ asset('/image/studio-musik/'.$studioMusik->foto_studio_musik) }}" alt="">
                                <div class="cover-photo-hover">
                                   
                                </div>
                            </div>
                            <div class="listing-two-item-info">
                                
                                <strong>{{$studioMusik->nama_studio_musik}}</strong>
                                <div style="height:120px;">
                                <p>
                                        {{ $studioMusik->lokasi }}
                                </p>
                                </div>
                                <div class="rating-bt">                        
                                    <div class="rating-stars">
                                        <i class="fa fa-dollar yel"></i>
                                        <span style="color:#337ab7; font-size:16px;">Mulai dari Rp.@if(isset($studioMusik->studio[0]->biaya_booking)){{ $studioMusik->studio[0]->biaya_booking }}@endif/jam</span>
                                    </div>
                                    <a href="{{ 'detailStudio/'.$studioMusik->id }}"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-lg-3 col-md-12">
                        <div class="sidebar">
                        <h4>Filters</h4>
                        
                            <select name="harga" title="Service" class="wide">
                                <option @if(!isset($harga)) {{"selected"}}  @endif value="">Semua Harga</option>
                                <option @if(isset($harga)) @if($harga==1) {{"selected"}} @endif @endif value="1">< Rp.50.000</option>
                                <option @if(isset($harga)) @if($harga==2) {{"selected"}} @endif @endif value="2">Rp.50.000 - Rp.100.000</option>
                                <option @if(isset($harga)) @if($harga==3) {{"selected"}} @endif @endif value="3">Rp.100.000 - Rp.200.000</option>
                                <option @if(isset($harga)) @if($harga==4) {{"selected"}} @endif @endif value="4">> Rp.200.000</option>
                        
                            </select>
{{--                            
                            <label> Waktu</label>
                            <div class="row">
                                <div class="col-lg-12 col-md-12" >
                                    <select name="tgl_booking" class="form-control" style="width:100%; height:50px" id="book-day">
                                        <option>-- Tanggal Booking --</option>
                                        @foreach($dates as $i => $date)
                                            <option value="{{$date}}">{{$date}}</option>
                                        @endforeach
                                    <select>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6 col-md-3">
                                    <input type="text" class="timepicker" placeholder="Dari" id="book-start" name="mulai_booking">
                                </div>
                                <div class="col-lg-6 col-md-3">
                                    <input type="text" class="timepicker" placeholder="Selesai" id="book-end" name="selesai_booking">
                                </div>
                            </div> --}}
                            
                        
                        
                        
                        <button type="submit" class="btn ui-btn btn-block dark-blue">Update</button>
                    </div>
                 
                </div>
            </div>
            @if(count($studioMusiks)==0)
            @else
            
            <div class="ui-pagination">
                {{$studioMusiks->appends(['keyword' => $keyword])->appends(['lokasi' => $lokasi2])->appends(['harga' => $harga])->links()}}
            </div>   
            @endif 
        </div>
    <!--end listings-->

</div>
</form>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM" async defer>
</script>
  <script src="{{ asset('js/jquery.geocomplete.js')}}"></script>
  <script>
      $("#input").geocomplete();  // Option 1: Call on element.
        </script>
@endsection