<?php
/**
 * Page Header's Metabox Runtime Configuration
 *
 * @package     KnowTheCode\FulcrumSite\Admin\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\FulcrumSite\Admin\Metabox;

$prefix     = 'ktc_page_header';
$post_types = array( 'post', 'page' );

$metadata = include( FULCRUM_SITE_PLUGIN_DIR . 'config/metadata/page-header.php' );

return array(
	'metadata_field' => 'ktc_page_header',
	'nonce_name'     => $prefix . '_nonce',
	'nonce_action'   => $prefix . '_save',
	'metabox_view'   => FULCRUM_SITE_PLUGIN_DIR . 'src/Admin/Metabox/views/page-header.php',

	'id'       => $prefix . '_metabox',
	'title'    => 'Page Header',
	'screen'   => $post_types,
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type' => $post_types,
	),

	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],
);
