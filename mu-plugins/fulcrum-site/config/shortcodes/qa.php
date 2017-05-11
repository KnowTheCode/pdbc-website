<?php

/**
 * QA Shortcode - Runtime Configuration Parameters
 *
 * Use the QA for questions/answers, hints, bios, or any content that you want to show/hide via the click on the mouse.
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
	'classname' => 'KnowTheCode\FulcrumSite\Shortcode\QA',
	'config'    => array(
		'shortcode' => 'qa',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/qa.php',
		'defaults'  => array(
			'id'         => '',
			'class'      => '',
			'question'   => '',
			'type'       => '',
			'color'      => '',
			'open_icon'  => 'fa fa-chevron-down',
			'close_icon' => 'fa fa-chevron-up',
		),
	),
);
