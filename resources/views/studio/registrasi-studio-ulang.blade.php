@extends('layouts.header-footer')



@section('body')

<div class="content-wrapper">
    <!--location map-->
    <div class="map">
        <div id="map"></div>
    </div>
    <!--end location map-->
    <!--contact form-->
    <div class="form-container">
        <div class="contact-form">
            <form action="{{ route("studioMusik.updateStudio") }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="id" type="hidden" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="email3">Nama Studio:</label>
                    <input autocomplete="true" id="email3" name="nama_studio_musik">
                </div>
                <div class="form-group">
                    <label for="phone">Telepon:</label>
                    <input autocomplete="true" type="tel" id="phone" name="telp">
                </div>
                <div class="form-group">
                    <label for="msg">No KTP</label>
                    <input autocomplete="true" type="tel" id="phone" name="no_ktp">
                </div>
                <div class="form-group">
                    <label for="msg">Upload Foto KTP</label>
                    <input type="file" data-preview="#preview" name="foto_ktp" value="gambar">
                </div>
                <div class="form-group">
                    <label for="msg">Lokasi</label>
                    <input id="lat" type="hidden" name="lat"/>
                    <input id="lng" type="hidden" name="lng"/>
                    <input id="pac-input" name="lokasi" class="col-lg-8 form-control" type="text" placeholder="Cari Lokasinya Disini">
                </div>
                <button type="submit" class="btn ui-btn info">Submit</button>
            </form>

            <div class="kando info">
                <h5>CONTACT INFORMATION</h5>
                <div class="contact-info">
                    <a href="mailto:someone@example.com">someone@example.com</a>
                    <span>+1 285 6658 5476215</span>
                    <span>1182 Market St,</span>
                    <span> San Francisco, CA</span>
                </div>
                <div class="social">
                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                <i class="fa fa-envelope-o fa-5x text-white"></i>
            </div>
        </div>
    </div>
    <!--end contact form-->

</div>
@endsection



@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
      var markers = [];
      var marker = null;
      var map;

      navigator.geolocation.getCurrentPosition(
        function(pos){
          var latlng = {lat : pos.coords.latitude, lng : pos.coords.longitude};
          marker.setPosition(latlng);
          map.setCenter(latlng);
          var infowindow = new google.maps.InfoWindow();
          var geocoder = new google.maps.Geocoder;
          geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
              if (results[0]) {
                document.getElementById("pac-input").value = results[0].formatted_address;
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
          infowindow.setContent('<div style="color:black;"> Latitude: ' + pos.coords.latitude + '<br>Longitude: ' + pos.coords.longitude + '</div>');
          $("#lat").val(pos.coords.latitude);
          $("#lng").val(pos.coords.longitude);
          infowindow.open(map,marker);
        }, 
        function(err){
          console.warn("error");
        }, 
        {enableHighAccuracy: true}
      );



      function initAutocomplete() {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng(-1.66995440565646,115.21207809448242);
        var mapOptions = {center: myCenter, zoom: 10};    
        map = new google.maps.Map(mapCanvas, mapOptions);  
        marker = new google.maps.Marker({
             position: myCenter,
             map: map
         });
        var infowindow = new google.maps.InfoWindow();
        var geocoder = new google.maps.Geocoder;

        function placeMarker(location) {
          var input = location.lat() + ',' + location.lng();
          var latlngStr = input.split(',', 2);
          var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
          
          geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
              if (results[0]) {
                document.getElementById("pac-input").value = results[0].formatted_address;
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
          infowindow.setContent('<div style="color:black;"> Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng() + '</div>');
        
          $("#lat").val(location.lat());
          $("#lng").val(location.lng());

          marker.setPosition(location);

          infowindow.open(map,marker);
        }

        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
        });




        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT];
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
       
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          if (places.length == 0) {
            return;
          }
          // Clear out the old markers.
      

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
            // Create a marker for each place.
            
            
            marker.setPosition(place.geometry.location);
            var latlngsearch = place.geometry.location;
            var string = latlngsearch.toString();
            var latprocess = string.split("(");
            var latprocess2 = latprocess[1].split(")");
            var latfix = latprocess2[0].split(", ");
            $("#lat").val(latfix[0]);
            $("#lng").val(latfix[1]);
            
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM&libraries=places&callback=initAutocomplete" async defer>
  </script>
@endsection