@extends('layouts.header-footer')

@section('body')

<!--banner-->
<div class="index-banner">
    <div class="banner-content">
        <h1 class="banner-title">Find Music Studio ASAP!</h1>
        <p>Choose from thousands of music studio ready to make something awesome for you.</p>
        <div class="select-fields">
            <div class="sel">
                <input type"text" style="margin-bottom:0px" placeholder="Cari">
            </div>
            <div class="sel">
                <input type"text" style="margin-bottom:0px" placeholder="Lokasi">
            </div>
            <button class="btn ui-btn dark-blue">Submit</button>
        </div>

    </div>
</div>
<!--end banner-->

<!--popular services-->
<div class="listings" id="table" style="padding:3rem 4rem">
    <br><br><h3 class="text-center">Studio Musik di Dekatmu</h3><br>
    <div class="row">
        @foreach($studioMusiks as $i => $studioMusik)
        <div class="col-lg-4 col-md-6">
            <div class="listing-item">
                <div class="cover-img">
                    <img id="foto-{{$i}}" style="height:200px" src="{{ asset('/image/studio-musik/'.$studioMusik->foto_studio_musik) }}" alt="">
                    <div class="cover-hover">
                        <div class="share-like">
                            <a href="#" title="Bookmark"><i class="fa fa-bookmark-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="listing-info">
                    <div class="details">
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
                            <span style="color:#337ab7; font-size:16px;">Mulai dari Rp.50.000/jam</span>
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
@endsection



@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
                                $('#kota-'+i).html(this.kota+", "+this.provinsi);
                                $('#link-'+i).attr("href", "/detailStudio/"+this.id);
                            })
                        }
                    });
                });
            }
  
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM" async defer>
  </script>
@endsection