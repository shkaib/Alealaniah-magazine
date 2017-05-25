@extends('layouts.admin')

@section('title', 'Ads')


@section('body')	
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Ads</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ads</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- Heading Panel -->
                    <div class="panel-heading">
                    	All Ads  | 
                        	@if( count($ads) == 1 )
                            	Total Ad {{ count($ads) }}
                            @elseif( count($ads)  == 0 )
                            	Nothing Found
                            @elseif(count($ads) > 1)
                        		Total Ads {{ count($ads) }}
                            @endif
                        <div class="pull-right">
                        	<a href="{{ URL::route('post-new-ad-by-admin') }}">
                        		<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add New Ad
                        	</a>
                        </div>
                    </div>
                    <!-- /Heading Panel -->
					<div class="panel-body">
                    
                   	 @if( count($errors) > 0 )
                        <section class="alert alert-danger">
                            <ul>
                                @foreach( $errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>        
                        </section>
                      @endif
                    
                      @if( Session::has('success') )
                        <section class="alert alert-success">
                            {{ Session::get('success') }}        
                        </section>
                      @endif
                    	
                                                
                        <table class="table table-condensed">
                        	<thead>
                            	<tr>
                                	<th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <?php $i = 0 ?>
                            <tbody>
                            	@foreach($ads as $ad)  
                                <?php $i++ ?>
                            	<tr>
                                	<td>{{ $i }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->price }}</td>
                                    
                                    <td>
                                    	<!-- Active and Unactive Status -->
                                    	@if( $ad->activation == 0 )
                                            <h4 style="color:red">Unactive</h4>
                                        @else
                                            <h4 style="color:green">Active</h4>
                                        @endif
                                        <!-- /Active and Unactive Status -->
                                    </td>
                                    <td>
                                    	
                                        <!-- Make Active and Unactive -->
                                         @if( $ad->activation == 0 )
                                            <a href="{{ URL::route('approve-ad', [$ad->id]) }}" class="col-lg-4 nogape" style="color:#1EBFAE">
                                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                Approve
                                            </a>
                                         @else
                                            <a href="{{ URL::route('ban-ad', [$ad->id]) }}" class="col-lg-4 nogape" style="color:#FFB53E">
                                                <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                                                Block
                                            </a>
                                         @endif
                                         <!-- / Make Active and Unactive -->
                                         
                                         <!-- View Ad -->
                                         <a href="{{ URL::route('view-ad-by-admin', [$ad->id]) }}" class="col-lg-4 nogape">
                                             <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                             View Ad
                                         </a>
                                         <!-- / View Ad -->
                                        	
                                         <!-- Delete Current Ad -->  
                                         <a href="{{ URL::route('delete-ad', [$ad->id], [$ad->name]) }}" class="col-lg-4 nogape" style="color:red">
                                             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                             Delete
                                         </a>
                                         <!-- / Delete Current Ad -->
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		
	</div><!--/.main-->

@endsection