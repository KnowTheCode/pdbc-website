<?php
/**
 * Team Member's Metabox Runtime Configuration
 *
 * @package     KnowTheCode\Faculty\Admin\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Faculty\Admin\Metabox;

$prefix     = 'faculty_details';
$post_types = array( 'faculty' );

$metadata = include( FACULTY_PLUGIN_DIR . 'config/metadata/faculty-details.php' );

return array(
	'metadata_field' => '_faculty_details',
	'nonce_name'     => $prefix . '_nonce',
	'nonce_action'   => $prefix . '_save',
	'metabox_view'   => FACULTY_PLUGIN_DIR . 'src/Admin/Metabox/views/faculty-details.php',

	'id'       => $prefix . '_metabox',
	'title'    => 'Faculty Details',
	'screen'   => $post_types,
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type' => $post_types,
//		'parent_post' => true,
//		'child_post' => true,
	),

	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],
);
