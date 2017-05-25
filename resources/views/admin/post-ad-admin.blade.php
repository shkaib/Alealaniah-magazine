@extends('layouts.admin')

@section('title', 'Post A New Ad')
<script src="{{ URL::asset('/public/js/jquery-1.11.1.min.js') }}"></script>
		
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
							<form role="form" method="post" enctype="multipart/form-data" 
                            	
								@if( !empty($ad->title) )
                                	action="{{ URL::route('updateMyAd', [$ad->id]) }}" onLoad="initGeolocation();">
                                @else
                            		action="{{ URL::route('posted-ad') }}" onLoad="initGeolocation();">
								@endif
                                
                                <div id="getCategory" class="form-group">
                                	
                                    @foreach( $category as $cat )
                                    	
                                        <a href="{{ URL::route('postAdById',[ $cat->id ]) }}" >
                                            <div class=" text-center list-box" id="-{{ $cat->id }}"> 
                                                <i class="fa {{ $cat->icon }} fa-2x" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                        
                                    @endforeach
                                </div>
                                
								<div class="form-group">
									<label>Title</label>
									<input type="text" name="title" class="form-control" placeholder="Title"
                                    	@if( !empty($ad->title) )
                                        	value="{{ $ad->title }}"
                                        @endif
                                        
                                        value="{{ old('title') }}"
                                    >
								</div>
                                
                                <div class="form-group">
									<label>price</label>
									<input type="text" name="price" class="form-control" placeholder="Price"
                                    	value="{{ old('price') }}"
                                    	@if( !empty($ad->price) )
                                        	value="{{ $ad->price}}"
                                        @endif
                                    >
								</div>
                                
                                
                                
                                <div class="form-group">
									<label>Image</label>
									<input type="file" name="featured">
								</div>
                               
                                
                                
                                
                                
                                @if(!empty($subcategories_id))
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        
                                        <select class="form-control" name="cat">
                                        
                                            @foreach( $subcategories_id as $subcategory )
                                                
                                                <option id="{{ $subcategory->parent_id }}" value="{{ $subcategory->id }}" > {{ $subcategory->name }} </option>
                                                
                                            @endforeach
                                        
                                        </select>
                                    </div>
								@endif								
								
								
								<div class="form-group">
									<label>Address</label>
									<textarea name="address" class="form-control" rows="3">
                                    	{{ old('address') }}
                                    	@if( !empty($ad->address) )
                                        	{{ $ad->address }}
                                        @endif
                                    </textarea>
								</div>
                                
                                <div class="form-group">
									<label>Details</label>
									<textarea name="details" class="form-control" rows="3">
                                    	{{ old('details') }}
                                    	@if( !empty($ad->details) )
                                        	{{ $ad->details}}
                                        @endif
                                    </textarea>
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

	