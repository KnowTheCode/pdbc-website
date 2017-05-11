<?php
/**
 * Footer structure functionality
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Structure;

/**
 * Unregister default navigation events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_footer_events() {
	remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
	remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
	remove_action( 'genesis_footer', 'genesis_do_footer' );
}

add_action( 'genesis_before_footer', __NAMESPACE__ . '\render_pre_footer' );
/**
 * Renders out the pre-footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_pre_footer() {
	genesis_widget_area( 'pre_footer', array(
		'before' => '<div class="prefooter"><div class="wrapper">',
		'after'  => '</div></div>',
	) );
}

add_action( 'genesis_after_footer', __NAMESPACE__ . '\do_disclaimer' );
/**
 * Output footer navigation menu.
 *
 * @since  1.0.25
 *
 * @return void
 */
function do_disclaimer() {
	include( CHILD_THEME_DIR . '/lib/views/scrollup.php' );
}

// Add schema markup to Footer Navigation Menu.
add_filter( 'genesis_attr_nav-footer', 'genesis_attributes_nav' );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\footer_menu_args' );
/**
 * Reduce the footer navigation menu to one level depth.
 *
 * @since  1.0.0
 *
 * @param  array $args Existing footer menu args.
 *
 * @return array Amended footer menu args.
 */
function footer_menu_args( $args ) {

	if ( 'footer' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;
}


add_action( 'genesis_footer', __NAMESPACE__ . '\render_site_footer' );
/**
 * Render the site footer
 *
 * @since  1.0.0
 *
 * @return void
 */
function render_site_footer() {
	$logo_url = CHILD_URL . '/assets/images/ktc-logo-on-dark.png';
	$copyright_dates = do_shortcode( '[footer_copyright first="2016"]' );

	include_once( 'views/site-footer.php' );
}