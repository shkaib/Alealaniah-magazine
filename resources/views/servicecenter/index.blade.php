@extends('layouts.servicecenter')

@section('title', 'Dashboard')

@section( 'body' )


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('customer-dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
			
			
			<div class="col-xs-12 col-md-6 col-lg-3">
            	@if(Auth::user()->active == 1 )
                    <div class="panel panel-teal panel-widget">
                    
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-5 widget-left">
                                <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-7 widget-right">
                                <div class="large">Approved</div>
                                <div class="text-muted">Profile Status</div>
                            </div>
                        </div>
                    </div>    
                @else
                    <div class="panel panel-red panel-widget">
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-5 widget-left">
                                <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-7 widget-right">
                                <div class="large">Pending</div>
                                <div class="text-muted">Profile Status</div>
                            </div>
                        </div>
                    </div>
                @endif
			</div>
		</div><!--/.row-->
        
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Customer Ads Controll</div>
					<div class="panel-body">
                    
                    @if( Auth::check() )
            			@if( Auth::user()->active == 1 )
                    
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                        	<a href="#">
                                <div class="borderd-panel">
                                	<a href="{{ URL::route('getNewAdByCenter') }}">
                                    
										<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                                        
                                        <div class="col-lg-12 nogape ">
                                            <h2>Add new ad</h2>
                                        </div>
                                    
                                    </a>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                        	<a href="{{ URL::route('getCenterAds') }}">
                                <div class="borderd-panel">
                                    <svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg>
                                    
                                    <div class="col-lg-12 nogape ">
                                    	<h2>View your ads</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        
                        
                        @endif
                    @endif
                        
                        
					</div>
				</div>
			</div>
		</div><!--/.row-->
        
        
	</div>	<!--/.main-->

@endsection