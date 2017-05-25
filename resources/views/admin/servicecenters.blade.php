@extends('layouts.admin')

@section('title', 'Salesman')


@section('body')	
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Salesman</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Salesman</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- Heading Panel -->
                    <div class="panel-heading">
                    	All Users 
                        <div class="pull-right">
                        	<a href="{{ route('getServiceCenters') }}">
                        		<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add New Salesman
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
						<table data-toggle="table" class="table table-bordered" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="true" >#</th>
						        <th data-field="id" data-sortable="true">Salesman Name</th>
						        <th data-field="name"  data-sortable="true">E-mail</th>
                                <th data-field="name"  data-sortable="true">Contact Number</th>
                                <th data-field="name"  data-sortable="true">Member Since</th>
                                <th data-field="name"  data-sortable="true">Status</th>
						        <th data-field="price" data-sortable="true">Actions</th>
						    </tr>
						    </thead>
                            
                            <tbody>
                            	
                                
                                	@if( count($servicecenter) == 0)
                                    	<tr>
                                    		<td colspan="4"><h2 class="text-center">Nothing Found</h2></td>
                                    	</tr>
                                    @else
                                    	<?php $i = 0 ?>
                                    	@foreach( $servicecenter as $ser )
                                        	<?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $ser->name }}</td>
                                                <td>{{ $ser->email }}</td>
                                                <td>{{ $ser->phone }}</td>
                                                <td>{{ $ser->created_at }}</td>
                                                <td>@if( $ser->active == 1 )
                                                        <span style="color:green">Active</span>
                                                    @else
                                                        <span style="color:red">Unactive</span>
                                                    @endif</td>
                                                <td class="text-center">
                                                	@if( $ser->active == 1 )
                                                        <a href="{{ URL::route('blockSalesMan', [$ser->id]) }}">
                                                            <span class="fa fa-ban" aria-hidden="true"> </span>
                                                        </a>
                                                    @else
                                                        <a href="{{ URL::route('activeSalesMan', [$ser->id]) }}">
                                                            <span class="fa fa-check" aria-hidden="true"> </span>
                                                        </a>
                                                    @endif
                                                    
                                                     | 
                                                    
                                                    <a href="#">
                                                        <span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
                                                    </a>
                                                    
                                                    <a href="{{ URL::route('deleteSalesMan', [$ser->id]) }}"> 
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>
                                                  
                                                </td>
                                            </tr>
                                      	@endforeach  
                                    @endif
                                	
                            </tbody>
                            
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		
	</div><!--/.main-->

@endsection