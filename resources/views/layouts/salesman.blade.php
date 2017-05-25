/public<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alealaniah - @yield('title')</title>

<!-- Google Fonts (open-sans) -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 

<link href="{{ URL::asset('/public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/public/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/public/css/styles.css') }}" rel="stylesheet">
<!--<link href="{{ URL::asset('/public/css/style.css') }}" rel="stylesheet">-->

<!-- Font Awesome -->
<script src="https://use.fontawesome.com/d4d769f094.js"></script>
<!-- TinyMCS -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!--Icons-->
<script src="{{ URL::asset('/public/js/lumino.glyphs.js') }}"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

    @if( Auth::user()->admin_type == 1 )
    	<script>window.location = "{{ URL::route('customer-dashboard') }}";</script>
    @elseif( Auth::user()->admin_type == 2 )
    	<script>window.location = "{{ URL::route('dashboard') }}";</script>
    @elseif( Auth::user()->admin_type == 4 )
    	<script>window.location = "{{ URL::route('viewsalesman') }}";</script>
    @endif
   

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ URL::route('salesManDashboard') }}"><span>Alealaniah</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
                        	@if( Auth::check() )
                                Welcome  {{ Auth::user()->name }}
                            @else
                            	<script type="text/javascript">
                                    window.location = "{{ URL::route('customerLogin') }}";//here double curly bracket
                                </script>
                            @endif
                         <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
                        
                        
                            <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                            <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                            <li><a href="{{ URL::route('customerLogout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                          
							
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="{{ URL::route('salesManDashboard') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            @if( Auth::check() )
            	@if( Auth::user()->active == 1 )
			<li><a href="{{ URL::route('viewMyAds') }}"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> My Companies</a></li>
            <li><a href="{{ URL::route('addNewCompany') }}"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Add New Company</a></li>
      			@endif
            @endif
                        
			<li role="presentation" class="divider"></li>
			<li><a href="{{ URL::route('customerLogout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
    
    
    @yield('body')
    
    	<script src="{{ URL::asset('/public/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ URL::asset('/public/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('/public/js/chart.min.js') }}"></script>
	<script src="{{ URL::asset('/public/js/chart-data.js') }}"></script>
	<script src="{{ URL::asset('/public/js/easypiechart.js') }}"></script>
	<script src="{{ URL::asset('/public/js/easypiechart-data.js') }}"></script>
	<script src="{{ URL::asset('/public/js/bootstrap-datepicker.js') }}"></script>
    
</body>

</html>
