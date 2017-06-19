<?php
/**
 * Partners Plugin
 *
 * @package     Partners
 * @since       1.0.2
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace Partners;

use Fulcrum\Addon\Addon;

class Controller extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.2';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '3.5';

	protected $adspot;

	/*****************
	 * Initializers
	 ****************/

	/**
	 * Initialize the events.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		parent::init_events();

		$this->adspot = $this->fulcrum['ajax.partners_adspot'];

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 999999 );
	}

	/**
	 * Enqueue the assets.  We'll do this last to give everything else time to load up.
	 *
	 * @since 1.0.2
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		wp_enqueue_script( 'partners_adspot_js', PARTNERS_PLUGIN_URL . 'assets/js/jquery.adspot.js', array( 'jquery'), self::VERSION, true  );

		$js_vars = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'action'  => 'partner_adspot',
		);

		wp_localize_script( 'partners_adspot_js', 'partnerParameters', $js_vars );
	}
}