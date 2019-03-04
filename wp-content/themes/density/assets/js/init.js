jQuery(document).ready(function(){

	"use strict";	
	// here all ready functions	
	density_tm_animate_submenu();
	density_tm_widgetscroll();
	density_tm_logo_scroll();
	density_tm_mobile_info();
	density_tm_totop();
	density_tm_totop_myhide();
	density_tm_hamburger();
	density_tm_submenu();
	density_tm_owl_carousel();
	
	jQuery(window).on('scroll', function(e) {
		e.preventDefault();
		density_tm_widgetscroll();
		density_tm_totop_myhide();
		
    });
	
});


// -----------------------------------------------------
// --------------------  FUNCTIONS  --------------------
// -----------------------------------------------------

function density_tm_animate_submenu(){
	"use strict";
	
	var menuBox				= jQuery('.density_tm_animate_menu');
	var windowOverlay		= jQuery('.density_tm_overlay_window');
	var list				= jQuery('.density_tm_wrapper_all .main_leftpart .nav_wrap > ul > li');
	var rightpart			= jQuery('.density_tm_wrapper_all .main_rightpart');
	
	list.on('mouseenter',function(){

		var element		= jQuery(this);

		var subLength	= element.find('.sub-menu , .sub-submenu').length;

		var subContent	= element.find('.sub-menu , .sub-submenu').html();

		var liOffset	= element.offset().top;
		var winScroll	= jQuery(window).scrollTop();
		menuBox.css({top: liOffset-winScroll-18});
		
		if(subLength >= 1){
			menuBox.addClass('opened').html('').html(subContent);

		}else{
			menuBox.html('').removeClass('opened');
		}
	});
	
	rightpart.on('mouseenter', function(){
		menuBox.removeClass('opened');
	});
	windowOverlay.on('mouseenter', function(){
		menuBox.removeClass('opened');
	});
	
	
}

// -----------------------------------------------------
// -------------    WIDGET MENU SCROLL -----------------
// -----------------------------------------------------

function density_tm_widgetscroll(){
	
	"use strict";
	
	var H				= jQuery(window).height();
	var scrollable		= jQuery('.scrollable');
	var logoH 			= jQuery('.density_tm_wrapper_all .main_leftpart .logo_wrap').outerHeight();
	
	
	var verMenu			= jQuery('.density_tm_wrapper_all .main_leftpart .nav_wrap');
	
	verMenu.css({height:H-logoH-50});
	
	scrollable.each(function(){
		var element		= jQuery(this);
		
		element.css({height: H-logoH-100});
		
		element.niceScroll({
			touchbehavior:false,
			cursorwidth:0,
			autohidemode:true,
			cursorborder:"0px solid #eee"
		});
	});
}

function density_tm_logo_scroll(){
	
	"use strict";
	
	var winScroll		= jQuery(window).scrollTop();
	var menuLogo		= jQuery('.density_tm_wrapper_all .main_leftpart .logo_wrap');
	
	if(winScroll>=100){
		menuLogo.addClass('animate');
	}
	else{
		menuLogo.removeClass('animate');
	}
	
	jQuery(window).on('scroll',function(){
		winScroll = jQuery(window).scrollTop();
		
		if(winScroll>=100){
			menuLogo.addClass('animate');
		}
		else{
			menuLogo.removeClass('animate');
		}
	});
	
}

// -----------------------------------------------------
// ----------    DENSITY MOBILE INFO    -----------
// -----------------------------------------------------

function density_tm_mobile_info(){
	
	"use strict";
	var wrapper				= jQuery('.density_tm_mobile_menu_wrap');
	var allLi				= wrapper.find('.short_info_wrap ul li');
	var mainList			= wrapper.find('.short_info_wrap ul li a');
	var mainbox				= jQuery('.density_tm_dropdown_wrap .drop_list');
	
	mainList.on('click',function(){
		var element			= jQuery(this);
		var thisLi			= element.parent();
		var attr			= thisLi.attr("data-type");
		var extra			= jQuery('.density_tm_dropdown_wrap .drop_list.'+attr);
		
		// variables to close mobilemenu
		var hamburger 		= jQuery('.hamburger');
		var mobileMenu		= jQuery('.density_tm_mobile_menu_wrap .menu_list_wrap');
		
		
		if(thisLi.hasClass('opened')){
			thisLi.removeClass('opened');
			extra.slideUp();
		}else{
			if(hamburger.hasClass('is-active')){
				hamburger.removeClass('is-active');
				mobileMenu.slideUp();
			}
			mainbox.slideUp();
			allLi.removeClass('opened');
			thisLi.addClass('opened');
			extra.slideDown();
		}
			
	});
}

