<?php

/**
 * Clearfix Shortcode - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\FulcrumSite\Shortcode;

return array(
	'autoload' => true,
	'config'   => array(
		'shortcode' => 'clearfix',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/clearfix.php',
		'defaults'  => array(
			'class' => '',
		),
	),
);
