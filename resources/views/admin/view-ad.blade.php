@extends('layouts.admin')

@section('title' , 'Ad')

@section('body')

<style>
     
      #map {
        height: 500px;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
	  #mode{
		  display:none;
	  }
    </style>
    
<section class="single-post">
	<div id="map"></div>
    
	<div class="container">
    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        		
            <!-- Heading Are -->
            <div class="col-lg-10 nogape"><h2 class="font-light">{{ $ads->title }}</h2></div>
            <div class="col-lg-2 nogape text-right"><h3 class="color-lighGreen">{{ $ads->price }}</h3></div>
            <!-- /Heading -->
            
            <!-- Featured Image Area -->
            <div class="col-lg-12 nogape">
            	@if( $ads->image != '' )
                	<img class="full" src="{{ $ads->image }}" />
                @else
           	    	<img class="full" src="/ads/0.png"/>
                @endif
            </div>
            <!-- /Feature Image -->
            
            <!-- Address Title Area -->
            <div class="address col-lg-12 nogape bg-gray padding-15 margin-top-5 margin-bottom-10">
                <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <span>{{ $ads->address }}</span>
            </div>
            <!-- /Address -->
            
            <!-- Map Area -->
                
                <!-- // Code Goes Here -->
                <div id="floating-panel" style="display:none;">
                <select id="mode" >
                  <option value="DRIVING">Driving</option>
                  <option value="WALKING">Walking</option>
                  <option value="BICYCLING">Bicycling</option>
                  <option value="TRANSIT">Transit</option>
                </select>
                </div>
                <div id="map"></div>
            
            <!-- /Map -->
            
            <!-- Detailed Text Goes Here -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nogape">
            	<p>{{ $ads->details }}</p>
            </div>
            <!-- /Detailed Text -->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        	<div class="row nogape">
            	<!-- Make Active and Unactive -->
                 @if( $ads->activation == 0 )
                    <a href="{{ URL::route('approve-ad', [$ads->id]) }}" class="col-lg-3 nogape">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br />
                        Approve
                    </a>
                 @else
                    <a href="{{ URL::route('ban-ad', [$ads->id]) }}" class="col-lg-3 nogape">
                        <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span><br />
                        Block
                    </a>
                 @endif
                 <!-- / Make Active and Unactive -->
            </div>
        	<h2 class="font-light">Contact Owner</h2>
            
            <h3><a href="{{ URL::route( 'companies' , [ $ads->user_id ] ) }}">{{ $ads->getCustomerName() }}</a></h3>
            
            <div class="contact-details">
            	<div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerNumber() }}</span></div>
                <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerEmail() }}</span></div>
                <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-facebook" aria-hidden="true"></i></span> <span>alealaniah</span></div>
            </div>
            
            <div class="contact-form margin-top-5">
            	<form>
            		<input type="text" class="form-control" placeholder="Name*" name="name" /> <br />
                    <input type="text" class="form-control" placeholder="E-mail*" name="email" /> <br />
                    <input type="text" class="form-control" placeholder="Subject*" name="subject" /> <br />
                    <textarea class="form-control" placeholder="Message" name="message" rows="5"></textarea><br />
                    <input type="submit" value="SEND" class="btn btn-block bg-yellow" />
                </form>
            </div>
            
            <div class="border-1 padding-15 margin-top-10">
            	<div class="row nogape margin-bottom-5">
                	<div class="col-lg-6">Category</div><div class="col-lg-6 text-right"><a href="#">Cars</a></div>
                </div>
                <div class="row nogape margin-bottom-5">
                	<div class="col-lg-6">Added</div><div class="col-lg-6 text-right">Aug 23, 16</div>
                </div>
                <div class="row nogape margin-bottom-5">
                	<div class="col-lg-6">Location</div><div class="col-lg-6 text-right">{{ $ads->address }}</div>
                </div>
                <div class="row nogape">
                	<div class="col-lg-6">Views</div><div class="col-lg-6 text-right">1350</div>
                </div>	
            </div>
            
        </div>
    </div>
</section> 
    
    
    <script>
      function initMap() {
		  navigator.geolocation.getCurrentPosition(function(location) {
			var myLatLng = {lat: location.coords.latitude, lng: location.coords.longitude};
			//console.log(myLatLng);
			
				var directionsDisplay = new google.maps.DirectionsRenderer;
				var directionsService = new google.maps.DirectionsService;
				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 12,
				  center: myLatLng,
				  scrollwheel: false,
				});
				directionsDisplay.setMap(map);
		
				calculateAndDisplayRoute(directionsService, directionsDisplay);
				document.getElementById('mode').addEventListener('change', function() {
				  calculateAndDisplayRoute(directionsService, directionsDisplay);
				});
		  });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		  navigator.geolocation.getCurrentPosition(function(location) {
			var myLatLng = {lat: location.coords.latitude, lng: location.coords.longitude};
				var selectedMode = document.getElementById('mode').value;
				directionsService.route({
				  origin: myLatLng,  // Haight.
				  destination: {lat: {{ $ads->lat }}, lng: {{ $ads->lng }}},  // Ocean Beach.
				  // Note that Javascript allows us to access the constant
				  // using square brackets and a string value as its
				  // "property."
				  travelMode: google.maps.TravelMode[selectedMode]
				}, function(response, status) {
				  if (status == 'OK') {
					directionsDisplay.setDirections(response);
				  } else {
					window.alert('Directions request failed due to ' + status);
				  }
				});
		  });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg&callback=initMap">
    </script>

@endsection