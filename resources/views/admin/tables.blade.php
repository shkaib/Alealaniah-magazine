@extends('layouts.admin')

@section('title', 'Customers')


@section('body')	
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Customers</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customers</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- Heading Panel -->
                    <div class="panel-heading">
                    	All Users 
                        <div class="pull-right">
                        	<a href="#">
                        		<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add New Customer
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
						        <th data-field="id" data-sortable="true">Customer Name</th>
						        <th data-field="name"  data-sortable="true">E-mail</th>
                                <th data-field="name"  data-sortable="true">Contact Number</th>
                                <th>Member Since</th>
                                <th data-field="name"  data-sortable="true">Status</th>
						        <th data-field="price" data-sortable="true">Actions</th>
						    </tr>
						    </thead>
                            
                            <tbody>
                            	
                                
                                	@if( count($customer) == 0)
                                    	<tr>
                                    		<td colspan="4"><h2 class="text-center">Nothing Found</h2></td>
                                    	</tr>
                                    @else
                                    	<?php $i = 0 ?>
                                    	@foreach( $customer as $customers )
                                        	<?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><a href="{{ URL::route( 'companies' , [ $customers->id ] ) }}">{{ $customers->name }}</a></td>
                                                <td>{{ $customers->email }}</td>
                                                <td>{{ $customers->phone }}</td>
                                                <td>{{ $customers->created_at }}</td>
                                                <td>@if( $customers->active == 1 )
                                                        <span style="color:green">Active</span>
                                                    @else
                                                        <span style="color:red">Unactive</span>
                                                    @endif</td>
                                                <td class="text-center">
                                                	
                                                    @if( $customers->active == 1 )
                                                        <a href="{{ URL::route('ban-customer', [$customers->id]) }}">
                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span>
                                                        </a>
                                                    @else
                                                        <a href="{{ URL::route('approve-customer', [$customers->id]) }}">
                                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"> </span>
                                                        </a>
                                                    @endif
                                                    
                                                     | 
                                                    
                                                    <a href="{{ URL::route( 'companies' , [ $customers->id ] ) }}">
                                                        <span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
                                                    </a>
                                                    
                                                    <a href="{{ URL::route('customer-delete', [ $customers->id ]) }}"> 
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