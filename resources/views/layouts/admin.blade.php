<!DOCTYPE html>
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


<!-- TinyMCS -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!-- Font Awesome -->
<script src="https://use.fontawesome.com/d4d769f094.js"></script>
<!--Icons-->
<script src="{{ URL::asset('/public/js/lumino.glyphs.js') }}"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
@if( Auth::check() )
    @if( Auth::user()->admin_type == 3 )
    	<script>window.location = "{{ URL::route('salesManDashboard') }}";</script>
    @elseif( Auth::user()->admin_type == 1 )
    	<script>window.location = "{{ URL::route('customer-dashboard') }}";</script>
    @elseif( Auth::user()->admin_type == 4 )
    	<script>window.location = "{{ URL::route('viewsalesman') }}";</script>
    @endif


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
				<a class="navbar-brand" href="{{ URL::route('dashboard') }}"><span>Alealaniah</span>Admin</a>
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
                        	<li><a href="{{ URL::route('mainpage') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></use></svg> Website</a></li>
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
			<li><a href="{{ URL::route('dashboard') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            <li><a href="{{ URL::route('mainpage') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></use></svg> Website</a></li>
            <li><a href="{{ URL::route('magazine') }}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Magazines</a></li>
			<li><a href="{{ URL::route('ads') }}"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> Ads</a></li>
			<li><a href="{{ URL::route('category') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Category</a></li>
            <li><a href="{{ URL::route('subcategory') }}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Subcategories</a></li>
			<li><a href="{{ URL::route('customer') }}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Customers</a></li>
			<li><a href="{{ URL::route('viewsalesman') }}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Salesman</a> </li>
			<li><a href="{{ URL::route('getAllServiceCenters') }}" ><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Service Centers</a></li>
			
			<!--<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>-->
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
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
