@extends('layouts.admin-layout')

@section('body')
<h1>{{ $user->studioMusik->nama_studio_musik }}</h1> 
@if($user->verified)
	<h5>Verified</h5>
@else
	<h5>Verified</h5>
@endif

@if($user->confirmed)
	<h5>Confirmed</h5>
@else
	<h5>Confirmed</h5>
@endif

<h5>Pemilik : {{ $user->studioMusik->nama_pemilik }}</h5>
<h5>Telp : {{ $user->studioMusik->foto_ktp }}</h5>
<h5>No KTP : {{ $user->studioMusik->telp_studio }}</h5>
<img style="width: 300px;" src="{{ asset('/image/ktp/'.$user->studioMusik->foto_ktp) }}">
<h5>Email : {{ $user->email}}</h5>

<h5>Lokasi : {{ $user->studioMusik->lokasi}}</h5>
<h5>Alamat lain/Detail Lokasi : {{ $user->studioMusik->alamat}}</h5>
<div id="map" style="width:100%;height:250px;"></div>
<input id="lng" type="hidden" name="" value="{{ $user->studioMusik->lat }}">
<input id="lat" type="hidden" name="" value="{{ $user->studioMusik->lng }}">

@endsection

@section('script')
<script>
      var markers = [];
      var marker = null;
      var map;

      navigator.geolocation.getCurrentPosition(
        function(pos){
          var latlng = {lat : $("#lat").val(), lng : $("#lat").val()};
          marker.setPosition(latlng);
          map.setCenter(latlng);
          var infowindow = new google.maps.InfoWindow();
          var geocoder = new google.maps.Geocoder;
          geocoder.geocode({'location': latlng}, function(results, status) {
       
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
@endsection