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
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
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

//	$current_iam_selection = get_from_fulcrum( 'current_iam_selection' );
//
//	foreach ( array( 'hamburger', 'main-nav' ) as $filename ) {
//		$file = sprintf( '%s/views/nav/%s.php',
//			__DIR__,
//			$filename
//		);
//
//		require_once( $file );
//	}


	require( __DIR__ . '/views/nav/hamburger.php' );
}

add_action( 'genesis_after', __NAMESPACE__ . '\render_main_container', 20 );
/**
 * Render navigation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_main_container() {
	$event_home_url = home_url();

	$current_iam_selection = get_from_fulcrum( 'current_iam_selection' );
	require_once( __DIR__ . '/views/nav/main-nav.php' );
}

add_action( 'genesis_after_endwhile', __NAMESPACE__ . '\do_post_pagination' );
/**
 * Use WordPress archive pagination.
 *
 * Return a paginated navigation to next/previous set of posts, when
 * applicable. Includes screen reader text for better accessibility.
 *
 * @since  1.5.8
 *
 * @see the_posts_pagination()
 */
function do_post_pagination() {
	if ( is_single() ) {
		return;
	}

	$args = array(
		'mid_size'           => 2,
		'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'live-event' ) . ' </span>',
	);

	if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		the_posts_pagination( $args );
	}
}
