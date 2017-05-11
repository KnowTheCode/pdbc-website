<?php
/**
 * Faculty Plugin Runtime Configuration Parameters.
 *
 * @package     KnowTheCode\Faculty
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Faculty;

use Fulcrum\Config\Config;
use Fulcrum\Metadata\Metabox;

return array(

	'initial_parameters'  => array(
		'faculty_details.metadata.config' => new Config( FACULTY_PLUGIN_DIR . 'config/metadata/faculty-details.php' ),
	),

	'plugin_activation_keys' => array(
		'faculty.post_type',
		'faculty_role.taxonomy',
		'focus.taxonomy',
	),

	'register_concretes' => array(
		'metabox.faculty_details' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Metabox(
					new Config( FACULTY_PLUGIN_DIR . 'config/admin/metabox-faculty-details.php' )
				);
			}
		),
	),

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
		'script.faculty'   => array(
			'provider' => 'provider.asset',
			'config'   => FACULTY_PLUGIN_DIR . 'config/assets/plugin-build.php',
		),

		/****************************
		 * Custom Post Types
		 ****************************/
		'faculty.post_type' => array(
			'provider' => 'provider.post_type',
			'config'   => FACULTY_PLUGIN_DIR . 'config/custom/post-type.php',
		),

		/****************************
		 * Taxonomies
		 ****************************/
		'faculty_role.taxonomy'  => array(
			'provider' => 'provider.taxonomy',
			'config'   => FACULTY_PLUGIN_DIR . 'config/custom/roles-taxonomy.php',
		),
		'focus.taxonomy'  => array(
			'provider' => 'provider.taxonomy',
			'config'   => FACULTY_PLUGIN_DIR . 'config/custom/focus-taxonomy.php',
		),

		/****************************
		 * Template
		 ****************************/
		'faculty.template'  => array(
			'provider' => 'provider.template',
			'config'   => FACULTY_PLUGIN_DIR . 'config/template/template.php',
		),


		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.faculty'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FACULTY_PLUGIN_DIR . 'config/shortcode/faculty.php',
		),
	),
);
