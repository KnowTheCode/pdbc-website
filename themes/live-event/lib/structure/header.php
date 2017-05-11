<?php
/**
 * Header structure functionality
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Structure;

/**
 * Unregister default navigation events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_header_events() {

}

add_action( 'genesis_before_header', __NAMESPACE__ . '\render_fullpage_optin', 1 );
/**
 * Renders out the pre-footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_fullpage_optin() {
	genesis_widget_area( 'fullpage-optin' );
}
