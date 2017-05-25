@extends('layouts.servicecenter')

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
                        	<a href="{{ URL::route('getCenterAds') }}">
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
							<form role="form" method="post" enctype="multipart/form-data" action="{{ URL::route('insertPostByCenter') }}" >

               	<div class="form-group">
               		<label for="title"> Title </label>
               		<input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"  placeholder="Enter Ad Title" >
               	</div>

               	<div class="form-group">
               		<label for="price"> Price </label>
               		<input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Enter Price" >
               	</div>

                <div class="form-group">
                  <label for="phone"> Phone Number </label>
                  <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Enter Phone Number" >
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
               		<label for="details"> Details </label>
               		<textarea name="details" id="details" class="form-control" row="7">{{ old('details') }}</textarea>
                </div>

               	<button type="submit" class="btn btn-primary">Submit Button</button>

							</div>
							<div class="col-md-6">
							
								<div class="form-group">
									
                               
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
        
         
		
	</div><!--/.main-->

	