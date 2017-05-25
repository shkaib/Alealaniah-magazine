@extends('layouts.servicecenter')

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
						<table data-toggle="table" class="table table-bordered" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="true" >Customer ID</th>
						        <th data-field="id" data-sortable="true">Customer Name</th>
						        <th data-field="name"  data-sortable="true">Company Name</th>
						        <th data-field="price" data-sortable="true">Actions</th>
						    </tr>
						    </thead>
                            
                            <tbody>
                            	<tr>
                                	<td>1</td>
                                    <td>Golden Cars</td>
                                    <td>Golden Cars</td>
                                    <td class="text-center">
                                    	<a href="#">
                                    		<span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
                                        </a>
                                        
                                        <a href="#">	
                                        	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        
                                        <a href="#"> 
                                        	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		
	</div><!--/.main-->

@endsection