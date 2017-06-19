/**
 * Library JavaScript handling.  This script handles opening/closing of the questions and answers,
 * toggling of the icon handle, and setting of the class states.
 *
 * @package     FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
;(function ($, window, document, undefined) {
	'use strict'

	function init() {
		initVideos();
	}

	function initVideos() {
		$( '.embed-vimeo' ).fitVids();
	}

	$(document).ready(function () {
		init();
	});

}(jQuery, window, document));