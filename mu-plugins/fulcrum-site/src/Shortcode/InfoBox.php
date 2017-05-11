<?php

/**
 * Info Box Shortcode
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\FulcrumSite\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class InfoBox extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.2.2
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$content = do_shortcode( $this->content );
		$type    = $this->atts['type'] ? ' ' . esc_attr( $this->atts['type'] ) : '';
		$class   = $this->atts['class'] ? esc_attr( $this->atts['class'] ) : '';

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}
}
