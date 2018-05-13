@extends('layouts.header-footer')

@section('body')

<div class="content-wrapper">

        <!--listing detail-->
        <div class="listing-detail">
    
            <!--main section-->
            <div class="detail-main-section">
                <div class="detail-cover-img">
                    <img style="height:450px" src="{{ asset('/image/studio-musik/'.$studioMusik->foto_studio_musik) }}" alt="">
                    <div class="cover-shade">
                        <div class="user-picture">
                            <img src="img/chef2.jpg" alt="">
                        </div>
                        <h4>Megan Clara</h4>
                        <h5 class="text-rose">Chef</h5>
                        <strong><i class="fa fa-map-marker text-info"></i> San Fransisco</strong>
                    </div>
                </div>
                <div class="detail-action">
                    <strong><i class="fa fa-check-circle-o text-success"></i> Verified Listing</strong>
                    <div class="action">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-share-alt"></i></a>
                        <a href="#"><i class="fa fa-bookmark-o"></i></a>
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
                                            <img style="height:180px" src="{{ asset('/image/studio-musik/'.$studio->foto_studio) }}" alt="">
                                            <div class="cover-photo-hover">
                                                <div class="share-like-two">
                                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#"><i class="fa fa-share-alt"></i></a>
                                                    <a href="#"><i class="fa fa-bookmark-o"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-two-item-info">
                                            <div class="user-two-pic">
                                                <img src="img/avatar2.jpg" alt="">
                                            </div>
                                            <strong>{{$studio->nama_studio}}</strong>
                                            <p>
                                                    {{ $studio->deskripsi_studio }}
                                            </p>
                                            <div class="rating-bt">                        
                                                <div class="rating-stars">
                                                    <i class="fa fa-dollar yel"></i>
                                                    <span style="color:#337ab7; font-size:16px;">Mulai dari Rp.50.000/jam</span>
                                                </div>
                                                <a href="{{ '/bookStudio/'.$studio->id }}"><strong>Book Now</strong> <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="ui-pagination">
                                <a href="#" class="page"><i class="fa fa-angle-left"></i></a>
                                <a href="#" class="page">1</a>
                                <a href="#" class="page info text-white">2</a>
                                <a href="#" class="page">3</a>
                                <a href="#" class="page">4</a>
                                <a href="#" class="page"><i class="fa fa-angle-right"></i></a>
                            </div>  
                        </div>
                        <!--review form-->
                        <div class="review-frm">
                            <h5>Add Review (<i class="fa fa-star text-rose"></i>)</h5>
                            <form action="#" method="post">
                                <div class="rate">
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                    <span>Your Rating</span>
                                </div>
                                <div class="form-group">
                                    <textarea name="msg" id="message" placeholder="Your Message Here ..." rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn ui-btn dark-blue">Submit</button>
                            </form>
                        </div>
                        <!--end review form-->
    
                    </div>
    
                </div>
    
            </div>
            <!--end main section-->
    
            <!--aside section-->
            <aside class="detail-aside-section">
                <div class="box">
                    <div class="rating-b">
                        <h1 class="text-center">4.8</h1>
                        <div class="rating-stars text-center">
                            <i class="fa fa-star yel"></i>
                            <i class="fa fa-star yel"></i>
                            <i class="fa fa-star yel"></i>
                            <i class="fa fa-star-half-empty"></i>
                            <i class="fa fa-star-o yel"></i>
                        </div>
                        <p class="text-center"><small>(567 Reviews)</small></p>
                    </div>
                </div>
                <div class="service-sidebar">
                    <h4>Contact</h4>
                    <hr>
                    <ul class="list-unstyled cont-info">
                        <li><i class="fa fa-phone text-mayan"></i> <span>+1 656 8563 35</span></li>
                        <li><i class="fa fa-envelope-o text-rose"></i> <a href="mailto:zen@example.com">zen@me.com</a></li>
                        <li><i class="fa fa-map-marker"></i> <span>San Fransisco</span></li>
                        <li><i class="fa fa-twitter text-info"></i> <span>@_twitter</span></li>
                        <li><i class="fa fa-linkedin text-primary"></i> <span>Linkedin</span></li>
                        <li><i class="fa fa-globe"></i> <a href="#">www.me.com</a></li>
                    </ul>
                    <div id="map"></div>
    
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <textarea name="msg" id="msg" rows="3" placeholder="Your Message here .."></textarea>
                        </div>
                        <button type="submit" class="btn ui-btn dark-blue btn-block">Send Message</button>
                    </form>
    
                </div>
            </aside>
            <!--end aside section-->
        </div>
        <!--listing detail-->
    
@endsection

@section('script')
    <script>
        function myMap() {
            var location = {lat: 37.779161, lng: -122.414861};
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