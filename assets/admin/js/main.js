/*
Copyright (c) 2017
------------------------------------------------------------------
[Master Javascript]
-------------------------------------------------------------------*/
(function ($) {
	"use strict";
	var webxpress = {
		initialised: false,
		version: 1.0,
		mobile: false,
		init: function () {

			if(!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}

			/*-------------- webxpress Functions Calling ---------------------------------------------------
			------------------------------------------------------------------------------------------------*/
			this.RTL();
			this.Custom_scroll();
			this.Nav_dropdown_toggle();
			this.Sidebar_toggle();
			this.Popups();
			this.DataTable();
			
		},
		
		/*-------------- webxpress Functions definition ---------------------------------------------------
		---------------------------------------------------------------------------------------------------*/
		RTL: function () {
			// On Right-to-left(RTL) add class 
			var rtl_attr = $("html").attr('dir');
			if(rtl_attr){
				$('html').find('body').addClass("rtl");	
			}		
		},
		Custom_scroll: function(){
			/* custom scroll bar start */
			if($(".hs_custom_scrollbar").length){
				$(".hs_custom_scrollbar").mCustomScrollbar({
					scrollInertia:200,
				});
			}
			if($(".hs_custom_scrollbar_x").length){
				$(".hs_custom_scrollbar_x").mCustomScrollbar({
					scrollInertia:200,
					axis:"x"
				});
			}
			/* custom scroll bar end */
		},
		Nav_dropdown_toggle: function(){
			$('.hs_nav_dropdown > a').on('click', function(){
				$('.hs_nav_dropdown > ul').slideUp(200);
				$(this).next().slideDown(200);				
			});
		},
		Sidebar_toggle: function(){
			$('.hs_sidebar_toggle').on('click', function(){
				$('body').toggleClass('sidebar_hide');
			});
		},
		Popups: function(){
			if($('.hs_popup_link').length){
				$('.hs_popup_link').magnificPopup({
					callbacks: {
						open: function() {
							$('body').addClass('open_popup');
						},
						close: function() {
							$('body').removeClass('open_popup');
						}
					}
				});
			}
		},
		DataTable: function(){
			if($('.hs_datatable').length){
				$('.hs_datatable').DataTable({
					 responsive: true
				});
			}			
		}
		
		
	};

	

	// Load Event
	$(window).on('load', function() {
		/* add class on load start */
		setTimeout(function(){
			$('body').addClass('site_loaded');
		}, 500);
		/* add class on load end */		
	});

	// ready function
	$(document).ready(function() {
		webxpress.init();	
	});
	

})(jQuery);