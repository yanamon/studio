@extends('layouts.header-footer')

@section('body')

<!--banner-->
<div class="index-banner">
    <div class="banner-content">
        <h1 class="banner-title">Find Music Studio ASAP!</h1>
        <p>Choose from thousands of music studio ready to make something awesome for you.</p>
        <form action="{{ route('home.listStudio')}}">
            <div class="select-fields">
                <div class="sel">
                    <input type="text" name="keyword" style="margin-bottom:0px" placeholder="Cari">
                </div>
                <div class="sel">
                    <input type="text" id="input" name="lokasi" style="margin-bottom:0px" placeholder="Lokasi">
                </div>
                <button type="submit" class="btn ui-btn dark-blue">Submit</button>
            </div>
        </form>
    </div>
</div>
<!--end banner-->

<!--popular services-->
<div class="listings" id="table" style="padding:0rem 4rem">
    <br><br><h3 class="text-center">Studio Musik di Dekatmu</h3>
    <center><button style="cursor:pointer" onclick="getLocation()" class="btn btn-outline-success">Ambil Lokasi Saat Ini</button></center>
    <br>
    <div class="row">
        @foreach($studioMusiks as $i => $studioMusik)
        <div class="col-lg-4 col-md-6">
            <div class="listing-item">
                <div class="cover-img">
                    <img id="foto-{{$i}}" style="height:200px" src="{{ asset('/image/studio-musik/'.$studioMusik->foto_studio_musik) }}" alt="">
                    <div class="cover-hover">
                        <div class="share-like">
                        </div>
                    </div>
                </div>
                <div class="listing-info" style="background-color:rgba(0, 16, 96, 0.04)">
                    <div class="details" style="padding-top:1rem;">
                        <strong id="nama-{{$i}}">{{ $studioMusik->nama_studio_musik }}</strong>
                        <div style="height:50px; overflow:hidden">
                            <p id="lokasi-{{$i}}">
                                {{ $studioMusik->lokasi }}
                            </p>
                        </div>
                        <div style="height:24px; overflow:hidden;margin-top:10px">
                            <i class="fa fa-map-marker text-info"></i> <em id="kota-{{$i}}">{{ $studioMusik->kota.", ".$studioMusik->provinsi }}</em>
                        </div>
                    </div>
                    <div class="bottom-details">
                        <div class="rating-stars">
                            <i class="fa fa-dollar yel"></i>
                            <span  style="color:#337ab7; font-size:16px;">Mulai dari Rp.<span id="harga-{{$i}}" style="color:#337ab7; font-size:16px;">@if(isset($studioMusik->studio[0]->biaya_booking)){{ $studioMusik->studio[0]->biaya_booking }}@endif</span>/jam</span>
                        </div>
                        <a id="link-{{$i}}" href="{{ 'detailStudio/'.$studioMusik->id }}">View <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--end popular services-->

<br><h3 class="text-center">Promo Studio</h3><br>
<div id="demo" class="carousel slide" data-ride="carousel" style="padding-left:130px;padding-right:130px;">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('/image/promo/cityA.jpg') }}" alt="Los Angeles" width="1100" height="580">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/image/promo/cityB.jpg') }}" alt="Chicago" width="1100" height="580">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/image/promo/city3.jpg') }}" alt="New York" width="1100" height="580">
      </div>
    </div>
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev"style="padding-left:130px;">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next"style="padding-right:130px;">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  
@endsection



@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM" async defer>
    </script>
      <script src="{{ asset('js/jquery.geocomplete.js')}}"></script>
      <script>
          $("#input").geocomplete();  // Option 1: Call on element.
            </script>
  
    <script>
        
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ url('/nearStudio') }}",
                        method: 'post',
                        data: {
                            lat: lat,
                            lng: lng
                        },
                        success: function(data){
                            console.log(data);
                            $('.row-before').remove();
                                $.each(data, function(i,item){
                                var flagsUrl = '{{ asset('/image/studio-musik/') }}'+'/'+this.foto_studio_musik;

                                $('#foto-'+i).attr("src", flagsUrl);
                                $('#nama-'+i).html(this.nama_studio_musik);
                                $('#lokasi-'+i).html(this.lokasi);
                                $('#kota-'+i).html(this.kota + ", " + this.provinsi);
                        //        $('#harga-'+i).html(this.studio[0].harga);
                                $('#link-'+i).attr("href", "/detailStudio/"+this.id);
                            })
                        }
                    });
                });
            }
  
            function getLocation() {
                if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ url('/nearStudio') }}",
                        method: 'post',
                        data: {
                            lat: lat,
                            lng: lng
                        },
                        success: function(data){
                            console.log(data);
                            alert("Lokasi terambil : "+"\n"+data[0].location)
                            $('.row-before').remove();
                                $.each(data, function(i,item){
                                var flagsUrl = '{{ asset('/image/studio-musik/') }}'+'/'+this.foto_studio_musik;

                                $('#foto-'+i).attr("src", flagsUrl);
                                $('#nama-'+i).html(this.nama_studio_musik);
                                $('#lokasi-'+i).html(this.lokasi);
                                $('#kota-'+i).html(this.kota + ", " + this.provinsi);
                                
                        //        $('#harga-'+i).html(this.studio[0].harga);
                                $('#link-'+i).attr("href", "/detailStudio/"+this.id);
                            })
                        }
                    });
                });
            }

            }
  </script>


@endsection

