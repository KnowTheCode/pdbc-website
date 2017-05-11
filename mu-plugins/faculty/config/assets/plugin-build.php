<?php
/**
 * Minimized Fulcrum Site build runtime configuration parameters
 *
 * @package     KnowTheCode\FulcrumSite\Asset\Repo;
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Faculty\Asset\Repo;

use KnowTheCode\Faculty\Plugin;

return array(
	'is_script' => true,
	'handle'    => 'faculty_reveal_js',
	'config'    => array(
		'file'                 => FACULTY_PLUGIN_URL . 'assets/dist/js/jquery.plugin.min.js',
		'deps'                 => array( 'jquery' ),
		'version'              => Plugin::VERSION,
		'in_footer'            => true,
	),
);
