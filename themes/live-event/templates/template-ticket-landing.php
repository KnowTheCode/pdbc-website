<?php
/**
 * Ticket Landing Page
 *
 * Template Name: Ticket Landing Page
 *
 * @package     KnowTheCode\LiveEvent\TicketLandingPage
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\LiveEvent\TicketLandingPage;

add_action( 'genesis_meta', __NAMESPACE__ . '\setup', 1 );
/**
 * Setup the landing page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup() {
	remove_the_typical_components();

	add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
}

/**
 * Remove some of the typical components.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_the_typical_components() {
	remove_theme_support( 'genesis-menus' );
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

	remove_all_actions( 'genesis_entry_header' );

	remove_action( 'genesis_header', 'KnowTheCode\LiveEvent\Structure\render_main_nav', 11 );
	remove_action( 'genesis_before_header', 'KnowTheCode\LiveEvent\Structure\render_fullpage_optin', 1 );

	remove_action( 'genesis_before', 'KnowTheCode\LiveEvent\Structure\relocate_entry_header' );

	remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	$css_file = '/assets/dist/css/ticket-landing.min.css';

	wp_enqueue_style(
		'ticket_landing_css',
		CHILD_URL . $css_file,
		array(),
		get_asset_version_number( CHILD_THEME_DIR . $css_file )
	);

	wp_dequeue_script( 'skip-links' );
}

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add a body class.
 *
 * @since 1.0.0
 *
 * @param array $classes
 *
 * @return array
 */
function add_body_class( array $classes ) {

	$classes[] = 'ticket-landing';

	return $classes;
}


genesis();
