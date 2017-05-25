@extends('layouts.admin')

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
                            	
                            	@if (!empty($details->id))
                                	action="{{ URL::route('updated-subcategory', [$details->id]) }}">
                                @else
                                	action="{{ URL::route('insert-subcategory') }}">
                                @endif
                            	
								<div class="form-group">
									<label>Subcategory Name</label>
									<input class="form-control" name="cat_name" type="text" placeholder="Subcategory Name *" 
                                    	@if (!empty($details->id))
                                            value ="{{ $details->name }}"
                                        @endif
                                    >
								</div>
																
								
                                <div class="form-group">
                                    <label>Select Parent Category</label>
                                    <select class="form-control" name="parent">
                                    	
                                        @if (!empty($details->id))
                                            <option value="{{ $details->parent_id }}">{{ $details->getCategoryName() }}</option>
                                        @endif
                                    	
                                    	@foreach( $category as $categories )
										    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                        @endforeach                                    
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                	<label>Select Icon</label>
                                    <select class="form-control" name="subcat_icon">
                                    	<option value="/public/img/pinpoints/accessory.png">Accessory</option>
                                        <option value="/public/img/pinpoints/car.png">Car</option>
                                        <option value="/public/img/pinpoints/coins.png">Coin</option>
                                        <option value="/public/img/pinpoints/collectibles.png">Collectibles</option>
                                        <option value="/public/img/pinpoints/doctor.png">Doctor</option>
                                        <option value="/public/img/pinpoints/games.png">Games</option>
                                        <option value="/public/img/pinpoints/home.png">Home</option>
                                        <option value="/public/img/pinpoints/jobs.png">Jobs</option>
                                        <option value="/public/img/pinpoints/laptop.png">Laptop</option>
                                        <option value="/public/img/pinpoints/mobile.png">Mobile</option>
                                        <option value="/public/img/pinpoints/office.png">Office</option>
                                        <option value="/public/img/pinpoints/other.png">Other</option>
                                        <option value="/public/img/pinpoints/restorents.png">Restorents</option>
                                        <option value="/public/img/pinpoints/services.png">Services</option>
                                        <option value="/public/img/pinpoints/tv.png">Tv</option>
                                        <option value="/public/img/pinpoints/toys.png">Toys</option>
                                        <option value="/public/img/pinpoints/travel.png">Travel</option>
                                    </select>
                                </div>
								
                                <input type="hidden" name="_token" value="{{Session::token()}}"  >													
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
                                    <th data-field="id" data-sortable="true">Category Icon</th>
                                    <th data-field="price" data-sortable="true">Actions</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @if( count($subcategory) == 0 )
                                	<tr>
                                        <td colspan="3">Sorry Noting Found</td>
                                    </tr>
                                @else
                                
                                    @foreach( $subcategory as $subcategories )
                                    <tr>
                                        <td>{{ $subcategories->name }}</td>
                                        <td>{{ $subcategories->getCategoryName() }}</td>
                                        <td><img src="{{ asset('/public'.$subcategories->icon) }}" /></td>
                                        <td class="text-center">
                                                                                        
                                            <a href="{{ URL::route('update-subcategory', [$subcategories->id]) }}">	
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            
                                            <a href="{{ URL::route('deleteSubcategory', [$subcategories->id ])}}"> 
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