<?php

/**
 * Inpost Partners Shortcode - Runtime Configuration Parameters
 *
 * @package     Partners\AdSpot
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace Partners\AdSpot;

return array(
	'autoload'  => true,
	'classname' => 'Partners\AdSpot\AdSpot_Shortcode',
	'config'    => array(
		'shortcode'                 => 'adspot',
		'view'                      => PARTNERS_PLUGIN_DIR . 'src/adspot/views/adspot.php',
		'view_skip_to'              => PARTNERS_PLUGIN_DIR . 'src/adspot/views/skip-to.php',
		'defaults'                  => array(
			'level' => '',
		),
		'number_of_active_partners' => 4,
		'options_next_key'          => 'partner_adspot_next',
		'partners'                  => array(
			'siteground',
			'serverpress',
			'studiopress',
			'wpninjas',
		),
	),
);
