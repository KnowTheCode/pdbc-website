<?php
/**
 * Archive structure functionality
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Structure;

/**
 * Unregister default archive events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_archive_events() {
	// nothing to unregister.
}

add_action( 'genesis_meta', __NAMESPACE__ . '\dont_limit_forum_archive_page' );
/**
 * bbPress' forum archive page cannot be content
 * limited; else, the enter forum listing is cut off.
 * Instead, we just want to render out the content.
 *
 * @since 1.4.8
 *
 * @return void
 */
function dont_limit_forum_archive_page() {
	if ( ! is_post_type_archive( 'forum' ) ) {
		return;
	}

	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	add_action( 'genesis_entry_content', 'the_content' );
}
