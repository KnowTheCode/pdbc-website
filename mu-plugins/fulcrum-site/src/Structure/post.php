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
	if ( is_front_page() || is_home() ) {
		return;
	}

	$subtitle = get_page_header_meta( '_fulcrum_subtitle' );
	if ( $subtitle ) {
		include( __DIR__ . '/views/page-header.php' );
	}

	$content = get_page_header_meta( '_fulcrum_header_content' );
	if ( $content ) {
		echo do_shortcode( wpautop( $content ) );
	}
}

/**
 * Description.
 *
 * @since 1.0.0
 *
 * @param $meta_key
 * @param bool $post_id
 *
 * @return void
 */
function get_page_header_meta( $meta_key, $post_id = false ) {
	static $post_id = false;
	static $meta_store = array();

	if ( $post_id === false ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return;
	}

	if ( ! array_key_exists( $post_id, $meta_store ) ) {
		$meta_store[ $post_id ] = array();
	}

	if ( ! array_key_exists( $meta_key, $meta_store[ $post_id ] ) ) {
		$meta_store[ $post_id ][ $meta_key ] = get_post_meta( $post_id, $meta_key, true );
	}

	return $meta_store[ $post_id ][ $meta_key ];
}