@extends('layouts.header-footer')



@section('body')
    <div id="regis_pemilik">
        <center><h2>Daftar Studio</h2></center><br>

        <form action="{{ route("studioMusik.store") }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <i class="form-control-feedback glyphicon glyphicon-music"></i><input type="text" class="form-control" name="nama_studio_musik" id="nm_studio_musik" placeholder="Nama Studio Musik*"/>
            </div>

            <div class="form-group has-feedback">
                <i class="form-control-feedback glyphicon glyphicon-user"></i><input type="text" class="form-control" name="nama_pemilik" id="nm_pemilik" placeholder="Nama Pemilik*"/>
            </div>

            <div class="form-group has-feedback">
                <i class="form-control-feedback glyphicon glyphicon-envelope"></i><input type="email" class="form-control" name="email" id="email_p" placeholder="Email*"/>
            </div>

            <div class="form-group has-feedback">
                <span class="form-control-feedback glyphicon glyphicon-lock"></span><input type="password" class="form-control" name="password" id="pass_p" placeholder="Password*"/>
            </div>

            <div class="form-group has-feedback">
                <span class="form-control-feedback glyphicon glyphicon-lock"></span><input type="password" class="form-control" name="password_confirmation" id="pass_confirm" placeholder="Ketik Ulang Password*"/>
            </div>

            <div class="form-group has-feedback">
                <i class="form-control-feedback glyphicon glyphicon-phone-alt"></i><input type="text" class="form-control" name="telp" id="tlp_pemilik" placeholder="Nomor HP/Telp*"/>
            </div>

            <div class="form-group has-feedback">
                <i class="form-control-feedback glyphicon glyphicon-pencil"></i><input type="text" class="form-control" name="no_ktp" id="ktp_p" placeholder="Nomor KTP*"/>
            </div>
            
            <h4>Upload Foto KTP*</h4>
            <input type="file" data-preview="#preview" class="form-control-file" name="foto_ktp" value="gambar">
            <img class="form-control-file" id="preview"  src="" ></img>

            <div class="form-group has-feedback">
              <h4 for="map">Lokasi*</h4>
              <input id="lat" type="hidden" name="lat"/>
              <input id="lng" type="hidden" name="lng"/>
              <input id="pac-input" name="lokasi" class="col-lg-8 form-control" type="text" placeholder="Cari Lokasinya Disini">
              <div id="map" style="width:100%;height:250px;"></div>
            </div>

            <div class="form-group has-feedback">
                <i class="form-control-feedback glyphicon glyphicon-home"></i><textarea name="alamat" class="textarea" cols="57" rows="3" id="alamat_p" placeholder="Alamat Lain/Detail Lokasi"/></textarea>
            </div>
            
            <h4><b><button type="submit" class="button button-block" name="kirim" value="Kirim">SUBMIT</button></b></h4>
        </form>
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