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
namespace KnowTheCode\LiveEvent\ArchivePage;

use WP_Post;
use KnowTheCode\LiveEvent\Structure as structure;

remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before', 'KnowTheCode\LiveEvent\Structure\relocate_entry_header' );

add_action( 'genesis_before', __NAMESPACE__ . '\relocate_archive_entry_header' );
/**
 * Description.
 *
 * @since 1.0.0
 *
 * @return void
 */
function relocate_archive_entry_header() {
	remove_all_actions( 'genesis_entry_header' );

	add_action( 'genesis_after_header', __NAMESPACE__ . '\render_archive_page_header', 9999 );
}

/**
 * Render the contents out to the browser.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_archive_page_header() {
	$page_title = $content = '';

	if ( is_category() || is_tag() || is_tax() ) {
		$archive_function_to_call = 'taxonomy';
	} elseif ( is_author() ) {
		$archive_function_to_call = 'author';
	}

	$archive_function_to_call = __NAMESPACE__ . '\get_' . $archive_function_to_call . '_page_title';

	list( $page_title, $content ) = $archive_function_to_call();

	if ( $content ) {
		$content = do_shortcode( wpautop( $content ) );
	}

	include( __DIR__ . '/lib/views/archive-page-header.php' );

	structure\reset_genesis_entry_header_hooks();
}

function get_taxonomy_page_title() {
	global $wp_query;

	$term = is_tax()
		? get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) )
		: $wp_query->get_queried_object();

	if ( ! $term ) {
		return;
	}

	$heading = get_term_meta( $term->term_id, 'headline', true );
	if ( empty( $heading ) ) {
		$heading = $term->name;
	}

	$intro_text = get_term_meta( $term->term_id, 'intro_text', true );

	return array( $heading, $intro_text );
}

function get_author_page_title() {
	$author_id = (int) get_query_var( 'author' );

	$heading = get_the_author_meta( 'headline', $author_id );
	if ( empty( $heading ) ) {
		$heading = get_the_author_meta( 'display_name', $author_id );
	}

	$intro_text = get_the_author_meta( 'intro_text', $author_id );

	return array( $heading, $intro_text );
}

genesis();
