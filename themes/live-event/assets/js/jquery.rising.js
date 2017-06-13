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

	var canvas,
		$window,
		ctx,
		maxY = 300,
		maxX = 1002,
		pathData = [
			{x: 0, y: 250},
			{x: 100, y: 200},
			{x: 200, y: 230},
			{x: 300, y: 190},
			{x: 400, y: 210},
			{x: 500, y: 150},
			{x: 600, y: 110},
			{x: 700, y: 125},
			{x: 800, y: 75},
			{x: 900, y: 90},
			{x: 1000, y: 20}
		];

	var init = function() {
		$window = $( window );

		initProfitLine();
	};

	var canvasExists = function() {
		var $canvas = $('#profits-canvas'),
			$parentCanvas = $('.parent-canvas');

		return $parentCanvas.length > 0 && $canvas.length > 0;
	}

	function initProfitLine() {
		canvas = document.querySelector('#profits-canvas');

		if ( ! canvas.getContext ) {
			return;
		}
		ctx = canvas.getContext('2d');

		drawProfitLines();
	}

	function drawProfitLines() {

		ctx.fillStyle = 'rgba(200,207,169,0.25)';

		// Stroke
		ctx.lineWidth = 2;
		ctx.strokeStyle = 'rgba(200,207,169,0.35)';

		ctx.beginPath();

		// start here.
		ctx.moveTo( 0, maxY );

		var numberOfPoints = pathData.length;
		for (var pathIndex = 0; pathIndex < numberOfPoints; pathIndex++) {
			ctx.lineTo( pathData[pathIndex].x, pathData[pathIndex].y );
		}

		ctx.lineTo( maxX, pathData[pathData.length - 1].y );
		ctx.lineTo( maxX, maxY );

		ctx.fill();
		ctx.stroke();
	}

	$( document ).ready( function () {

		if ( ! canvasExists() ) {
			return;
		}

		window.setTimeout(function() {
			init();
		}, 10);

	} );

}( jQuery, window, document ));