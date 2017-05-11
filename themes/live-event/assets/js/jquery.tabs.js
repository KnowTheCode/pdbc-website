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