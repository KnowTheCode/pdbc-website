<?php
/**
 * Focus Taxonomy runtime configuration parameters.
 *
 * @package     KnowTheCode\Faculty
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Faculty;

return array(
	'autoload'      => true,
	'taxonomy_name' => 'focus',
	'object_type'   => array( 'faculty' ),
	'config'        => array(
		'plural_name'   => 'Focus',
		'singular_name' => 'Focus',
		'args'          => array(
			'description'       => 'Focus or subject area',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);
