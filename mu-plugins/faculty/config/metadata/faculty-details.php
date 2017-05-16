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

namespace KnowTheCode\Faculty\Metdata;

return array(
	'defaults'   => array(
		'_faculty_details' => array(
			'short_bio'    => '',
			'twitter'      => '',
			'facebook'     => '',
			'linkedin'     => '',
			'github'       => '',
			'wordpress'    => '',
			'blog_url'     => '',
			'business_url' => '',
			'codepen'      => '',
			'dribble'      => '',
		),
	),
	'filters'    => array(
		'_faculty_details' => array(
			'short_bio'    => 'esc_textarea',
			'twitter'      => 'esc_url',
			'facebook'     => 'esc_url',
			'linkedin'     => 'esc_url',
			'github'       => 'esc_url',
			'wordpress'    => 'esc_url',
			'blog_url'     => 'esc_url',
			'business_url' => 'esc_url',
			'codepen'      => 'esc_url',
			'dribble'      => 'esc_url',
		),
	),
	'font_icons' => array(
		'short_bio'    => '',
		'twitter'      => 'twitter-square',
		'facebook'     => 'facebook-official',
		'linkedin'     => 'linkedin-square',
		'github'       => 'github-square',
		'dribble'      => 'dribbble',
		'codepen'      => 'codepen',
		'wordpress'    => 'wordpress',
		'blog_url'     => 'pencil-square',
		'business_url' => 'link',
	),
	'social_links' => array(
		'twitter'      => 'Twitter',
		'facebook'     => 'Facebook',
		'linkedin'     => 'LinkedIn',
		'github'       => 'GitHub',
		'dribble'      => 'Dribbble',
		'codepen'      => 'CodePen',
		'wordpress'    => 'WordPress',
		'blog_url'     => 'Blog',
		'business_url' => 'Business Website',
	),
);