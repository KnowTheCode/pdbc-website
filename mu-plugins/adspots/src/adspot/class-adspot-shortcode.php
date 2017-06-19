<?php

/**
 * AdSpot Shortcode - Adds the container which is then used by the AdSpot Ajax Handler to
 * serve up a partner within an article.  Partners are rotated in alphabetical order per impression.
 *
 * @package     Partners\Adspot
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace Partners\Adspot;

use Fulcrum\Custom\Shortcode\Shortcode;

class AdSpot_Shortcode extends Shortcode {

	/**
	 * Name of the partner being served up
	 * 
	 * @var string
	 */
	protected $partner = '1';

	/**
	 * Next partner index number
	 * 
	 * @var int
	 */
	protected $next_partner = 0;

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {

		$nonce = wp_create_nonce( '_partners_adspot' );

		ob_start();
		include( $this->config->view );

		if ( $this->show_skip_to_view() ) {
			include( $this->config->view_skip_to );
		}

		return ob_get_clean();
	}

	/**
	 * Get the Partner from the database and set the `next` one (for the next impression).
	 *
	 * @since 1.0.0
	 *
	 * @return string|bool
	 */
	protected function get_partner() {
		$this->next_partner = (int) get_option( $this->config->options_next_key, 0 );

		if ( ! isset( $this->config->partners[ $this->next_partner ] ) ) {
			$this->next_partner = 0;
		}
		$this->partner = $this->config->partners[ $this->next_partner ];

		$this->set_the_next_partner();
	}

	/**
	 * Set the next partner - for the next impression.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function set_the_next_partner() {
		$this->next_partner++;

		if ( $this->is_next_partner_out_of_bounds() ) {
			$this->next_partner = 0;
		}

		update_option( $this->config->options_next_key, $this->next_partner, true );
	}

	protected function is_next_partner_out_of_bounds() {
		return $this->next_partner < 0 || $this->next_partner > ( $this->config->number_of_active_partners - 1 );
	}


	protected function show_skip_to_view() {
		if ( ! is_user_logged_in() ) {
			return false;
		}

		return is_singular( 'lab' );
	}
}
