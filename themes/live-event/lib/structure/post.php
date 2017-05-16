<?php
/**
 * Post structure functionality
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\LiveEvent\Structure;

use KnowTheCode\LiveEvent\Support as Support;

/**
 * Unregister all of the post default events.
 *
 * @since 1.4.8
 *
 * @return void
 */
function unregister_post_events() {
	remove_all_actions( 'genesis_entry_footer' );
	remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
	remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
}



add_action( 'genesis_before', __NAMESPACE__ . '\relocate_entry_header' );
/**
 * Relocate the entry header to before the content-sidebar containers.
 *
 * @since 1.0.0
 *
 * @return void
 */
function relocate_entry_header() {
	if ( is_front_page() ) {
		return;
	}

	remove_all_actions( 'genesis_entry_header' );

	add_action( 'genesis_after_header', __NAMESPACE__ . '\render_page_header', 9999 );
}

/**
 * Render the page header.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function render_page_header() {
	$page_title = get_the_title();
	$post_type  = get_post_type();

	if ( is_single() && get_post_type() == 'post' ) {
		$view_file = 'single-header.php';

		add_action( 'genesis_after_entry', 'genesis_do_author_box_single', 11 );
		$byline  = change_entry_meta_header();
		$classes = Support\get_focal_topic_class_attributes();

	} else {
		$view_file = 'page-header.php';
		$byline    = apply_filters( 'page_title_byline', '' );

		if ( ! in_array( $post_type, array( 'page', 'sponsor', 'faculty' ) ) ) {
			reset_genesis_entry_header_hooks();
		}
	}

	if ( $byline ) {
		$byline = do_shortcode( $byline );
	}

	require( __DIR__ . '/views/' . $view_file );

	return true;
}

/**
 * Reset the Genesis Entry Header Hooks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function reset_genesis_entry_header_hooks() {
	add_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	add_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	add_action( 'genesis_entry_header', 'genesis_do_post_title', 7 );

	add_action( 'genesis_entry_header', 'genesis_post_info', 8 );
	add_filter( 'genesis_noposts_text', '__return_empty_string' );

	add_filter( 'genesis_attr_entry-title', __NAMESPACE__ . '\add_focal_topic_class_to_entry_title' );
}

/**
 * Add attributes for entry title element.
 *
 * @since 2.0.0
 *
 * @param array $attributes Existing attributes for entry title element.
 *
 * @return array Amended attributes for entry title element.
 */
function add_focal_topic_class_to_entry_title( $attributes ) {

	$focal_topic = Support\get_focal_topic_class_attributes();
	if ( $focal_topic ) {
		$attributes['class'] .= esc_attr( $focal_topic );
	}

	return $attributes;
}

add_filter( 'genesis_post_info', __NAMESPACE__ . '\change_entry_meta_header' );
/**
 * Change the entry meta header, i.e. post info.
 *
 * @since 1.0.0
 *
 * @return string
 */
function change_entry_meta_header() {
	return '[post_date] | [post_categories before=""]';
}

add_filter( 'the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
/**
 * Change the Read More Link HTML Markup and content.
 *
 * @since 1.0.0
 *
 * @param string $html
 *
 * @return string
 */
function change_the_read_more_link( $html ) {
	$html = Support\change_read_more_text( $html, __( 'Continue reading', CHILD_TEXT_DOMAIN ) );

	if ( doing_filter( 'get_the_content_more_link' ) ) {
		$html = Support\strip_off_read_more_opening_dots( $html );

		return '</p><p>' . $html;
	}

	return sprintf( '<p>%s</p>', $html );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\render_after_entry', 7 );
function render_after_entry() {
	if ( ! is_single() ) {
		return;
	}

	genesis_after_entry_widget_area();

	render_inpost_navigation();
}

/**
 * Add Prev/Next to bottom of the singles.
 *
 * @since 1.0.0
 *
 * @param string $post_type
 *
 * @return void
 */
function render_inpost_navigation() {
	$previous = get_previous_post();
	$next     = get_next_post();

	include( __DIR__ . '/views/single-navigation.php' );
}

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\set_author_box_gravatar_size' );
/**
 * Set the author box gravatar size.
 *
 * @since 1.5.8
 *
 * @return int
 */
function set_author_box_gravatar_size() {
	return 125;
}

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\set_comments_gravatar_size' );
/**
 * Set the comments Gravatar size.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function set_comments_gravatar_size( array $args ) {

	$args['avatar_size'] = 60;

	return $args;
}

add_filter( 'genesis_author_box', __NAMESPACE__ . '\wrap_author_box_containers' );
/**
 * Wrap the author box title and content into a container.
 *
 * @since 1.0.0
 *
 * @param string $html
 *
 * @return mixed
 */
function wrap_author_box_containers( $html ) {
	$ending_pattern = Support\get_substr_from_pattern( $html, 'class="author-box-title">' );
	if ( $ending_pattern === false ) {
		return $html;
	}

	$html = str_replace(
		$ending_pattern,
		'<div class="author-box--container">' . $ending_pattern,
		$html
	);

	$html = str_replace(
		'</section>',
		'</div></section>',
		$html
	);

	return $html;
}
