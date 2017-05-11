<?php
/**
 * Post structures
 *
 * @package     KnowTheCode\FulcrumSite\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\FulcrumSite\Structure;

add_action( 'page_header_content', __NAMESPACE__ . '\render_page_header_content' );
function render_page_header_content() {
	if ( ! is_page() ) {
		return;
	}

	$subtitle = get_page_header_meta( '_fulcrum_header_subtitle' );
	if ( $subtitle ) {
		include( __DIR__ . '/views/page-header.php' );
	}

	$content = get_page_header_meta( '_fulcrum_header_content' );
	if ( $content ) {
		echo wpautop( do_shortcode( $content ) );
	}
}

function get_page_header_meta( $meta_key, $post_id = false ) {
	static $post_id = false;
	static $meta_store = array();

	if ( $post_id === false ) {
		$post_id = get_the_ID();
	}

	if ( ! array_key_exists( $post_id, $meta_store ) ) {
		$meta_store[ $post_id ] = array();
	}

	if ( ! array_key_exists( $meta_key, $meta_store[ $post_id ] ) ) {
		$meta_store[ $post_id ][ $meta_key ] = get_post_meta( $post_id, $meta_key, true );
	}

	return $meta_store[ $post_id ][ $meta_key ];
}