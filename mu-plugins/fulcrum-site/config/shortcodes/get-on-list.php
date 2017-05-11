<?php

/**
 * Get on List Shortcode - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\FulcrumSite\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'KnowTheCode\FulcrumSite\Shortcode\GetOnList',
	'config'    => array(
		'shortcode' => 'get-on-list',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/get-on-list.php',
		'defaults'  => array(
			'class'       => '',
			'button_text' => 'Get me on the List!',
		),
	),
);
