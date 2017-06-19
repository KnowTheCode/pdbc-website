<?php
/**
 * Sidebars and widget area runtime configuration
 *
 * @package     KnowTheCode\LiveEvent\Widgets
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Widgets;

return array(
	'unregister_widget_areas' => array(
		'sidebar-alt',
		'header-right',
	),

	'register_widget_areas' => array(
		array(
			'id'          => 'pre_footer',
			'name'        => __( 'Pre-Footer', 'live-event' ),
			'description' => __( 'This is the Pre-Footer section, just before the footer widgets.', 'live-event' ),
		),
		array(
			'id'          => 'disclaimer',
			'name'        => __( 'Disclaimer', 'live-event' ),
			'description' => __( 'This is the Disclaimer section on very bottom of the site.', 'live-event' ),
		),
		array(
			'id'          => 'fullpage-optin',
			'name'        => __( 'Fullpage Optin', 'live-event' ),
			'description' => __( 'This is the fullpage optin panel that overlays the webpage.', 'live-event' ),
		),
		array(
			'id'          => 'iam',
			'name'        => __( '"I am" Selector Popup', 'live-event' ),
			'description' => __( '"I am" selector popup panel".', 'live-event' ),
		),
		array(
			'id'          => 'sponsors',
			'name'        => __( 'Sponsors Sidebar', 'live-event' ),
			'description' => __( 'This sidebar is holding the sponsorship widgets', 'live-event' ),
		),
		array(
			'id'          => 'discover-bootcamp',
			'name'        => __( 'Discover Bootcamp', 'live-event' ),
			'description' => __( 'This sidebar will appear at the bottom of all pages for the bottom embedded navigation menu.', 'live-event' ),
		),
		array(
			'id'          => 'architect-sponsors',
			'name'        => __( 'Architect Sponsors', 'live-event' ),
			'description' => __( 'This sidebar is architect sponsor above-the-fold area.', 'live-event' ),
		),
	),
);