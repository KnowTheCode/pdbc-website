<?php
/**
 * FitVids Script runtime configuration parameters
 *
 * @package     KnowTheCode\FulcrumSite\Asset\Repo
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\FulcrumSite\Asset\Repo;

return array(
	'is_script' => true,
	'handle'    => 'fitvids_js',
	'config'    => array(
		'file'      => FULCRUM_SITE_PLUGIN_URL . 'assets/vendor/jquery.fitvids/jquery.fitvids.js',
		'deps'      => array( 'jquery', ),
		'version'   => '1.1',
		'in_footer' => true,
	),
);
