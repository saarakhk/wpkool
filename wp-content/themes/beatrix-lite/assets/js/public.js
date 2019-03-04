jQuery(function($) {
    
	var $window = $(window),
		$body = $('body'),
		$navBar = $('.navbar'),
		clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';

	function searchForm() {
		$(".header-search button.header-search__click ").on("click", function() {
			$(".header-search__wrapper").fadeToggle(),
				$(".header-search__wrapper input.search-field").focus();
		});
	}

	

	function toggleMobileMenu() {
		var $body = $('body'),
			mobileClass = 'mobile-menu-open',
			clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click',
			transitionEnd = 'transitionend webkitTransitionEnd otransitionend MSTransitionEnd';

		// Click to show mobile menu.
		$('.menu-toggle').on(clickEvent, function(event) {
			event.preventDefault();
			event.stopPropagation(); // Do not trigger click event on '.wrapper' below.
			if ($body.hasClass(mobileClass)) {
				return;
			}
			$body.addClass(mobileClass);
		});
		
		// When mobile menu is open, click on page content will close it.
		$('.site, .mobile_close_icons')
			.on(clickEvent, function(event) {
				if (!$body.hasClass(mobileClass)) {
					return;
				}
				event.preventDefault();
				$body.removeClass(mobileClass).addClass('animating');
			})
			.on(transitionEnd, function() {
				$body.removeClass('animating');
			});
		
		// When mobile menu is open, click on page content will close it.
		$('.site')
			.on(clickEvent, function(event) {
				if (!$body.hasClass(mobileClass)) {
					return;
				}
				event.preventDefault();
				$body.removeClass(mobileClass).addClass('animating');
			})
			.on(transitionEnd, function() {
				$body.removeClass('animating');
			});
	}

	/**
	 * Add toggle dropdown icon for mobile menu.
	 * @param $container
	 */
	function initMobileNavigation($container) {

		// Add dropdown toggle that displays child menu items.
		var $dropdownToggle = $('<span class="dropdown-toggle fa fa-angle-down"></span>');

		$container.find('.menu-item-has-children > a').after($dropdownToggle);

		// Toggle buttons and sub menu items with active children menu items.
		$container.find('.current-menu-ancestor > .sub-menu').show();
		$container.find('.current-menu-ancestor > .dropdown-toggle').addClass('toggled-on');
		$container.on(clickEvent, '.dropdown-toggle', function(e) {
			e.preventDefault();
			$(this).toggleClass('toggled-on');
			$(this).next('ul').toggle();
		});
	}

	/**
	 * Scroll to top
	 */
	function scrollToTop() {
		var $window = $(window),
			$button = $('.scroll-to-top');
		$window.scroll(function() {
			$button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']('hidden');
		});
		$button.on('click', function(e) {
			e.preventDefault();
			$('body, html').animate({
				scrollTop: 0
			}, 500);
		});
	}

	function hideMobileMenuOnDesktops() {
		$window.on( 'resize', function () {
			if ( $window.width() > 992 ) {
				$body.removeClass('mobile-menu-open');
			}
		} )
	}

	

	
	scrollToTop();
	searchForm();	
	toggleMobileMenu();
	initMobileNavigation($('.mobile-menu'));
	hideMobileMenuOnDesktops();
	
    
               
});
