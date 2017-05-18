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
		$container, slideIn, slideOut,
		$pickers,
		openButton = {
			$el: null,
			$text: null
		},
		currentExperience,
		cookieName = '_pdbc_ux_iam',
		isFirstVisit = false;

	function init() {
		$window = $( window );
		$body = $('body');

		initPanel();
		initPickers();
	}

	function initPanel() {
		$container = $('.iam-picker-panel');
		slideIn    = $container.data('slidein');
		slideOut   = $container.data('slideout');
		$('.iam-picker-panel--close-button').on('click', closeContainer );

		openButton.$el   = $('.iam-picker--open-button');
		openButton.$text = openButton.$el.find('.iam--selection' );
		openButton.$el.on('click', clickHandler );
	}

	function initPickers() {
		$pickers = $container.find('.ima-picker');
		$pickers.on('click', iamClickHandler );

		currentExperience = getCookie();
		if ( ! currentExperience  ) {
			isFirstVisit = true;
			openContainer();

			return;
		}

		$pickers.each( function () {
			setIAMButtonStates( $( this ) );
		} );

		if ( ! isUXSelected ) {
			changeUXExperience();
		}
	}

	var clickHandler = function() {
		if ( $body.hasClass('iam__open') ) {
			closeContainer();

		} else {
			openContainer();
		}
	}

	function closeContainer() {
		$container
			.removeClass( slideIn )
			.addClass( slideOut );

		bodyClassHandler( false );
	}

	function openContainer() {
		$container
			.addClass( slideIn )
			.removeClass( slideOut );

		$body.addClass( 'iam__open' );
	}

	function bodyClassHandler( isOpening ) {
		setTimeout(function(){
			if ( isOpening ) {
				$body.addClass( 'iam__open' );
			} else {
				$body.removeClass( 'iam__open' );
			}
		}, 1000);
	}

	/**********************
	 * UX IAM
	 *********************/

	var iamClickHandler = function() {
		var $picker = $(this),
			newIAM = $picker.data('iam');

		if ( newIAM == currentExperience ) {
			return;
		}

		currentExperience = newIAM;

// 		if ( isFirstVisit ) {
// 			changeUXExperience();
//
// 			isFirstVisit = false;
// 		} else {
// 			requestNewContent( newIAM );
// 		}

		changeUXExperience();
	}

	function changeUXExperience() {
		setCookie( currentExperience );
		window.location.reload();
		return;


		openButton.$el.attr( 'data-iam-current', currentExperience );
		openButton.$text.text( currentExperience );

		$body
			.removeClass( 'iam--entrepreneur iam--developer' )
			.addClass( 'iam--' + currentExperience );

		$pickers.each(function(){
			setIAMButtonStates( $( this ) );
		});

		setCookie( currentExperience );

		closeContainer();
	}

	function requestNewContent() {
		var data = {
				iam: currentExperience,
				post_id: iamParameters.post_id,
			},
			$spinner = $('.wait-spinner');

		$.ajax({
			method: 'POST',
			url: iamParameters.iam_url + '/iam/',
			data: data,
			beforeSend: function ( xhr ) {
				xhr.setRequestHeader( 'X-WP-Nonce', iamParameters.iam_nonce );

				$spinner.show();
			},
			success : function( response ) {
				$spinner.hide();

				if ( response.content ) {
					changeContent( response.entryClassname, response.content );
					changeUXExperience();
				} else {
					console.log( 'whoopsie, no content' );
				}

			},
			fail : function( response ) {
				console.log(response);
// 				$( '#result' ).html(response.message);
			}
		});
	}

	var changeContent = function( entryClassname, content ) {
		var $article = $( entryClassname );
		if ( typeof $article === "undefined" || $article.length < 1 ) {
			return;
		}

		$article.empty();
		$article.html( content );
	}

	function isUXSelected() {
		if ( ! currentExperience ) {
			return false;
		}

		var bodyClassname = 'iam_' + currentExperience;

		return $body.hasClass( 'bodyClassname' );
	}

	var setIAMButtonStates = function( $picker ) {
		var currentValue = $picker.attr('data-iam-current');

		var shouldBeValue = $picker.attr('data-iam') == currentExperience
			? 'active'
			: 'inactive';

		if ( currentValue != shouldBeValue ) {
			$picker.attr( 'data-iam-current', shouldBeValue );
		}
	}

	/***************
	 * Cookies
	 ***************/

	function getCookie() {
		return document.cookie.replace(/(?:(?:^|.*;\s*)_pdbc_ux_iam\s*\=\s*([^;]*).*$)|^.*$/, "$1");
	}

	function setCookie( cookieValue ) {
		var dateObj = new Date();
		dateObj.setTime(dateObj.getTime() + (365*24*60*60*1000));
		var expires = "; expires=" + dateObj.toUTCString();

		document.cookie = cookieName + '=' + cookieValue + expires;
	}

	function deleteCookie() {
		document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
	}

	$('document').ready(function(){
		init();
	});

}( jQuery, window, document ) );