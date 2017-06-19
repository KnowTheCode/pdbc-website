/**
 * Partner's Adspot Script
 *
 * @package     Partners
 * @since       1.0.1
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict'

	function init() {
		var $adspot = $( '#partner-adspot' );

		if ( typeof $adspot !== "object" ) {
			return false;
		}

		var data = {
			action: partnerParameters.action,
			security: $adspot.data( 'nonce' )
// 			partner: $adspot.data( 'partner' )
		}

		ajaxHandler( data, $adspot );
	}

	function ajaxHandler( data, $element ) {

		$.post( partnerParameters.ajaxurl, data, function ( response ) {
			var dataPacket = $.parseJSON( response );
			if ( typeof dataPacket != 'object' ) {
				return;
			}

			 $element.html( dataPacket.data.html );
			$element.slideDown();
		 } );
	}

	$( document ).ready( function () {
		if ( typeof partnerParameters === "object" ) {
			init();
		}
	} );

}( jQuery, window, document ));