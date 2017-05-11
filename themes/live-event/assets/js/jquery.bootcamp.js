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