<?php
/**
 * Single Faculty Article Template
 *
 * @package     KnowTheCode\Faculty\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GpL-2.0+
 */
namespace KnowTheCode\Faculty\Template;

use KnowTheCode\Faculty\Support as Support;

remove_all_actions( 'genesis_entry_header' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_content', __NAMESPACE__ . '\render_faculty_profile_picture', 8 );
/**
 * Render the faculty member's profile picture.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_faculty_profile_picture() {
	the_post_thumbnail( 'medium', array(
		'class' => 'alignnone faculty_profile-picture',
	) );

}

add_filter( 'page_title_byline', __NAMESPACE__ . '\render_faculty_byline' );
/**
 * Render the faculty short bio as the page header byline.
 *
 * @since 1.0.0
 *
 * @return string
 */
function render_faculty_byline() {
	return Support\get_metadata( 'short_bio' );
}

add_action( 'genesis_entry_footer', __NAMESPACE__ . '\render_faculty_social_links' );
/**
 * Description.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_faculty_social_links() {
	list( $metadata, $font_icons ) = Support\get_social_links_config();

	include( FACULTY_PLUGIN_DIR . 'src/views/faculty-social-links.php' );
}

genesis();
