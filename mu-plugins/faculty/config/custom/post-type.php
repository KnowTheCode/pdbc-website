<?php
/**
 * Faculty Custom Post Type
 *
 * @package     KnowTheCode\Faculty
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Faculty;

return array(
	'autoload'       => true,
	'post_type_name' => 'faculty',
	'config'         => array(
		'plural_name'         => 'Faculty',
		'singular_name'       => 'Faculty',
		'args'                => array(
			'public'       => true,
			'hierarchical' => false,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-admin-users',
//			'rewrite'      => array(
//				'slug'       => 'faculty',
//				'with_front' => false,
//			),
		),
		'labels'              => array(
			'archive' => 'Faculty',
		),
		'additional_supports' => array(
			'author'                          => false,
			'comments'                        => false,
			'excerpt'                         => false,
			'post-formats'                    => false,
			'trackbacks'                      => false,
			'custom-fields'                   => false,
			'revisions'                       => false,
			'page-attributes'                 => true,
			'genesis-after-entry-widget-area' => true,
		),
	),
);
