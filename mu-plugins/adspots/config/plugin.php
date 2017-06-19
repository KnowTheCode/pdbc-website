<?php
/**
 * Partners Plugin Runtime Configuration Parameters.
 *
 * @package     Partners
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace Partners;

use Fulcrum\Config\Config;
use Partners\AdSpot\Ajax_Handler;

return array(
	/***************************
	 * Partners
	 **************************/

	'partner_adspot_next' => 0,

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(


		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.adspot' => array(
			'provider' => 'provider.shortcode',
			'config'   => PARTNERS_PLUGIN_DIR . 'config/adspot/adspot-shortcode.php',
		),
	),

	/****************************
	 * Concretes
	 ****************************/

	'register_concretes' => array(
		'ajax.partners_adspot' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Ajax_Handler(
					new Config( PARTNERS_PLUGIN_DIR . 'config/adspot/ajax-handler.php' ),
					$container
				);
			}
		),
	),
);

