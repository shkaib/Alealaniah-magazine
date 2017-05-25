<!doctype html>
<html lang="en"><head>
<meta charset="utf-8">
<title>Alealaniah | @yield('title')</title>

<!-- FAVICON LINK -->
<link rel="shortcut icon" href="{{{ asset('/public/favicon.png') }}}" type="image/x-icon">
<link rel="icon" href="{{{ asset('/public/favicon.png') }}}" type="image/x-icon">

<!-- On Page SEO Tags -->
<meta name="description" content="a creative and innovative advertising magazine, we utilize our experienced team of professionals who possess the strong ability to understand & visualize your idea and process it into a creative and innovative concept for publicity, and marketing. We've created innovative advertising solutions and stunning identities for businesses in all range of sectors, adding value through magazines & social media" />

<meta name="keywords" content="ALEALANIAH, Free classified ads, Buy & sell in Bahrain, new & used items. Jobs Wanted, Jobs Offered, Jobs in Bahrain. New Jobs, Car, Cars, Property for rent, Property for sell, office for rent, office for sell" />
<meta name="copyright" content="Copyright ©2016 - 2017" />
<meta name="revisit-after" content="1 Days" />
<meta name="expires" content="never">
<meta name="distribution" content="global" />
<meta name="robots" content="index,follow" />

<!-- Bootstrap Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="http://yoursite.com/main.css" />

<!-- Google Fonts (open-sans) -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" /> 
<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet"> 

<!-- Area of Stylesheets -->
<link rel="stylesheet" href="{{ URL::asset('/public/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('/public/css/style.css') }}"/>
<link rel="stylesheet" href="{{ URL::asset('/public/css/jquery.mCustomScrollbar.css') }}"/>

<!-- Font Awesome -->
<script async  type="text/javascript" src="https://use.fontawesome.com/d4d769f094.js"></script>
<!-- GOOGLE RECAPTCHA -->
<script async  type="text/javascript"  src='https://www.google.com/recaptcha/api.js'></script>




    
<!-- Share on Social Media -->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "31ccc177-4102-438d-b6a8-9a81feaf6925", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
	
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <!-- sidebarToggle Button -->
    	
        <div class="sidebarToggle" id="navButton">
        	<img src="{{ asset('/public/img/menu.png') }}" />
        </div>
        
    <!-- sidebarToggle Button -->
    
    <!-- Logo -->
    	<div class="logoFixed">
        	<a href="{{ URL::route('mainpage') }}">
                <img width="250px" alt="Alealaniah | Logo" src="{{ asset( '/public/img/logo.png' ) }}" />
            </a>
        </div>
    <!-- /Logo -->
    
    <!-- sidebar -->
    <div id="sideBar" class="side-bar pull-left">
    	
        <div class="sidebarToggle1" id="navButtonCross">
        	<img src="{{ asset('/public/img/cross.png') }}" />
        </div>
        
    	<div class="navbody pull-left row nogape">
            <!-- Logo -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 logo">
                <a href="{{ URL::route('mainpage') }}">
                    <img width="250px" alt="Alealaniah | Logo" src="{{ asset( '/public/img/logo.png' ) }}" />
                </a>
            </div>
            <!-- /Logo -->
            
            
            
             <!-- Main Nav -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            	<div class="navHeading margin-bottom-160 pull-left col-lg-12">
                	<div class="navHeading">Navigation 
                    <div class="smart-object" style="position: absolute; transform-style: flat; backface-visibility: hidden; transform: translate3d(0px, 0px, 0px); width: 45px; height: 1px; top: 8px; right: -49px; background-color: rgb(185, 191, 187);"></div>
                    </div>
                </div>
            	
                
                
                 <ul class="navbar nogape">
                 	<li><a href="{{ URL::route('mainpage') }}">Home</a></li>
                    <li><a href="{{ URL::route('about') }}">About</a></li>
                    <li><a href="{{ URL::route('allCategories') }}">Categories</a></li>
                    <li><a href="{{ URL::route('customers') }}">Companies</a></li>
                    <li><a href="{{ URL::route('serviceCenters') }}">Service Centers</a></li>
                    <li><a href="{{ URL::route('getMagazines') }}">Magazines</a></li>
                    <li><a href="{{ URL::route('contact') }}">Contact</a></li>
                    </br> </br>
                    <li><a class="border-1" href="{{ URL::route( 'customerLogin' ) }}">Post an ad</a></li>
                 </ul>
            </div>
            <!-- /Main Nav -->
        </div>
        
        <div class="col-lg-12 nogape nav-footer pull-left">
        	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            
            	@if( Auth::check() )
                    {{ Auth::user()->name }}
                    <!--<a href="{{ URL::route('customer-dashboard') }}" >Dashboard</a>
                    <a href="{{ URL::route('customerLogout') }}"> Logout </a>-->
                @else
                    <a href="{{ URL::route( 'customerLogin' ) }}" class="font-11">Login</a>
                    <a href="{{ URL::route('registration') }}" class="font-11">Register</a>
                    </br>
                    <a class="font-11" href="mailto:info@alealaniah.com">info@alealaniah.com</a>
                @endif
                
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            	&nbsp;
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            	&nbsp;
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            	<ul class="inline-list margin-bottom-5">
                	<li><a href="https://www.facebook.com/www.alealaniah.net/" target="_blank" class="color-gray"><i class="fa fa-facebook-official icon-3x"  aria-hidden="true"></i></a></li> 
                    <li><a href="https://twitter.com/AlealaniahM" target="_blank" class="color-gray"><i class="fa fa-twitter-square icon-3x" aria-hidden="true"></i></a></li>
                    <li><a href="http://alealaniah.tumblr.com/post/148083334454" target="_blank" class="color-gray"><i class="fa fa-tumblr-square icon-3x" aria-hidden="true"></i></a></li> 
                    <li><a href="https://www.instagram.com/al_ealaniah/" target="_blank" class="color-gray"><i class="fa fa-instagram icon-3x" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCNuIHDcYrBhSTmIPOSOQAUw" target="_blank" class="color-gray"><i class="fa fa-youtube-square icon-3x" aria-hidden="true"></i></a></li>
                </ul>
                <p class="font-11">© 2016 All Rights Reserved </p>
            </div>
        </div>
        
    </div>
    <!-- sidebar -->

	
    
    <!-- BODY DIV -->
	<div class="body">
    	
        @yield('body')
        
    </div>
	<!-- /BODY DIV -->
    
    

