@extends('layouts.admin')

@section('title', 'Categories')

@section('body')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">All Categories</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Category</div>
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
                    
						<div class="col-md-6">
							<form role="form" method="post" 
                            	
                                @if( !empty($category_update) )
                                	action="{{ URL::route('update-category', [$category_update->id]) }}"
                                @else
                            		action="{{ URL::route('insert-category') }}"
                                @endif
                                >
								
                                
                                
								<div class="form-group">
									<label>Category Name</label>
									<input class="form-control" name="cat_name" type="text"
                                    	@if( !empty($category_update) )
                                			value="{{ $category_update->name }}"
                                		@endif
                                    placeholder="Category Name *">
								</div>
																
								
                                <div class="form-group">
                                    <label>Background Color</label>
                                    <select class="form-control" name="color_">
                                    	@if( !empty($category_update) )
                                			<option value="{{ $category_update->color}}">{{ $category_update->color}}</option>
                                		@endif
                                    
                                        <option value="red">Red</option>
                                        <option value="blue">Blue</option>
                                        <option value="green">Green</option>
                                        <option value="gray">Gray</option>
                                        <option value="pink">Pink</option>
                                        <option value="purpal">Purpal</option>
                                    </select>
                                </div>
								
								
								<div class="form-group">
								  <label>Icon</label>
								  <input class="form-control" name="icon_name" type="text" placeholder="Icon"
                                  	@if( !empty($category_update) )
                                        value="{{ $category_update->icon }}"
                                    @endif
                                  >
								</div>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
																
								<button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                
							</div>
							<div class="col-md-6">
                            	<h4><strong>Categories</strong>
                                    <div class="col-lg-2 pull-right text-right">
                                        {{ count($categories) }}
                                    </div>
                                </h4>
								
                                <table data-toggle="table" class="table table-bordered" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true" >Category Name</th>
                                        <th data-field="id" data-sortable="true">Background Color</th>
                                        <th data-field="name"  data-sortable="true">Icon</th>
                                        <th data-field="price" data-sortable="true">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	@if( count($categories) === 0 )
                                    	
                                        <tr>
                                        	<td colspan="4">Nothing Found</td>
                                        </tr>
                                        
                                    @else
                                
                                        @foreach( $categories as $category )
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->color }}</td>
                                                <td>{{ $category->icon }}</td>
                                                <td class="text-center">
                                                   <a href="{{ URL::route('edit-category', [$category->id]) }}">	
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                    
                                                    <a href="{{ URL::route('delete-category', [$category->id]) }}"> 
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
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

@endsection