<?php
/**
 * Front page template
 *
 * @package     KnowTheCode\LiveEvent\FrontPage
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\LiveEvent\FrontPage;

use KnowTheCode\LiveEvent\Support as Support;

remove_all_actions( 'genesis_entry_header' );
remove_all_actions( 'genesis_entry_footer' );
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_front_page_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_front_page_assets() {
	wp_enqueue_style(
		'front_page_css',
		CHILD_URL . '/assets/dist/css/front-page.css',
		array(),
		get_asset_version_number( CHILD_THEME_DIR . '/assets/dist/css/front-page.css' )
	);
}

//add_action( 'genesis_before', __NAMESPACE__ . '\render_fullpage_optin_popup' );
/**
 * Render the fullpage optin popup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_fullpage_optin_popup() {
	$html = get_post_meta( get_the_ID(), '_optin_fullpage_content', true );
	if ( ! $html ) {
		return;
	}

	echo wpautop( do_shortcode( $html ) );
}

//add_action( 'genesis_after_loop', __NAMESPACE__ . '\render_popup_panels', 99 );
/**
 * Render the popup panels.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_popup_panels() {
	$html    = '';
	$post_id = get_the_ID();

	$meta_keys = array(
		'_bootcamp_topic_technical',
		'_bootcamp_topic_pm',
		'_bootcamp_topic_business',
	);

	foreach ( $meta_keys as $meta_key ) {
		$html .= get_post_meta( $post_id, $meta_key, true );
	}

	if ( ! $html ) {
		return;
	}

	echo wpautop( do_shortcode( $html ) );
}

genesis();
