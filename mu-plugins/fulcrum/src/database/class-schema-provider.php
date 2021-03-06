<?php

/**
 * Schema Service Provider
 *
 * @package     Fulcrum\Database
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace Fulcrum\Database;

use Fulcrum\Config\Config_Contract;
use Fulcrum\Foundation\Service_Provider\Provider;
use Fulcrum\Config\Config;

class Schema_Provider extends Provider {

	/**
	 * Register the schema on admin_init
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		if ( is_admin() ) {
			add_action( 'admin_init', array( $this, 'register_queue' ) );
		}
	}

	/**
	 * Get the concrete based upon the configuration supplied.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Runtime configuration parameters.
	 * @param string $unique_id Container's unique key ID for this instance.
	 *
	 * @return array
	 */
	public function get_concrete( array $config, $unique_id = '' ) {


		$service_provider = array(
			'autoload' => $config['autoload'],
			'concrete' => function ( $container ) use ( $config ) {
				$config_obj = $this->instantiate_config( $config );

				return new Schema( $config_obj );
			},
		);

		return $service_provider;
	}

	/**
	 * Get the default structure for the concrete.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	protected function get_concrete_default_structure() {
		return array(
			'autoload' => true,
			'config'   => array(),
		);
	}
}
