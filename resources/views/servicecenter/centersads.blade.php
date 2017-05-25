@extends('layouts.servicecenter')

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
                        	
                        <div class="pull-right">
                        	<a href="{{ URL::route('getNewAdByCenter') }}">
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
                                    <th>Author</th>
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
                                    <td>{{ $ad->getCustomerName() }}</td>
                                    <td>
                                    	<!-- Active and Unactive Status -->
                                    	@if( $ad->activation == 0 )
                                            <h4 style="color:red">Unactive</h4>
                                        @else
                                            <h4 style="color:green">Active</h4>
                                        @endif
                                        <!-- /Active and Unactive Status -->
                                    </td>
                                    <td class="text-center">
                                    	
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