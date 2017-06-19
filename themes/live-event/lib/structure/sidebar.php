<?php
/**
 * Sidebar structure functionality
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Structure;

function render_embedded_nav() {
	if ( ! is_singular() || ! post_type_supports( get_post_type(), 'discover-bootcamp-widget-area' ) ) {
		return;
	}

	genesis_widget_area( 'after-entry', array(
		'before' => '<div class="after-entry widget-area">',
		'after'  => '</div>',
	) );
}