@extends('layouts.master')

@section('title', 'Category')

@section('body')
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg" type="text/javascript"></script>

<section class="map-section">
	<div id="map" class="map"></div>
</section>

<section class="categories-section">
	<div class="bg-gray categoreis padding-15">
    	<div class="container">
        	<div class="col-lg-12">
        		<h2>Browse Our Categories</h2>
            </div>
            <div class="all-categories row nogape">
            	
               
                
            </div>
        </div>
    </div>
</section>

<section class="posts">
	<div class="container padding-15">
        <div class="col-lg-12 nogape">
            <h2> Latest Ads </h2>
            <div class="row nogape">
            	
               @if( count($new_ads) != 0  ) 
                
                   @foreach( $new_ads as $ad )
                    
                    <a href="{{ URL::route('single-ad', [ $ad->id ]) }}">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="margin-bottom: 25px;">
                            <div class="col-lg-12 nogape">
                                <div class="post-img  text-center">
                                @if( $ad->image != '' )
                                    <div class="full ad-img bg-gray">
                                        <img src="{{ '/public/'.$ad->image }}" />
                                    </div>
                                @else
                                    <div class="full ad-img bg-gray">
                                        <img width="100%" src="{{ asset('/public/ads/0.png') }}" />
                                    </div>
                                @endif
                                </div>
                                <div class="post-body pull-left full bg-gray text-center padding-15">
                                    <h4>{{ $ad->title }}</h4>
                                    <div class="price">{{ $ad->price }}</div>
                                    <!--<div class="category">Cars</div>-->
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                
                @else
                
                	<h2>Sorry! No Ad Found</h2>
                
                @endif
            </div>
        </div>    	
    </div>
</section>
<script type="text/javascript">
    var locations = [
		// Foreach For Address and Latituted, Longitude
		@foreach( $new_ads as $ad )
			['{{ $ad->title }} <br /> {{ $ad->address }}', {{ $ad->lat }}, {{ $ad->lng }}, 4],
		@endforeach
	];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(26.194582, 50.513198 ),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  scrollwheel: false,
	  styles :[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
		size=30;
		var img = new google.maps.MarkerImage('http://localhost:8000/img/marker.png',           
			new google.maps.Size(size, size),
			new google.maps.Point(0,0),
			new google.maps.Point(size/2, size/2)
	   ); 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: img
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>


@endsection