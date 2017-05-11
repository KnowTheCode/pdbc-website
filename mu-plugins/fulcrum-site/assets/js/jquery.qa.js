/**
 * Question and Answer Handler
 *
 * @package     FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
;(function ($, window, document, undefined) {
	'use strict'

	$(document).ready(function () {
		if ( typeof qaParameters === "object" ) {
			$('.qa--question').fulcrumQA( qaParameters.qa );
		}
	});

}(jQuery, window, document));