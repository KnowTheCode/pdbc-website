/**
 * Scroll to the Top Handler
 *
 * @package     FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict'

	function init() {
		var $scrollup = $('.scrollup');

		_scrollupScrollHandler( $scrollup );
		_scrollupClickHandler( $scrollup );
	}

	function _scrollupScrollHandler( $element ) {
		var height = $( window ).height() / 2;

		$( window ).scroll( function () {
			var position =  $( this ).scrollTop();

			if ( position > height ) {
				$element.slideDown();
			} else {
				$element.slideUp();
			}
		} );
	}
	function _scrollupClickHandler( $element ) {

		$element.on('click', function(){

			$("html, body").animate({
				scrollTop: 0
			}, 2000);

			return false;
		});
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));