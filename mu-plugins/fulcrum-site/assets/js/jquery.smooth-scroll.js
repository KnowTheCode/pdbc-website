/**
 * Smooth Scroll JavaScript Handler
 *
 * @package     SmoothScroll
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict'

	var $body,
		$adspot,
		adspotHeight = 0;

	function init() {
		$body = $( 'html, body' );

		$( 'a[href^="#"]' ).on( 'click', function( event ) {
			event.preventDefault();

			smoothScrollHandler( this.hash, event );
		});
	}

	function smoothScrollHandler( target, event ) {
		var $target = $( target );

		if ( typeof $target == "undefined" || ! $target.length ) {
			return false;
		}

		if ( $adspot == null ) {
			$adspot = $( '#partner-adspot' );
			adspotHeight = $adspot.height();
		}

		$body.stop().animate({
			'scrollTop': $target.offset().top - adspotHeight
		}, 2000, 'swing' );
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));