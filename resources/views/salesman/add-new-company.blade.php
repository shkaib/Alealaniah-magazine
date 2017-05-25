@extends('layouts.salesman')

@section('title', 'Post A New Ad')
<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Post New Ad</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Forms</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                    	Form For Post New Ad
                    	<div class="pull-right">
                        	<a href="{{ URL::route('viewMyAds') }}">
                        		<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> View Your Ads
                        	</a>
                        </div>    
                    </div>
					<div class="panel-body">
                    
                    <div class="panel-body">
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
                    
						<div class="col-md-6">
							<form role="form" method="post" enctype="multipart/form-data" action="{{ URL::route('addNewComapnyPost') }}" onLoad="initGeolocation();"
                            	
								@if( !empty($ad->title) )
                                	action="{{ URL::route('updateMyAd', [$ad->id]) }}"">
                                @else
                            		action="{{ URL::route('posted-ad') }}"  
								@endif
                                >

                               	<div class="form-group">
                               		<label for="name"> Name </label>
                               		<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"  placeholder="Enter Company Name" >
                               	</div>

                               	<div class="form-group">
                               		<label for="email"> Email </label>
                               		<input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter Company Email" >
                               	</div>

                               	<div class="form-group">
                               		<label> Address </label>
                               		<input type="text" name="address" value="" class="form-control" id="address" placeholder="Address of the Company">
                               	</div>

                               	<div class="form-group">
                               		<label for="category" >Select Category</label>
	                               	<select name="category" class="form-control" id="category">
	                               		@foreach( $category as $c )
	                               			<option value="{{ $c->id }}"> {{ $c->name }} </option>
	                               		@endforeach
	                               	</select>
                               	</div>

                               	<div class="form-group">
                               		<label for="phone"> Phone Number </label>
                               		<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Enter Company Phone Number" >
                               	</div>

                               	<div class="form-group">
                               		<label for="details"> Details </label>
                               		<textarea name="details" value="{{ old('details') }}" id="details" rows="7" >{{ old('details') }}</textarea>
                               	</div>

                               	<div class="form-group">
                               		<label for="facebook"> Facebook </label>
                               		<input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control" id="facebook" placeholder="Enter Company Facebook" >
                               	</div>

                               	<div class="form-group">
                               		<label for="twitter"> Twitter </label>
                               		<input type="text" name="twitter" value="{{ old('twitter') }}" class="form-control" id="twitter" placeholder="Twitter" >
                               	</div>

                               	<div class="form-group">
                               		<label for="instagram"> Instagram </label>
                               		<input type="text" name="instagram" value="{{ old('instagram') }}" class="form-control" id="instagram" placeholder="Instagram" >
                               	</div>

                               	<div class="form-group">
                               		<label for="snapchat"> Snapchat </label>
                               		<input type="text" name="snapchat" value="{{ old('snapchat') }}" class="form-control" id="snapchat" placeholder="Snapchat of Company" >
                               	</div>

                               	<div class="form-group">
                               		<label for="website"> Website </label>
                               		<input type="text" name="website" value="{{ old('website') }}" class="form-control" id="website" placeholder="Website of the Company" >
                               	</div>
                                
                              <button type="submit" class="btn btn-primary">Submit Button</button>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<input type="file" name="featured" >
								</div>
							
								<div class="form-group">
									<label>Location Co-ordinates</label>
									<input type="text" id="lat" name="lat" value="" class="form-control" placeholder="Latitude">
                                    <input type="text" id="lng" name="lng" value="" class="form-control" placeholder="Longitude">
                                </div>
                                
                               
                                <div class="form-group">
									<label>Your Name</label>
									<input type="text" id="myname" name="myname" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                </div>
								
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
        
         <script language="javascript">
			 if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(successFunction);
				} else {
					alert('It seems like Geolocation, which is required for this page, is not enabled in your browser. Please use a browser which supports it.');
				}
				
				function successFunction(position) {
					var lat = position.coords.latitude;
					var long = position.coords.longitude;
					
					document.getElementById('lat').value = lat;
					document.getElementById('lng').value = long;
					//console.log('Your latitude is :'+lat+' and longitude is '+long);
				}
			</script>
		
	</div><!--/.main-->

	