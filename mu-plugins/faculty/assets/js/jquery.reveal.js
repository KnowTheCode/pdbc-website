/*!
 * Faculty JavaScript handling.
 *
 * @package     Faculty
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict';

	var $window,
		$facultyBlocks,
		$facultyCards,
		$facultyProfiles,
		$facultyClose;

	var init = function() {
		$window = $( window );
		$facultyBlocks = $('.faculty--block');
		$facultyCards = $('.faculty--card');
		$facultyProfiles = $('.faculty--profile-panel');
		$facultyClose = $('.profile-close--button');

		initFacultyOverlay();
		initFacultyProfiles();
		initRevealHandler();

		$(window)
			.resize(initFacultyOverlay)
			.resize(initFacultyProfiles);
	};

	function initFacultyOverlay() {
		var $avatar = $('.faculty--card .faculty-avatar'),
			$overlay = $avatar.next(),
			$avatarHeight = $avatar.outerHeight();

		$overlay.css({
			lineHeight : $avatarHeight + 'px',
			height : $avatarHeight
		});

	}

	function initFacultyProfiles() {

		$facultyProfiles.each(function( index ){

			var $parent = $facultyProfiles.closest( '.faculty--grid' ),
				$panel = $( this ),
				$block = $( $facultyBlocks[index] );

			var width = ( $parent.length > 0 ) ? $parent.width() : 0,
				pos   = ( $block.length > 0 ) ? $parent.position().left - $block.position().left : 0;

			$panel.css( {
				flexDirection: "column",
				left: pos + "px",
				width: width,
				maxWidth: width
			} )
		});
	}

	function initRevealHandler() {
		$('.faculty--card').on('click', function(){
			revealHandler( $(this), $facultyCards.index(this) );
		});

		$('.profile-close--button').on('click', function(){
			var index = $facultyClose.index(this);
			revealHandler( $( $facultyCards[index]  ), index );
		});
	}

	//==========================
	// Profile Revealer
	//==========================

	var revealHandler = function( $card, index ) {
		var $parent = $( $facultyBlocks[index] ),
			$panel = $( $facultyProfiles[index] ),
			panelState = $parent.attr( 'data-panel-state' );

		if ( typeof $panel === 'undefined' || $panel === null ) {
			return;
		}

		closeAll( panelState, $parent, $panel );
	}

	function closeAll( panelState, $parent, $panel ) {
		$facultyBlocks.each(function(index){
			var $block = $(this);

			if ( $block.attr('data-panel-state') != 'active' ) {
				return true;
			}

			$block.attr('data-panel-state', 'inactive');
			var $panel = $( $facultyProfiles[ index ] );

			$panel.hide();
		}).promise().done(function(){
			doReveal( panelState, $parent, $panel );
		});
	}

	function doReveal( panelState, $parent, $panel ) {

		var $grid = $parent.parent(),
			gridState = $grid.attr( 'data-panel-state' );

		if ( panelState == 'active' ) {
			panelState = 'inactive';
			gridState = 'closed';
			$panel.slideUp( "fast" );

		} else {
			$panel.slideDown( "slow" );
			panelState = 'active';
			gridState = 'open';

		}

		$parent.attr('data-panel-state', panelState);
		$grid.attr('data-panel-state', gridState);
	};

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));