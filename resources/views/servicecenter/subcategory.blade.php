@extends('layouts.servicecenter')

@section('title', 'Categories')

@section('body')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Subcategories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">All Subcategories</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Subcategory</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
							
								<div class="form-group">
									<label>Subcategory Name</label>
									<input class="form-control" name="cat_name" type="text" placeholder="Subcategory Name *">
								</div>
																
								
                                <div class="form-group">
                                    <label>Select Parent Category</label>
                                    <select class="form-control">
                                        <option>Cars</option>
                                        <option>Jobs</option>
                                        <option>Connecting</option>
                                        <option>Electrical</option>
                                    </select>
                                </div>
																								
								<button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                
							</div>
							<div class="col-md-6">
                            	<h4><strong>Categories</strong></h4>
								
                                <table data-toggle="table" class="table table-bordered" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true" >Subcategory Name</th>
                                    <th data-field="id" data-sortable="true">Parent Category</th>
                                    <th data-field="price" data-sortable="true">Actions</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>Nissan</td>
                                        <td>Cars</td>
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
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

@endsection