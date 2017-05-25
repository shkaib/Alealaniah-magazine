<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alealaniah | Login</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> 

<link href="{{ URL::asset('/public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/public/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/public/css/styles.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/public/css/style.css') }}">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body style="background: url({{ asset('/public/img/login-bg.png') }}); background-size: 100%;">
	
	<div class="">
		<div class="" style="width: 25%; margin: 5% auto 0;">
            @if (count($errors) > 0)
                <div class="alert alert-danger" style="list-style:none;">
                    <ul style="list-style:none; margin:0; padding:0;" >
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="full text-center" style="padding-bottom: 50px;">
    	        <a href="{{ URL::route('mainpage') }}">
            		<img width="300px" src="{{URL::asset('/public/img/logo.png')}}"/>    
                </a>
            </div>
        
			<div class="login-panel panel panel-default box-shadow">
            	
            
				<div class="panel-heading">
                	Log in
                </div>
				<div class="panel-body">
					<form role="form" method="post" action="{{ URL::route('customerLogin_') }}">
						<fieldset>
							<div class="form-group">
								<input class="form-control" value="{{ Request::old('email') }}" placeholder="E-mail" name="email" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="submit" value="Login" class="btn btn-primary">
						</fieldset>
					</form>
                </div>
                
                
                
			</div>
            <div class="row nogape">
                <div class="col-md-6 text-center">
                    <a class="color-black" href="{{ URL::route('mainpage') }}">Lost Password ?</a>
                </div>
                <div class="col-md-6 text-center">
                    <a class="color-black" href="{{ URL::route('registration') }}" >Create an Account</a>
                </div>
            </div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="{{ URL::asset('/public/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ URL::asset('/public/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('/public/js/chart.min.js') }}"></script>
	<script src="{{ URL::asset('/public/js/chart-data.js') }}"></script>
	<script src="{{ URL::asset('/public/js/easypiechart.js') }}"></script>
	<script src="{{ URL::asset('/public/js/easypiechart-data.js') }}"></script>
	<script src="{{ URL::asset('/public/js/bootstrap-datepicker.js') }}"></script>
	<script>
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
