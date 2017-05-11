// Aniview
;(function($) {

	//custom scroll replacement to allow for interval-based 'polling'
	//rathar than checking on every pixel
	var uniqueCntr = 0;
	$.fn.scrolled = function(waitTime, fn) {
		if (typeof waitTime === 'function') {
			fn = waitTime;
			waitTime = 200;
		}
		var tag = 'scrollTimer' + uniqueCntr++;
		this.scroll(function() {
			var self = $(this);
			var timer = self.data(tag);
			if (timer) {
				clearTimeout(timer);
			}
			timer = setTimeout(function() {
				self.removeData(tag);
				fn.call(self[0]);
			}, waitTime);
			self.data(tag, timer);
		});
	};

	$.fn.AniView = function(options) {

		//some default settings. animateThreshold controls the trigger point
		//for animation and is subtracted from the bottom of the viewport.
		var settings = $.extend({
			animateThreshold: 0,
			scrollPollInterval: 20
		}, options);

		//keep the matched elements in a variable for easy reference
		var collection = this;

		//cycle through each matched element and wrap it in a block/div
		//and then proceed to fade out the inner contents of each matched element
		$(collection).each(function(index, element) {
			$(element).wrap('<div class="av-container"></div>');
			$(element).css('opacity', 0);
		});

		/**
		 * returns boolean representing whether element's top is coming into bottom of viewport
		 *
		 * @param HTMLDOMElement element the current element to check
		 */
		function EnteringViewport(element) {
			var elementOffset = $(element).offset();
			var elementTop = elementOffset.top + $(element).scrollTop();
			var elementBottom = elementOffset.top + $(element).scrollTop() + $(element).height();
			var viewportBottom = $(window).scrollTop() + $(window).height();
			return (elementTop < (viewportBottom - settings.animateThreshold)) ? true : false;
		}

		/**
		 * cycle through each element in the collection to make sure that any
		 * elements which should be animated into view, are...
		 *
		 * @param collection of elements to check
		 */
		function RenderElementsCurrentlyInViewport(collection) {
			$(collection).each(function(index, element) {
				var elementParentContainer = $(element).parent('.av-container');
				if ($(element).is('[data-av-animation]') && !$(elementParentContainer).hasClass('av-visible') && EnteringViewport(elementParentContainer)) {
					$(element).css('opacity', 1);
					$(elementParentContainer).addClass('av-visible');
					$(element).addClass('animated ' + $(element).attr('data-av-animation'));
				}
			});
		}

		//on page load, render any elements that are currently in view
		RenderElementsCurrentlyInViewport(collection);

		//enable the scrolled event timer to watch for elements coming into the viewport
		//from the bottom. default polling time is 20 ms. This can be changed using
		//'scrollPollInterval' from the user visible options
		$(window).scrolled(settings.scrollPollInterval, function() {
			RenderElementsCurrentlyInViewport(collection);
		});
	};
})(jQuery);
/*!
 * Live Event JavaScript handling.
 *
 * @package     Live Event
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict';

	var $window, $body;

	var init = function() {
		$window = $( window );
		$body = $('body');

		$('.aniview').AniView();
		initPopups();
	};

	//==========================
	// Topic Handlers
	//==========================

	function initPopups() {
		var data = {
			panelOpenClass: 'panel--is-open'
		};

		$('.popup-reveal-button').on('click', data, popupHandler );
		$('.popup-close--button').on('click', data, popupHandler );
	}

	//==========================
	// Popup Handlers
	//==========================

	var popupHandler = function( event ) {
		var $button = $(this),
			panelID = $button.data('popupId'),
			data;

		var $panel = $('#' + panelID);

		if ( typeof $panel === 'undefined' || $panel === null ) {
			return;
		}

		data = {
			slideInClass : $panel.data( 'slidein' ),
			slideOutClass : $panel.data( 'slideout' ),
			panelOpenClass: event.data.panelOpenClass
		};

		if ( $panel.hasClass( data.panelOpenClass ) ) {
			closeContainer( $panel, data );

		} else {
			openContainer( $panel, data );
		}
	};

	function closeContainer( $el, data ) {
		$el
			.removeClass( data.panelOpenClass )
			.removeClass( data.slideInClass )
			.addClass( data.slideOutClass );
	}

	function openContainer( $el, data ) {
		$el
			.addClass( data.panelOpenClass )
			.addClass( data.slideInClass )
			.removeClass( data.slideOutClass );
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));
/*!
 * Fullpage Navigation handling
 *
 * @package     FullPageNav
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function( $, window, document, undefined ) {
	"use strict";

	var $window,
		$body,
		$container, slideIn, slideOut;

	function init() {
		$window = $( window );
		$body = $('body');

		initMenu();
	}

	function initMenu() {
		var $hamburger = $('.hamburger--button'),
			menuID = $hamburger.data('menuId');

		$container = $('#' + menuID);
		if ( typeof $container === 'undefined' || $container == null ) {
			return;
		}

		slideIn = $container.data('slidein');
		slideOut = $container.data('slideout');

		$hamburger.on('click', initClickHandler );
	}

	function initClickHandler() {
		if ( $body.hasClass('menu--open') ) {
			closeContainer();

		} else {
			openContainer();
		}
	}

	function closeContainer() {
		$body.removeClass('menu--open');

		$container
			.removeClass( slideIn )
		    .addClass( slideOut );
	}

	function openContainer() {
		$body.addClass('menu--open');

		$container
			.addClass( slideIn )
			.removeClass( slideOut );

		itemClickHandler();
	}

	function itemClickHandler() {
		$container.find('.menu-item a').on( 'click', closeContainer );
	}

	$('document').ready(function(){
		init();
	});

}( jQuery, window, document ) );
/*!
 * Fullpage Navigation handling
 *
 * @package     FullpageNav
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

;(function( $, window, document, undefined ) {
	"use strict";

	var $window,
		$body,
		$container, slideIn, slideOut;

	function init() {
		$window = $( window );
		$body = $('body');

		$container = $('#fullpage-optin');

		slideIn = $container.data('slidein');
		slideOut = $container.data('slideout');

		$('.fullpage-optin--open-button').on('click', clickHandler );

		$('.fullpage-optin--close-button').on('click', closeContainer );
	}

	var clickHandler = function() {
		if ( $body.hasClass('fullpage-optin__open') ) {
			closeContainer();

		} else {
			openContainer();
		}
	}

	function closeContainer() {
		$body.removeClass('fullpage-optin__open');

		$container
			.removeClass( slideIn )
			.addClass( slideOut );
	}

	function openContainer() {
		$body.addClass('fullpage-optin__open');
		$container
			.addClass( slideIn )
			.removeClass( slideOut );
	}

	$('document').ready(function(){
		init();
	});

}( jQuery, window, document ) );
/*!
 * Tabs JavaScript handling.
 *
 * @package     Live Event
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict';

	var $tabs, $panels;

	var init = function() {
		$tabs = $( '.tab-nav-item' );
		$panels = $( '.tab-panel' );

		var data = {
			$tab: null,
			tabState: '',
			panelID: '',
			$panel: null,
			panelState: ''
		};

		$tabs.on('click', data, tabHandler );
	};

	var tabHandler = function( event ) {
		var data = event.data;

		data.$tab = $(this);
		data.tabState = data.$tab.attr('data-panel-state');
		data.panelID = data.$tab.data('panelId');
		data.$panel = $('#' + data.panelID);

		if ( typeof data.$panel === 'undefined' || data.$panel === null ) {
			return;
		}

		data.panelState = data.$panel.attr('data-panel-state');

		closeAll( data );
	};

	function closeAll( data ) {
		var $parent = data.$tab.closest('.tab-container');

		if ( typeof $parent === 'undefined' || $parent === null ) {
			return;
		}

		var $tabs = $parent.find('.tab-nav-item'),
			$panels = $parent.find('.tab-panel');

		$tabs.each( function(index) {
			var $tab = $(this);

			if ( $tab.attr('data-panel-state') != 'active' ) {
				return true;
			}

			$tab.attr('data-panel-state', 'inactive');

			var $panel = $( $panels[ index ] );

			$panel.attr('data-panel-state', 'inactive');
			$panel.slideUp('fast');

		}).promise().done(function(){
			panelHandler( data );
		});
	}

	function panelHandler( data ) {
		var panelState = 'active';

		if ( data.tabState == 'active' ) {
			panelState = 'inactive';
			data.$panel.slideUp( "fast" );

		} else {
			data.$panel.slideDown( "slow" );
		}

		data.$tab.attr('data-panel-state', panelState);
		data.$panel.attr('data-panel-state', panelState);
	};

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));