<?php
/**
 * Minimized Fulcrum Site build runtime configuration parameters
 *
 * @package     KnowTheCode\FulcrumSite\Asset\Repo;
 * @since       1.0.1
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\FulcrumSite\Asset\Repo;

use KnowTheCode\FulcrumSite\Plugin;

return array(
	'is_script' => true,
	'handle'    => 'fulcrum_site_js',
	'config'    => array(
		'file'                 => FULCRUM_SITE_PLUGIN_URL . 'assets/dist/js/jquery.plugin.min.js',
		'deps'                 => array( 'jquery' ),
		'version'              => Plugin::VERSION,
		'in_footer'            => true,
		'localize'  => array(
			'params'      => array(
				'qa' => array(
					'iconEl'        => '.qa--icon',
					'iconClassname' => array(
						'open'  => '--is-open',
						'closed' => '--is-closed',
					),
				),
			),
			'js_var_name' => 'qaParameters',
		),
	),
);
