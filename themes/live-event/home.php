<?php
/**
 * Blog (Posts Page) page template
 *
 * @package     KnowTheCode\LiveEvent\HomePage
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\HomePage;

use WP_Post;
use KnowTheCode\LiveEvent\Structure as structure;

add_filter( 'the_title', __NAMESPACE__ . '\change_to_blog_title', 99 );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
/**
 * Render the contents out to the browser.
 *
 * @since 1.0.0
 *
 * @return void
 */
function change_to_blog_title() {
	structure\reset_genesis_entry_header_hooks();
	remove_filter( 'the_title', __NAMESPACE__ . '\change_to_blog_title', 99 );

	$page_for_posts = get_page_for_posts();
	if ( ! $page_for_posts ) {
		return;
	}

	return $page_for_posts->post_title;
}

/**
 * Get the page for posts object
 *
 * @since 1.0.0
 *
 * @return WP_Post|null
 */
function get_page_for_posts() {
	$post_id = get_option( 'page_for_posts' );

	return get_post( $post_id );
}

/**
 * Prepare the contents for rendering, which includes sanitizing it,
 * since it's not running through filtering, and running the shortcodes.
 *
 * @since 1.0.0
 *
 * @param WP_Post $page_for_posts Post object
 *
 * @return string Returns the clean HTML
 */
function prepare_contents_for_render( WP_Post $page_for_posts ) {
	$content = wp_kses_post( $page_for_posts->post_content );
	$content = do_shortcode( $content );

	return wpautop( $content );
}

genesis();
