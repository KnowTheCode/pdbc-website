<?php
/**
 * Speaker Shortcode Runtime Configuration Parameters
 *
 * @package     KnowTheCode\Faculty
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Faculty\Shortcode;

$metadata = include( FACULTY_PLUGIN_DIR . 'config/metadata/faculty-details.php' );

return array(
	'autoload'  => true,
	'classname' => 'KnowTheCode\Faculty\Shortcode\FacultyShortcode',
	'config'    => array(
		'shortcode'         => 'faculty',
		'view'              => FACULTY_PLUGIN_DIR . 'src/Shortcode/views/faculty-list.php',
		'view_list_item'    => FACULTY_PLUGIN_DIR . 'src/Shortcode/views/faculty-list-item.php',
		'view_popup'        => FACULTY_PLUGIN_DIR . 'src/Shortcode/views/faculty-profile.php',
		'view_social_links' => FACULTY_PLUGIN_DIR . 'src/views/faculty-social-links.php',
		'defaults'          => array(
			'class'     => '',
			'id'        => 0,
			'highlight' => 1,
			'role'      => '',
			'focus'     => '',
		),
		'metadata'          => $metadata,
	),
);
