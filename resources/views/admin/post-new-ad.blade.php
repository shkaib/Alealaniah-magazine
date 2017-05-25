@extends('layouts.admin')

@section('title', 'Post A New Ad')
		
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
                    	Form For New Ad
                    	<div class="pull-right">
                        	<a href="#">
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
							<form role="form" method="post" enctype="multipart/form-data" action="{{ URL::route('posted-new-ad-by-admin') }}" onLoad="initGeolocation();">
							
								<div class="form-group">
									<label>Title</label>
									<input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
								</div>
                                
                                <div class="form-group">
									<label>price</label>
									<input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="Price">
								</div>
                                
                                <div class="form-group">
									<label>E-mail</label>
									<input type="email" name="email" class="form-control" placeholder="email"
                                    	value="{{ old('price') }}"
                                    >
								</div>
                                
                                <div class="form-group">
									<label>Phone</label>
									<input type="text" name="phone" class="form-control" placeholder="Phone"
                                    	value="{{ old('phone') }}"
                                    >
								</div>
                                
                                <div class="form-group">
									<label>Image</label>
									<input type="file" name="featured">
								</div>
                                
                                <div class="form-group">
									<label>Select Category</label>
									<select class="form-control" name="cat">
                                    	@foreach( $subcategories as $subcategory )
											<option value="{{ $subcategory->id }}" > {{ $subcategory->name }} </option>
                                        @endforeach
                                    </select>
								</div>
																
								
								
								<div class="form-group">
									<label>Address</label>
									<textarea name="address" class="form-control" rows="3"></textarea>
								</div>
                                
                                <div class="form-group">
									<label>Details</label>
									<textarea name="details" class="form-control" rows="3"></textarea>
								</div>
                                
                              <button type="submit" class="btn btn-primary">Submit Button</button>
							</div>
							<div class="col-md-6">
							
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
        
         <!--<script language="javascript">
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
			</script>-->
		
	</div><!--/.main-->

	