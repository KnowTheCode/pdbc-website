<?php

/**
 * Info Box Shortcode - Runtime Configuration Parameters
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
	'classname' => 'KnowTheCode\FulcrumSite\Shortcode\InfoBox',
	'config'    => array(
		'shortcode' => 'infobox',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/info-box.php',
		'defaults'  => array(
			'class' => '',
			'type'  => '',
		),
	),
);
