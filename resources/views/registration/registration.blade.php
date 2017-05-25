<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alealaniah | Customer Registration Center</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ URL::asset('/public/css/bootstrap.min.css') }}">
        
		<link rel="stylesheet" href="{{ URL::asset('/public/css/form-elements.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/public/css/registrationstyle.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/public/css/style.css') }}">
        
        <script src="https://use.fontawesome.com/d4d769f094.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="/public/favicon.png">
        

    </head>

    <body style="background: url({{ asset('/public/img/registration-bg.png') }}); background-size: 100% 100%;">
    	

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        	<div class="full text-center" style="padding-bottom: 50px;">
                                <a href="{{ URL::route('mainpage') }}">
                                    <img width="300px" src="{{URL::asset('/public/img/logo.png')}}"/>    
                                </a>
                            </div>
                           
                            <!--<div class="description">
                            	<p>
	                            	This is a free responsive multi-step registration form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>
                            </div>-->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form role="form" enctype="multipart/form-data" action="{{ URL::route('registerCustomer') }}" method="post" class="registration-form">
                        		
                        		<fieldset class="box-shadow">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 1 / 4</h3>
		                            		<p>Tell us who you are:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="company-title">Full Name</label>
				                        	<input type="text" name="company-title" placeholder="Full Name *" class="form-control" id="company-title">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="address">Address</label>
				                        	<textarea name="form-about-yourself" placeholder="Address" 
				                        				class="form-control" id="address"></textarea>
				                        </div>
                                        <div class="form-group">
				                        	<label class="sr-only" for="city">City</label>
				                        	<input type="text" name="city" placeholder="City *" class="city form-control" id="city">
				                        </div>
                                        
                                        <div class="form-group">
				                        	<label class="sr-only" for="email">E-mail</label>
				                        	<input type="text" name="email" placeholder="E-mail *" class="email form-control" id="email">
				                        </div>
                                        
                                        <div class="form-group">
				                        	<label class="sr-only" for="mobile">Mobile</label>
				                        	<input type="text" name="mobile" placeholder="Mobile *" class="mobile form-control" id="mobile">
				                        </div>
                                        
                                         <div class="form-group">
				                        	<label for="website">Upload Logo</label>
				                        	<input type="file" name="logo" id="website">
				                        </div>
				                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
			                    
			                    <fieldset class="box-shadow">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 2 / 4</h3>
		                            		<p>Set up your account:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-key"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                        
				                        <div class="form-group">
				                    		<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-repeat-password">Repeat password</label>
				                        	<input type="password" name="form-repeat-password" placeholder="Repeat password..." 
				                        				class="form-repeat-password form-control" id="form-repeat-password">
				                        </div>
				                        <button type="button" class="btn btn-previous">Previous</button>
				                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
			                    
			                    <fieldset class="box-shadow">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 3 / 4</h3>
		                            		<p>Social media profiles:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-twitter"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-facebook">Facebook</label>
				                        	<input type="text" name="form-facebook" placeholder="Facebook..." class="form-facebook form-control" id="form-facebook">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-twitter">Twitter</label>
				                        	<input type="text" name="form-twitter" placeholder="Twitter..." class="form-twitter form-control" id="form-twitter">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="instagram">Instagram</label>
				                        	<input type="text" name="instagram" placeholder="Instagram" class="instagram form-control" id="instagram">
				                        </div>
				                        <button type="button" class="btn btn-previous">Previous</button>
                                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
                                
                                <fieldset class="box-shadow">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 4 / 4</h3>
		                            		<p>Map Address</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-globe"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                        	<label class="sr-only" for="latitude">Map Latitude (Lat)</label>
				                        	<input type="text" name="latitude" placeholder="Map Latitude (Lat)" class="latitude form-control" id="latitude">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="longitude">Map Longitude (Lng)</label>
				                        	<input type="text" name="longitude" placeholder="Map Longitude (Lng)" class="longitude form-control" id="longitude">
				                        </div>
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				                        <button type="button" class="btn btn-previous">Previous</button>
                                        <button type="submit" class="btn">Sign me up!</button>
                                        
				                    </div>
			                    </fieldset>
		                    
		                    </form>
		                    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
<!-- ASKING FOR CURRENT LOCATION -->
<script language="javascript">
 if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(successFunction);
	} else {
		alert('It seems like Geolocation, which is required for this page, is not enabled in your browser. Please use a browser which supports it.');
	}
	
	function successFunction(position) {
		var lat = position.coords.latitude;
		var long = position.coords.longitude;
		
		document.getElementById('latitude').value = lat;
		document.getElementById('longitude').value = long;
		//console.log('Your latitude is :'+lat+' and longitude is '+long);
	}
</script>
<!-- / ASKING FOR CURRENT LOCATION -->
        <!-- Javascript -->
        <script src="{{ URL::asset('/public/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ URL::asset('/public/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/public/js/jquery.backstretch.min.js') }}"></script>
        <script src="{{ URL::asset('/public/js/retina-1.1.0.min.js') }}"></script>
        <script src="{{ URL::asset('/public/js/registrationscripts.js') }}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>