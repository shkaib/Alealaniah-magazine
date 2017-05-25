@extends('layouts.master')

@section('title', 'Our Valued Customers')

@section('body')




<div class="map-section">
    <div id="map" class="map"></div>
</div>


<script src="http://maps.google.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg" type="text/javascript"></script>
<script type="text/javascript">



    var locations = [
    
        // Foreach For Address and Latituted, Longitude
        @foreach( $customers as $customer )
            ['<div class="popup"><img src="{{ asset('/public').$customer->logo }}" /><div class="popup-details"><h4>{{ $customer->name }}</h4><a href="{{ URL::route('companies', [ $customer->id ]) }}">See Details</a></br><a style="cursor:pointer" >Take me there!</a></div></div>', {{ $customer->map_lat }}, {{ $customer->map_lng }},  4, "{{ asset( '/public/img/marker.png' )  }}", ],
        @endforeach
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(26.096983, 50.546100 ),
    
      
    disableDefaultUI: true, // a way to quickly hide all controls
        mapTypeControl: false,
        scaleControl: false,
        zoomControl: false,
            
        
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false,
      styles :[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]
    });
    
    

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    for (i = 0; i < locations.length; i++) {  
    
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: locations[i][4],
        
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
         fullscreenControl: true

      })(marker, i));
      
    }

</script>

@endsection