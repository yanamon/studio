@extends('layouts.header-footer2')

@section('body')

<div class="content-wrapper">

        <!--listing detail-->
        <div class="listing-detail">
    
            <!--main section-->
            <div class="detail-main-section">
                <div class="detail-cover-img">
                    <img style="height:450px" src="{{ asset('/image/studio-musik/'.$studioMusik->foto_studio_musik) }}" alt="">
                    <div class="cover-shade">
                        
                        <h4>{{$studioMusik->nama_studio_musik}}</h4>
                        <strong><i class="fa fa-map-marker text-info"></i>{{$studioMusik->kota}}</strong>
                    </div>
                </div>
                <div class="detail-action">
                    <strong><i class="fa fa-check-circle-o text-success"></i> Studio Room</strong>
                    <div class="action">
                    </div>
                </div>
                <div class="detail-content">
                    <div class="reviews" style="margin-top:0px">
                        <div class="listings" style="padding:0rem 0rem" >
                            <div class="row">        
                                @foreach($studios as $i => $studio)
                                <div class="col-lg-12 col-md-12">
                                    <div class="listing-two-item">
                                        <div class="cover-photo">
                                            <img style="height:180px" src="{{ asset('/image/studio/'.$studio->foto_studio) }}" alt="">
                                            <div class="cover-photo-hover">
                                                <div class="share-like-two">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-two-item-info">
                                                <div style="height:120px;">
                                            <strong>{{$studio->nama_studio}}</strong>
                                            <p>
                                                    {{ $studio->deskripsi_studio }}
                                            </p>
                                        </div>
                                            <div class="rating-bt">                        
                                                <div class="rating-stars">
                                                    <i class="fa fa-dollar yel"></i>
                                                    
                                                <span style="color:#337ab7; font-size:16px;">Mulai dari Rp.{{$studio->biaya_booking}}/jam</span>
                                                    
                                                </div>
                                                <a><strong>Book Now</strong> <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="ui-pagination">
                                {{$studios->links()}}
                            </div>   
                        </div>
                        <!--review form-->
                                            <!--end review form-->
    
                    </div>
    
                </div>
    
            </div>
            <!--end main section-->
    
            <!--aside section-->
            <aside class="detail-aside-section">
                <div class="box">
                    <div class="rating-b">
                        <p class="text-center" style="margin-bottom:0px; margin-top:20px;">Harga Mulai Dari</p>
                        <h1 class="text-center">@if(isset($studioMusik->studio[0]->biaya_booking)){{ $studioMusik->studio[0]->biaya_booking }}@endif</h1>
                       
                        <p class="text-center">/jam</p>
                    </div>
                </div>
                <div class="service-sidebar">
                    <h4>Contact</h4>
                    <hr>
                    <ul class="list-unstyled cont-info">
                        <li><i class="fa fa-phone text-mayan"></i> <span>{{$studioMusik->user->telp}}</span></li>
                        <li><i class="fa fa-envelope-o text-rose"></i> <a href="#">{{$studioMusik->user->email}}</a></li>
                        <li><i class="fa fa-map-marker"></i> <span>{{$studioMusik->kota}}</span></li>
                    </ul>
                <input id="lat" type="hidden" value="{{$studioMusik->lat}}">
                <input id="lng" type="hidden" value="{{$studioMusik->lng}}">
                    <div id="map"></div>
    
    
                </div>
            </aside>
            <!--end aside section-->
        </div>
        <!--listing detail-->
    
@endsection

@section('script')
    <script>
        function myMap() {
            var lat = $("#lat").val();
            var lng = $("#lng").val();
            var location = {lat: parseFloat(lat), lng: parseFloat(lng)};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: location
            });
    
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'San Francisco, CA'
            });
    //
        }
    </script>
    
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB63aSeCGJzKLpE5K2Cwnccs5lELmN55Wg&amp;callback=myMap">
    </script>
@endsection