<!-- STARTING FOOTER AREA FROM HERE -->
<!-- Footer Black Body -->
<!--<div class="bg-black padding-15 margin-top-30">
	<div class="container">
    	
        <div class="row nogape text-left">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nogape">
                <h2>Resent Ads</h2>
                
                <div class="list-no-dots">
                	<ul class="nogape">
                    	<li><a href="#">White Knight Washing Machine</a></li>
                        <li><a href="#">Land for Sale in Salmabad</a></li>
                        <li><a href="#">Land for sale in Askar</a></li>
                        <li><a href="#">Toyota Landcruiser</a></li>
                        <li><a href="#">Nissan Juke 2016</a></li>
                        <li><a href="#">Land for sale in Askar</a></li>
                    </ul>
                </div>
                
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nogape">
                <h2>Quick Links</h2>
                <div class="list-no-dots">
                	<ul class="nogape">
                    	<li><a href="{{ URL::route('about') }}">About</a></li>
                        <li><a href="{{ URL::route('allCategories') }}">Categories</a></li>
                        <li><a href="{{ URL::route('customers') }}">Companies</a></li>
                        <li><a href="#">Service Centers</a></li>
                        <li><a href="{{ URL::route('getMagazines') }}">Magazines</a></li>
                        <li><a href="{{ URL::route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nogape">
                <h2>Social Links</h2>
                <div class="list-no-dots">
                	<ul class="nogape">
                    	<li>
                        	<a href="https://www.facebook.com/www.alealaniah.net/" target="_blank" class="color-gray">
                                <span><i class="fa fa-facebook-official icon-3x"  aria-hidden="true"></i></span>
                                <span>&nbsp; Facebook</span>
                            </a>
                        </li> 	
                        <li>
                        	<a href="https://twitter.com/AlealaniahM" target="_blank" class="color-gray">
                            	<span><i class="fa fa-twitter-square icon-3x" aria-hidden="true"></i></span>
                                <span>&nbsp; Twitter</span>
                            </a>
                        </li>
                        <li>
                        	<a href="http://alealaniah.tumblr.com/post/148083334454" target="_blank" class="color-gray">
                            
                            	<span><i class="fa fa-tumblr-square icon-3x" aria-hidden="true"></i></span>
                                <span>&nbsp; Tumbler</span>
                                
                            </a>
                        </li> 
                        <li>
                        	<a href="https://www.instagram.com/al_ealaniah/" target="_blank" class="color-gray">
                            	<span><i class="fa fa-instagram icon-3x" aria-hidden="true"></i></span>
                                <span>&nbsp; Instagram</span>
                            </a>
                        </li>
                        <li>
                        	<a href="https://www.youtube.com/channel/UCNuIHDcYrBhSTmIPOSOQAUw" target="_blank" class="color-gray">
                            	<span><i class="fa fa-youtube-square icon-3x" aria-hidden="true"></i></span>
                                <span>&nbsp; Youtube</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    	</div>
    </div>
</div>-->
<!-- / Footer Black Body -->

<div class="fix-footer">
    <div class="col-lg-3 padding-top-10"><a class="font-11" href="mailto:info@alealaniah.com">info@alealaniah.com</a></div>
    <div class="col-lg-3 padding-top-10 text-right"> <!--<a class="font-11" href="#"><img width="30px" src="{{ asset('img/up.svg') }}" /></a>--></div>
    <div class="col-lg-3 padding-top-10"> <!--<a class="font-11" href="#"><img width="30px" src="{{ asset('img/down.svg') }}" /></a>--></div>
    <div class="col-lg-3 padding-top-15 text-right"><p class="font-11">© 2016 All Rights Reserved </p></div>
</div>
    
<!-- COPY RIGHT AREA IN FOOTER --> 
<!--<div class="bg-gray footer">
    <div class="container padding-15">
        <div class="row nogape">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-top-15">
                &copy; 2016 All Rights Reserved
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.alealaniah"><img alt="playstore" src="{{ asset('public/img/playstore.ico') }}" class="width-50px"></a>
            </div>
        </div>
    </div>
</div>-->
<!-- ENDING COPY RIGHT AREA IN FOOTER -->


<!-- JavaScript Includes Area -->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('/public/js/easing.js') }}"></script>
<script async type="text/javascript" src="{{ URL::asset('/public/js/bootstrap.min.js') }}" type="application/javascript"></script>
<script type="text/javascript" src="{{ URL::asset('/public/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/public/js/mouse.parallax.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('/public/js/jquery-masonry.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/public/js/scripts.js') }}"></script>





<!-- Google Analytics -->
<script type="text/ecmascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84738943-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>