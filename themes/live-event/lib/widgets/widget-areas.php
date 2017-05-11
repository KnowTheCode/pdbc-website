<?php
/**
 * Sidebars and widgets functionality
 *
 * @package     KnowTheCode\LiveEvent\Widgets
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Widgets;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup', 15 );
/**
 * Setup the sidebars/widget areas.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup() {
	unregister_sidebar( 'sidebar-alt' );
	unregister_sidebar( 'header-right' );

	register_widget_areas();

	add_filter( 'widget_text', 'do_shortcode' );
}

/**
 * Register the widget areas enabled by default in Utility.
 *
 * @since  1.0.0
 *
 * @return void
 */
function register_widget_areas() {

	$widget_areas = array(
		array(
			'id'          => 'pre_footer',
			'name'        => __( 'Pre-Footer', 'ktc' ),
			'description' => __( 'This is the Pre-Footer section, just before the footer widgets.', 'ktc' ),
		),
		array(
			'id'          => 'disclaimer',
			'name'        => __( 'Disclaimer', 'ktc' ),
			'description' => __( 'This is the Disclaimer section on very bottom of the site.', 'ktc' ),
		),
		array(
			'id'          => 'fullpage-optin',
			'name'        => __( 'Fullpage Optin', 'ktc' ),
			'description' => __( 'This is the fullpage optin panel that overlays the webpage.', 'ktc' ),
		),
	);

	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}
