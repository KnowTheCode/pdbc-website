<?php
/**
 * AdaptiveContent Plugin Runtime Configuration Parameters.
 *
 * @package     KnowTheCode\AdaptiveContent
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\AdaptiveContent;

use Fulcrum\Config\Config;
use Fulcrum\Metadata\Metabox;

return array(

	/****************************
	 * Initial Setup
	 ****************************/

	'initial_parameters' => array(),

	'plugin_activation_keys' => array(),

	'register_concretes' => array(
		'metabox.adaptive_content' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Metabox(
					new Config( ADAPTIVECONTENT_PLUGIN_DIR . 'config/admin/metabox-iam.php' )
				);
			},
		),
	),

	'service_providers' => array(),

	'plugin_init_admin_events' => array(
		'metabox.iam',
	),

	'config' => array(
		'cookie_name'    => '_pdbc_ux_iam',
		'default'        => 'entrepreneur',
		'options'        => array(
			'entrepreneur',
			'developer',
		),
		'button_view'    => ADAPTIVECONTENT_PLUGIN_DIR . 'src/views/button.php',
		'content_view'   => ADAPTIVECONTENT_PLUGIN_DIR . 'src/views/contents.php',
		'asset_config'   => ADAPTIVECONTENT_PLUGIN_DIR . 'config/assets/scripts.php',
		'rest_url'       => '/wp-json/adaptivecontent/v1',
		'rest_namespace' => 'adaptivecontent/v1',
	),
);
