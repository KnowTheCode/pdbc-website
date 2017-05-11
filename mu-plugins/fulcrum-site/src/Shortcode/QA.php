<?php
/**
 * QA Shortcode
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.2.2
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\FulcrumSite\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class QA extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.2.2
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$content = do_shortcode( $this->content );

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Get the font icon classname.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $show_open Indicates whether icon should indicate an open position.
	 *
	 * @return string|void
	 */
	protected function get_icon( $show_open = false ) {
		$icon = $show_open ? 'close_icon' : 'open_icon';

		return esc_attr( $this->atts[ $icon ] );
	}

	/**
	 * Get and prepare an attribute to render out to the browser.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function get_classes() {
		$classes = '';

		if ( $this->atts['color'] ) {
			$classes .= ' ' . esc_attr( $this->atts['color'] );
		}

		if ( $this->atts['type'] ) {
			$classes .= ' qa--' . esc_attr( $this->atts['type'] );
		}

		return $classes;
	}

}