// -----------------------------------------------------
// --------------------    TOTOP    --------------------
// -----------------------------------------------------

function density_tm_totop(){
	
	"use strict";
	
	jQuery(".density_tm_totop").on('click', function(e) {
		e.preventDefault();		
		jQuery("html, body").animate({ scrollTop: 0 }, 'slow');
		return false;
	});
}

function density_tm_totop_myhide(){
	
	"use strict";
	
	var toTop		=jQuery(".density_tm_totop");
	if(toTop.length){
		var topOffSet 	=toTop.offset().top;
		
		if(topOffSet > 1000){
			toTop.addClass('opened');	
		}else{
			toTop.removeClass('opened');
		}
	}
}

// -----------------------------------------------------
// ------------------  HAMBURGER  ----------------------
// -----------------------------------------------------

function density_tm_hamburger(){
	
	"use strict";
	
	var hamburger 		= jQuery('.hamburger');
	var mobileMenu		= jQuery('.density_tm_mobile_menu_wrap .menu_list_wrap');
	var allLi			= jQuery('.density_tm_mobile_menu_wrap .short_info_wrap ul li');
	var mainbox			= jQuery('.density_tm_dropdown_wrap .drop_list');
	
	hamburger.on('click',function(){
		var element 	= jQuery(this);
		
		if(element.hasClass('is-active')){
			element.removeClass('is-active');
			mobileMenu.slideUp();
		}else{
			if(allLi.hasClass('opened')){
				allLi.removeClass('opened');
				mainbox.slideUp();
			}
			element.addClass('is-active');
			mobileMenu.slideDown();
		}
		return false;
	});
}
// -----------------------------------------------------
// -----------------    SUBMENU    ---------------------
// -----------------------------------------------------

function density_tm_submenu(){
	
	"use strict";
	
	var nav 		= jQuery('ul.nav');
	
	nav.find('a').on('click', function(e){
		var element 			= jQuery(this);
		var parentItem			= element.parent('li');
		var parentItems			= element.parents('li');
		var parentUls			= parentItem.parents('ul.sub-menu');
		var subMenu				= element.next();
		var allSubMenusParents 	= nav.find('li');
		
		allSubMenusParents.removeClass('opened');
		
		if(subMenu.length){
			
			e.preventDefault();
			
			if(!(subMenu.parent('li').hasClass('active'))){
				if(!(parentItems.hasClass('opened'))){parentItems.addClass('opened');}
				
				allSubMenusParents.each(function(){
					var el = jQuery(this);
					if(!el.hasClass('opened')){el.find('ul.sub-menu').slideUp();}
				});
				
				allSubMenusParents.removeClass('active');
				parentUls.parent('li').addClass('active');
				subMenu.parent('li').addClass('active');
				subMenu.slideDown();
				
				// for recalculate scrollable height
				var scrollableE = jQuery('.scrollable');
				scrollableE.each(function(){
					var elE = jQuery(this);
					var hhhE = elE.height();hhhE++;
					setTimeout(function(){elE.css({height:hhhE});},500);
					setTimeout(function(){hhhE--;elE.css({height:hhhE});},600);
				});
				
			}else{
				subMenu.parent('li').removeClass('active');
				subMenu.slideUp();
			}
			return false;
		}
	});
}

// -----------------------------------------------------
// ---------------    OWL CAROUSEL    ------------------
// -----------------------------------------------------

function density_tm_owl_carousel(){
	"use strict";
	
	var carousel 		= jQuery('.density_tm_hero_header_wrap .owl-carousel');
	
	carousel.owlCarousel({
			items: 1,
			lazyLoad: true,
			loop:true,
			margin: 0,
			autoplay: true,
			autoplayTimeout: 3000,
			dots: false,
			nav: false,
			navSpeed: true
	});
	
	jQuery('.density_tm_hero_header_wrap .custom_nav > a.prev').on('click', function(){
		carousel.trigger('prev.owl.carousel');
		return false;
	});
	
	jQuery('.density_tm_hero_header_wrap .custom_nav > a.next').on('click', function(){
		carousel.trigger('next.owl.carousel');
		return false;
	});
	
}
