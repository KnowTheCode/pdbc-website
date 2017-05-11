<?php

/**
 * Get On List Shortcode
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\FulcrumSite\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class GetOnList extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.2.2
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$this->enqueue_script();

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}

	protected function enqueue_script() {
		wp_enqueue_script(
			'ac_get_on_list_js',
			FULCRUM_SITE_PLUGIN_URL . 'assets/js/vendor/activecampaign-list-form.js',
			array(),
			'1.0.0',
			true
		);
	}
}
