@extends('layouts.master')

@section('title', 'ALEALANIAH, Free classified ads, Jobs Wanted, Jobs Offered, Jobs in Bahrain. New Jobs, Car, Cars, Property for rent, Property for sell, office for rent, office for sell')

@section('body')




<div class="map-section">
	<div id="map" class="map"></div>

    <div class="white-box-classified box-shadow white-box" >

        <h2 class="whitebox-title">Latest Classifieds</h2>

        <div class="classified-height" id="scroller">
            @foreach( $ads as $ad )
                <div class="classified text-justify" style="width:100%;">
                    <div class="row nogape">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left nogape"><h3><a href="{{ URL::route('single-ad', [ $ad->id ]) }}">{{ str_limit($ad->title, $limit = 20)  }}</a></h3></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right nogape"><small>{{ str_limit($ad->created_at, $limit = 10, $send='')  }}</small></div>
                    </div>
                    
                    <p><?php echo  str_limit($ad->details, $limit = 150, $end = '...')  ?></p>
                    <p><a href="{{ URL::route('single-ad', [ $ad->id ]) }}">Read More</a></p>
            
                </div>
            @endforeach
        </div>

        <h3 class="sideBarLink"><a href="{{ route('allCategories') }}">Search by Categories</a></h3>
       
</div>


<script src="http://maps.google.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg" type="text/javascript"></script>
<script type="text/javascript">
    var locations = [
	
		// Foreach For Address and Latituted, Longitude
		@foreach( $locations as $ad )
			['<div class="popup"><img src="{{ asset('/public').$ad->image }}" /><div class="popup-details"><h4>{{ $ad->title }}</h4><a href="{{ URL::route('single-ad', [ $ad->id ]) }}">See Details</a></br><a style="cursor:pointer" target="_blank" href="http://maps.apple.com/?q={{ $ad->lat }}, {{ $ad->lng }}">Take me there!</a></div></div>', {{ $ad->lat }}, {{ $ad->lng }},  4, "{{ asset( '/public'.$ad->getSubCategoryIcon() ) }}"],
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