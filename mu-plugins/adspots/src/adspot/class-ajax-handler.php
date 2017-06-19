<?php
/**
 * AdSpot Ajax Handler
 *
 * @package     Partners\AdSpot
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace Partners\AdSpot;

use Fulcrum\Foundation\AJAX;

class Ajax_Handler extends AJAX {
	
	/**
	 * Name of the partner being served up
	 *
	 * @var string
	 */
	protected $partner;

	/**
	 * Next partner index number
	 *
	 * @var int
	 */
	protected $next_partner = 0;

	/**
	 * Initialize the events
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	protected function init_events() {
		add_action( 'wp_ajax_partner_adspot', array( $this, 'get_adspot' ) );
		add_action( 'wp_ajax_nopriv_partner_adspot', array( $this, 'get_adspot' ) );
	}

	/**
	 * Ajax request to load the Adspot content.
	 *
	 * @since 1.0.0
	 *
	 * @return integer Returns the record ID back to the JavaScript caller
	 */
	public function get_adspot() {
		$this->init_ajax();

		$this->get_partner();
		
		if ( $this->partner_view_is_valid() ) {
			$this->get_html();
		} else {
			$this->error_message = 'unable to retrieve partner view';
			$this->error_code    = 1;
		}

		$this->ajax_response_handler();

		die();
	}

	/**
	 * Checks if the partner's view file is valid.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function partner_view_is_valid() {
		$partner                   = trim( esc_attr( $this->data_packet['partner'] ) );
		$this->data_packet['view'] = $this->config->partner_view_directory . $partner . '.php';

		return is_readable( $this->data_packet['view'] );
	}

	/**
	 * Render the view file into the output buffer and then capture it into the data packet
	 * to return back to the script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function get_html() {
		$images_url = PARTNERS_PLUGIN_URL . 'assets/images/';

		ob_start();
		include( $this->data_packet['view'] );
		$this->data_packet['html'] = ob_get_clean();
	}

	/**
	 * Get the Partner from the database and set the `next` one (for the next impression).
	 *
	 * @since 1.0.0
	 *
	 * @return string|bool
	 */
	protected function get_partner() {
		$this->next_partner = (int) \Fulcrum\Support\Helpers\hard_get_option_value( $this->config->options_next_key, 0 );

		if ( ! isset( $this->config->partners[ $this->next_partner ] ) ) {
			$this->next_partner = 0;
		}
		$this->data_packet['partner'] = $this->partner = $this->config->partners[ $this->next_partner ];

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

		update_option( $this->config->options_next_key, $this->next_partner );
	}

	/**
	 * Check if the next partner is out of bounds.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function is_next_partner_out_of_bounds() {
		return $this->next_partner < 0 || $this->next_partner > ( $this->config->number_of_active_partners - 1 );
	}
}
