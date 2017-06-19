<?php
/**
 * AdSpot Ajax Handler Runtime Configuration
 *
 * @package     Partners\Adspot
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */
namespace Partners\Adspot;

return array(
	'partner_view_directory'    => PARTNERS_PLUGIN_DIR . 'src/adspot/views/',
	'nonce_key'                 => '_partners_adspot',
	'data_packet'               => array(),
	'number_of_active_partners' => 4,
	'options_next_key'          => 'partner_adspot_next',
	'partners'                  => array(
		'siteground',
		'serverpress',
		'studiopress',
		'wpninjas',
	),
);