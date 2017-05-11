<?php
/**
 * Role Taxonomy runtime configuration parameters.
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
	'taxonomy_name' => 'faculty-role',
	'object_type'   => array( 'faculty' ),
	'config'        => array(
		'plural_name'   => 'Faculty Roles',
		'singular_name' => 'Faculty Role',
		'args'          => array(
			'description'       => 'Role for the faculty including the teachers, coaches, members, engineers, and staff',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);
