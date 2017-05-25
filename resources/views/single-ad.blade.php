@extends('layouts.master')

@section('title' , $ads->title)

@section('body')



	@if( $ads->lat != '' && $ads->lng != '' )
    	<div class="" style="height:100%; width: 50%; position:absolute;">
            
            <div id="map" class="map"></div>
            <!-- Map Area -->
                <!-- // Code Goes Here -->
                <div id="floating-panel" class="floating-panel " >
                    <select id="mode" class="form-control">
                      <option value="DRIVING">Driving</option>
                      <option value="WALKING">Walking</option>
                      <option value="BICYCLING">Bicycling</option>
                      <option value="TRANSIT">Transit</option>
                    </select>
                </div>
            <!-- /Map -->
            
           <div class="takeMeThere">
                <p onclick="map()" style="cursor:pointer">Take Me there</p>
            </div>
        </div>
        @else

            <div class="col-lg-7 nogape col-md-7 col-sm-7 col-xs-12" id="background" style="height: 100%; background:url({{ asset('/public/img/ipadimg.jpg') }}); position:absolute; background-size: auto 100%; background-position: center center;"></div>

        @endif
        <div class="col-lg-6 col-md-6 colsm-12 col-xs-12 nogape pull-right detailBox" id="scroller" style="padding: 100px 60px; background: #efefef; overflow: hidden; color: #939694;">
        	    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        
                    <!-- Heading Are -->
                    <div class="col-lg-10 nogape">
                    	<h2 class="font-light">
                            <a href="{{ URL::route( 'companies' , [ $ads->user_id ] ) }}">
                            	{{ $ads->title }}
                            </a>
                        </h2></div>
                    <div class="col-lg-2 nogape text-right"><h3 class="color-lighGreen">{{ $ads->price }}</h3></div>
                    <!-- /Heading -->
                    
                    <!-- Featured Image Area -->
                    <div class="col-lg-12 nogape">
                        @if( $ads->image != '' )
                            <img class="full" src="{{ asset( '/public/'.$ads->image  )}}" />
                        @else
                            <img class="full" src="{{ asset( '/public/ads/0.png' ) }}"/>
                        @endif
                    </div>
                    <!-- /Feature Image -->
                    
                    <!-- Address Title Area -->
                    <div style="background: #C1C1C1;" class="address col-lg-12 nogape padding-15 margin-top-5 margin-bottom-10">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="col-lg-11  col-md-11 col-sm-11 col-xs-11"><?php echo $ads->address ?></div>
                    </div>
                    <!-- /Address -->
                    
                    <!-- Detailed Text Goes Here -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nogape">
                    <h3> Details </h3>
                        <p><?php echo $ads->details ?></p>
                        
                        
                        <div class="clientContact">Contact US</div>
                    </div>
                    <!-- /Detailed Text -->
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contactEmail">
                    <h2 class="font-light">Contact Owner</h2>
                    
                    @if( $ads->email != '' || $ads->phone != '' )
                        @if( $ads->phone != '' )
                            <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <span>{{ $ads->phone }}</span></div>
                        @endif
                    
                        @if( $ads->email != '' )
                        <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <span>{{ $ads->email }}</span></div>
                        @endif
                    @else
                    
                    
                    <div class="contact-details">
                        <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerNumber() }}</span></div>
                        <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerEmail() }}</span></div>
                        @if( !empty($ads->getCustomerFacebook()) )
                            <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-facebook" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerFacebook() }}</span></div>
                        @endif
                        
                        @if( !empty( $ads->getCustomerInstagram() )  )
                            <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-instagram" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerInstagram() }}</span></div>
                        @endif
                        
                        @if( !empty( $ads->getCustomerTwitter() )  )
                            <div class="full font-12 margin-top-5 margin-bottom-5 pull-left"><span><i class="fa fa-twitter" aria-hidden="true"></i></span> <span>{{ $ads->getCustomerTwitter() }}</span></div>
                        @endif
                    </div>
                    @endif
                    
                    
                     
                    <div class="contact-form margin-top-5">
                    
                        
                         
                        <form method="post" action="{{ URL::route('sendToCustomer', [$ads->id]) }}">
                            @if( $ads->email != '' )
                                <input type="hidden" class="form-control" name="customer-email" value="{{ $ads->email }}" />
                            @else
                                <input type="hidden" class="form-control" name="customer-email" value="{{ $ads->getCustomerEmail()  }}" />
                            @endif
                            
                            
                            
                            <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Name*" name="name" /> <br />
                            <input type="text" class="form-control" value="{{ old('email') }}" placeholder="E-mail*" name="email" /> <br />
                            <input type="text" class="form-control" placeholder="Subject*" value="{{ old('subject') }}" name="subject" /> <br />
                            <textarea class="form-control" placeholder="Message" name="message-content" rows="5">{{ old('message-content') }}</textarea><br />
                            <input type="submit" value="SEND" class="btn btn-block bg-yellow" />
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                    </div>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger list-only">
                            <ul class="nogape">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif
                     @if( Session::has('success') )
                        <section class="alert alert-success">
                            {{ Session::get('success') }}        
                        </section>
                     @endif
                    
                    <!--<div class="border-1 padding-15 margin-top-10">
                        <div class="row nogape margin-bottom-5">
                            <div class="col-lg-6">Category</div><div class="col-lg-6 text-right"><a href="#">Cars</a></div>
                        </div>
                        <div class="row nogape margin-bottom-5">
                            <div class="col-lg-6">Added</div><div class="col-lg-6 text-right">Aug 23, 16</div>
                        </div>
                        <div class="row nogape margin-bottom-5">
                            <div class="col-lg-6">Location</div><div class="col-lg-6 text-right"><?php echo  $ads->address ?></div>
                        </div>
                        <div class="row nogape">
                            <div class="col-lg-6">Views</div><div class="col-lg-6 text-right">1350</div>
                        </div>	
                    </div>-->
                    
                    <div class="commentShare">Comment & Share</div>
                    
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 shareComments">
                	<div class="col-lg-12 nogape">
                    
                        <h3> Share This </h3>
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_instagram_large' displayText='Instagram Badge' st_username='alealaniah magazine'></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>
                        <span class='st_tumblr_large' displayText='Tumblr'></span>
                        <span class='st_email_large' displayText='Email'></span>
                    </div>
                    
                    <div class="fb-like" data-href="http://alealaniah.com" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    
                    <div class="fb-comments" data-href="http://alealaniah.com/single-ad/{{ $ads->id }}" data-width="100%" data-numposts="5"></div>
                </div>
            
        </div>
    
   
    
<section class="single-post">

	

</section> 
    
    
    <script>

function initMap() {
  var myLatLng = {lat: {{ $ads->lat }}, lng: {{ $ads->lng }} };

  var map = new google.maps.Map(document.getElementById('map'), {
    disableDefaultUI: true, // a way to quickly hide all controls
    mapTypeControl: false,
    scaleControl: false,
    zoomControl: false,
    zoom: 12,
    center: myLatLng,
    scrollwheel: false,
    styles :[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]

  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}
    function map(){

      function initMap() {
		  navigator.geolocation.getCurrentPosition(function(location) {
			var myLatLng = {lat: location.coords.latitude, lng: location.coords.longitude};
			//console.log(myLatLng);
			
				var directionsDisplay = new google.maps.DirectionsRenderer;
				var directionsService = new google.maps.DirectionsService;
				var map = new google.maps.Map(document.getElementById('map'), {
				  disableDefaultUI: true, // a way to quickly hide all controls
				  mapTypeControl: false,
				  scaleControl: false,
				  zoomControl: false,
				  zoom: 12,
				  center: myLatLng,
				  scrollwheel: false,
				  styles :[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]
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
      initMap() 
    }
    </script>
   
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg&callback=initMap">
    </script>

@endsection