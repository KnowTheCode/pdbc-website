<?php
/**
 * Footer structure
 *
 * @package     Partners\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */
namespace Partners\Structure;

add_action( 'genesis_before_footer', __NAMESPACE__ . '\render_partner_footer', 9 );
/**
 * Renders out the partners__footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_partner_footer() {
	if ( is_front_page() || is_page( 'our-sponsoring-partners' ) ) {
		return;
	}


	$images = include( PARTNERS_PLUGIN_DIR . 'config/structure/footer.php' );
	
	include( 'views/partners-footer.php' );
}