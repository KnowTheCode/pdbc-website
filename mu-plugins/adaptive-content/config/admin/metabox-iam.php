<?php
/**
 * UX Developer's Metabox Runtime Configuration
 *
 * @package     KnowTheCode\AdaptiveContent\Admin\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\AdaptiveContent\Admin\Metabox;

$prefix     = 'ux_developer';
$post_types = array( 'page' );

$metadata = include( ADAPTIVECONTENT_PLUGIN_DIR . 'config/metadata/iam.php' );

return array(
	'metadata_field' => '_ux_developer',
	'nonce_name'     => $prefix . '_nonce',
	'nonce_action'   => $prefix . '_save',
	'metabox_view'   => ADAPTIVECONTENT_PLUGIN_DIR . 'src/Admin/Metabox/views/iam.php',

	'id'       => $prefix . '_metabox',
	'title'    => 'UX Developer',
	'screen'   => $post_types,
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type' => $post_types,
	),

	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],
);
