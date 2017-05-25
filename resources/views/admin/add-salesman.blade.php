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
                    	Add New Salesman
                    	<div class="pull-right">
                        	<a href="{{ route('viewsalesman') }}">
                        		<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> View All Salesman
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
							<form role="form" method="post" enctype="multipart/form-data" action="{{ route('addSalesman') }}">
							
								<div class="form-group">
									<label for="name">Salesman Name</label>
									<input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
								</div>
                                
                                <div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
								</div>
                                
                               	<div class="form-group">
                               		<label for="password">Add Password</label>
                               		<input type="text" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                               	</div>

                               <div class="form-group">
                               		<label for="designation">Add Designation</label>
                               		<input type="text" id="designation" name="designation" class="form-control" placeholder="Add Designation" value="{{ old('designation') }}">
                               </div>

                               <div class="form-group">
                               		<label for="phone">Phone Number</label>
                               		<input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                               </div>

                               <div class="form-group">
                               		<label for="details">Add Details</label>
                               		<textarea rows="8" name="details" id="details" class="form-control" >{{ old('details') }}</textarea>
                               </div>

                              	<button type="submit" class="btn btn-primary">Submit</button>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for="image">Image</label>
									<input type="file" id="image" name="featured">
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

	