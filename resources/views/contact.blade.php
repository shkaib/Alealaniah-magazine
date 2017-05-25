<!-- STORED IN RESOURCES/VIEWS/LAYOUTS/MASTER.APP -->

@extends('layouts.master')

@section('title', 'Contact')

@section('body')
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg" type="text/javascript"></script>


<div class="" style="height:100%; width: 50%; position:absolute;">
	<div id="map" class="map"></div>
</div>

<div class="col-lg-6 nogape col-md-6 col-sm-6 col-xs-12 text-justify pull-right detailBox" id="scroller" style="padding: 100px 60px; background: #efefef; overflow: hidden; color: #939694;">
	
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
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
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nogape text-justify ">
        	<div class="col-lg-12">
            	<h2>Contact Us</h2>
        	</div>
            
        	<form action="{{ URL::route( 'contactMail' ) }}" method="post">
                <div class="col-lg-12 nogape margin-top-10 margin-bottom-10">
                    <div class="col-lg-6">
                        <label for="name" class="font-light margin-bottom-10">Your Name : <span class="color-red">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Your Name *" />
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="font-light margin-bottom-10">Your E-mail : <span class="color-red">*</span></label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control " id="email" placeholder="Your E-Mail *" />
                    </div>
                </div>
                <div class="col-lg-12  margin-top-10 margin-bottom-10 ">
                    <label class="font-light margin-bottom-10">Your Message : <span class="color-red">*</span></label>
                    <textarea class="form-control contact-textarea" placeholder="Your Message *" name="contact-message" rows="7">{{ old('contact-message') }}</textarea>
                </div>
                
                <div class="col-lg-12 margin-top-1- margin-bottom-10">
                	<div class="g-recaptcha" data-sitekey="6Le9oAcUAAAAAJEEQIgzDfuoLmyr5axOfEtqg6y9"></div>
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="col-lg-12 text-right margin-top-10 margin-bottom-10">
                	<button class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send</button>
                </div>
            </form>
            
        </div>
         
            
         
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nogape text-justify">
        	<div class="col-lg-12">
            	<div class="col-lg-12 padding-top-10 nogape">
                	<h4>Email</h4>
                    <small><i class="fa fa-envelope-o" aria-hidden="true"></i> : <a href="mailto:info@alealaniah.net">info@alealaniah.net</a></small>
                </div>
                <div class="col-lg-12 padding-top-10 nogape">
                	<h4>Office</h4>
                    <small><i class="fa fa-phone" aria-hidden="true"></i> : +973 7711 8845</small><br />
                    <small><i class="fa fa-phone" aria-hidden="true"></i> : +973 1733 0409</small>
                </div>
                <div class="col-lg-12 padding-top-10 nogape">
                	<h4>Whatsapp</h4>
                    <small><i class="fa fa-whatsapp" aria-hidden="true"></i> : +973 3416 8189</small>
                    
                </div>
                
                <div class="col-lg-12 nogape margin-top-112">
                    <ul class="inline-list">
                        <li><a href="https://www.facebook.com/www.alealaniah.net/" target="_blank" class="color-gray"><i class="fa fa-facebook-official fa-2x"  aria-hidden="true"></i></a></li> 
                        <li><a href="https://twitter.com/AlealaniahM" target="_blank" class="color-gray"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
                        <li><a href="http://alealaniah.tumblr.com/post/148083334454" target="_blank" class="color-gray"><i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i></a></li> 
                        <li><a href="https://www.instagram.com/al_ealaniah/" target="_blank" class="color-gray"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCNuIHDcYrBhSTmIPOSOQAUw" target="_blank" class="color-gray"><i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

</div>
	
<script type="text/javascript">
	var locations = [
		// Foreach For Address and Latituted, Longitude
		
		['Alealaniah Magazine', 26.215072, 50.589563, 1],
	];
	
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 16,
	  center: new google.maps.LatLng(26.215072, 50.589563 ),
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  scrollwheel: false,
	  disableDefaultUI: true, // a way to quickly hide all controls
	  mapTypeControl: false,
	  scaleControl: false,
	  zoomControl: false,
	  
	  
	  styles :[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]
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