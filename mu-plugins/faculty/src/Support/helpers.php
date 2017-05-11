<?php
/**
 * Help Center Helper Functions
 *
 * @package     KnowTheCode\Faculty\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Faculty\Support;

/**
 * Get the faculty's metadata.
 *
 * @since 1.0.0
 *
 * @param string $key Subkey within the metadata's array
 * @param int $post_id Post ID
 * @param string $metakey Metakey used as the primary in the db
 *
 * @return array|string|null
 */
function get_metadata( $key = '', $post_id = 0, $metakey = '_faculty_details' ) {
	static $meta_store = array();

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! isset( $meta_store[ $post_id ] ) ) {
		$metadata               = get_post_meta( $post_id, $metakey );
		$meta_store[ $post_id ] = $metadata[0];
	}

	if ( ! $key ) {
		return $meta_store[ $post_id ];
	}

	return array_key_exists( $key, $meta_store[ $post_id ] )
		? $meta_store[ $post_id ][ $key ]
		: null;
}

/**
 * Get the social links for the faculty's profile.
 *
 * @since 1.0.0
 *
 * @return array|void
 */
function get_social_links_config( $post_id = 0 ) {
	$metadata = get_metadata( '', $post_id );
	if ( ! $metadata ) {
		return;
	}

	$config = include( FACULTY_PLUGIN_DIR . '/config/metadata/faculty-details.php' );
	if ( ! $config ) {
		return;
	}

	unset( $metadata['short_bio'] );

	return array( $metadata, $config['font_icons'] );
}
