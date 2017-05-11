<?php
/**
 * Fulcrum Site Plugin Runtime Configuration Parameters.
 *
 * @package     KnowTheCode\FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\FulcrumSite;

use Fulcrum\Config\Config;

return array(

	'plugin_activation_keys' => array(),
	
	'register_concretes' => array(
		'KnowTheCode\FulcrumSite\Widget\GetOnListWidget' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Config( FULCRUM_SITE_PLUGIN_DIR . 'config/widgets/get-on-list.php' );
			}
		),
	),

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
		'style.fontawesome'   => array(
			'provider' => 'provider.asset',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/assets/font-awesome.php',
		),
		// This is the minified live site scripts
		'script.fulcrum_site'   => array(
			'provider' => 'provider.asset',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/assets/plugin-build.php',
		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.clearfix'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/clearfix.php',
		),
		'shortcode.info_box'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/info-box.php',
		),
		'shortcode.qa'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/qa.php',
		),
//		'shortcode.get-on-list'  => array(
//			'provider' => 'provider.shortcode',
//			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/get-on-list.php',
//		),

		/****************************
		 * Widgets
		 ****************************/
		'widget.get-on-list'  => array(
			'provider' => 'provider.widget',
			'config' => array(
				'KnowTheCode\FulcrumSite\Widget\GetOnListWidget',
			),
		),
	),
);
