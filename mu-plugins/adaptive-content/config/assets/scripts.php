<?php
/**
 * Minimized I AM build runtime configuration parameters
 *
 * @package     KnowTheCode\AdaptiveContent\Asset\Repo;
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\AdaptiveContent\Asset\Repo;

use KnowTheCode\AdaptiveContent\Plugin;

return array(
	'is_script' => true,
	'handle'    => 'adaptive_content_js',
	'config'    => array(
//		'file'      => ADAPTIVECONTENT_PLUGIN_URL . 'assets/dist/js/jquery.plugin.min.js',
		'file'      => ADAPTIVECONTENT_PLUGIN_URL . 'assets/js/jquery.iam.js',
		'deps'      => array( 'jquery' ),
		'version'   => Plugin::VERSION,
		'in_footer' => true,
		'localize'  => array(
			'params'      => array(
				'iam_nonce'       => wp_create_nonce( 'wp_rest' ),
				'iam_url'         => site_url( '/wp_json/rest/v1' ),
				'iam_cookie_name' => '_pdbc_ux_iam',
				'default_iam'     => 'entrepreneur',
			),
			'js_var_name' => 'iamParameters',
		),
	),
);
