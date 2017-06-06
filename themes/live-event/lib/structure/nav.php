<?php
/**
 * Menu structures
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\LiveEvent\Structure;

use Fulcrum\Fulcrum;

/**
 * Unregister default navigation events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_nav_events() {
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
}

add_action( 'genesis_header', __NAMESPACE__ . '\render_main_nav', 11 );
/**
 * Render navigation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_main_nav() {
	$event_home_url = home_url();

	$current_iam_selection = get_from_fulcrum( 'current_iam_selection' );

	foreach ( array( 'hamburger', 'main-nav' ) as $filename ) {
		$file = sprintf( '%s/views/nav/%s.php',
			__DIR__,
			$filename
		);

		require_once( $file );
	}


//	require_once( __DIR__ . '/views/nav/main-nav.php' );
}
