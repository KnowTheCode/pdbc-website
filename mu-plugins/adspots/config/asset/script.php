<?php
/**
 * User History Script runtime configuration parameters
 *
 * @package     User_History\Asset
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace Partners\Asset;

use Partners\Controller;

return array(
	'is_script' => true,
	'handle'    => 'partners_adspot_js',
	'config'    => array(
		'file'      => PARTNERS_PLUGIN_URL . 'assets/js/jquery.adspot.js',
		'deps'      => array( 'jquery' ),
		'version'   => Controller::VERSION,
		'in_footer' => true,
		'localize'  => array(
			'params'      => array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'action'  => 'partner_adspot',
			),
			'js_var_name' => 'partnerParameters',
		),
	),
);
