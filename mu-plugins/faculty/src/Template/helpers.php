<?php
/**
 * Faculty Template Functions
 *
 * @package     KnowTheCode\Faculty\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\Faculty\Template;

require_once( FACULTY_PLUGIN_DIR . 'src/Support/helpers.php' );

use KnowTheCode\Faculty\Plugin;
use KnowTheCode\Faculty\Support as support;

//add_action( 'genesis_meta', __NAMESPACE__ . '\setup_help_center_template', 50 );
/**
 * Description.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_help_center_template() {
	add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
}

/**
 * Add to the body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes
 *
 * @return array
 */
function add_body_class( array $classes ) {
	$classes[] = 'faculty';

	return $classes;
}


/**
 * Renders the topics.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_topics() {
	$topic_groups = support\get_topic_groups();
	if ( $topic_groups === false ) {
		return _e( 'Whoopsie, something went wrong on our way to grab all of the Help Center topics', 'help_center' );
	}

	foreach ( $topic_groups as $term_id => $topic_group ) {
		if ( $term_id < 1 || ! $topic_group ) {
			continue;
		}
		$topics = $topic_group['posts'];
		require( 'views/group.php' );
	}
}

/**
 * Render the topic.
 *
 * @since 1.0.0
 *
 * @param int $term_id
 * @param array $topic_group
 *
 * @return void
 */
function render_topic( $term_id, array $topics ) {

	foreach ( $topics as $post_id => $topic ) {
		$post_id = (int) $post_id;
		if ( $post_id < 1 ) {
			continue;
		}

		$post_url = get_permalink( $post_id );

		require( 'views/topic.php' );
	}
}