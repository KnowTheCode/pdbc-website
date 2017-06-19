<?php

/**
 * Vimeo Shortcode - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\FulcrumSite\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'KnowTheCode\FulcrumSite\Shortcode\Vimeo',
	'config'    => array(
		'shortcode' => 'vimeo',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/vimeo.php',
		'defaults'  => array(
			'id'          => '',
			'width'       => 900,
			'height'      => 506,
			'autoplay'    => 0,
			'loop'        => 0,
			'show_footer' => 1,
		),
	),
);
