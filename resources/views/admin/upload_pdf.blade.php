@extends('layouts.admin')

@section('title', 'Upload PDF')


@section('body')	
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Magazines</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Upload Magazine</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
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
                  
                   @if( Session::has('fail') )
                    <section class="alert alert-danger">
                        {{ Session::get('fail') }}        
                    </section>
                  @endif
            
				<div class="panel panel-default">
					<!-- Heading Panel -->
                    <div class="panel-heading">
                    </div>
                    <!-- /Heading Panel -->
					<div class="panel-body">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        	<h3>Upload</h3>
                        
                        	<div class="form-magazine">
                            	<form method="post" action="{{ URL::route('uploadMagazine') }}" enctype="multipart/form-data" >
                                	<div class="form-group">
                                    	<label for="magazine_numer">Magazine Number</label> <br />
                                        <input name="magazine_number" id="magazine_number" class="form-control" value="{{ old('magazine_number') }}" placeholder="Enter Magazine Number">
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label for="magazine_thumbnail">Select thumbnail for Magazine</label>
                                        <input type="file" name="magazine_thumbnail" id="magazine_thumbnail" accept="image/*">
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label for="magazine_thumbnail">Select PDF for Magazine</label>
                                        <input type="file" name="newmagazine" id="magazine_thumbnail" accept="application/pdf">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                    	<input type="submit" value="Submit" class="btn btn-large btn-success" />
                                    </div>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-sm-6 col-xs-6">
                        	@foreach( $magazine as $magazines )
                            	<div class="col-lg-3" style="min-height: 420px;">
                                	<a href="{{ asset( '/public/'.$magazines->magazine_pdf ) }}">
                                    	<img src="{{ asset( '/public/'.$magazines->magazine_picture ) }}" alt="{{ $magazines->magazine_number }}" class="img-thumbnail">
                                    </a>
                                    <div class="text-center">
                                    	{{ $magazines->magazine_number }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		
	</div><!--/.main-->


@endsection