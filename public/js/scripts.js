// JavaScript Document

(function(){
	"use strict";

	$(window).on('load', function() { // makes sure the whole site is loaded 
		$('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'overflow':'visible'});
	});
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 	//alert( 'this is Android' );
	}
	if( /iPhone|iPad|iPod|/i.test(navigator.userAgent) ) {
	 	//alert( 'this is iphone' );
	}
	if( /webOS|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 	//alert( 'this is computer' );
	}
	
	$('#navButton').on('click', function(){
		$('#sideBar').animate({left: '0'}, 1000, 'easeInOutExpo', function(){});
	});
	
	$('#navButtonCross').on('click', function(){
		$('#sideBar').animate({left: '-100%'}, 1000, 'easeInOutExpo', function(){});
	});	
	
	$(window).on("load",function(){
				
		$("#scroller").mCustomScrollbar({
			autoHideScrollbar:true,
			theme:"light-thick"
		});
		
	});	

	$('#background').mouseParallax({ moveFactor: 2 });

	
	
	$('#grid').masonry({
	  // options
	  itemSelector: '#grid-item',
	  
	});
	
	(function(){
		var heights = window.innerHeight - 200;
		$('.detailBox').height(heights);

		var height_ = window.innerHeight - 175 ;
		$('.white-box').height(height_);
		
		$('.clientContact').on('click', function(){
			$('.contactEmail').animate({right: '0'}, 1000, 'easeInOutExpo', function(){});
			$('.shareComments').animate({right: '-500px'}, 1000, 'easeInOutExpo', function(){});
		});
		
		$('.commentShare').on('click', function(){
			$('.shareComments').animate({right: '0'}, 1000, 'easeInOutExpo', function(){});
			$('.contactEmail').animate({right: '-500px'}, 1000, 'easeInOutExpo', function(){});
		});
	})();
})();
