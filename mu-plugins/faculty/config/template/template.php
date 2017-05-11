<?php

/**
 * Template runtime configuration parameters.
 *
 * @package     KnowTheCode\Faculty\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Faculty\Template;

return array(
	'autoload' => true,
	'config'   => array(
		'template_folder_path' => FACULTY_PLUGIN_DIR . 'src/Template/',
		'post_type'            => 'faculty',
		'use_single'           => true,
		'use_archive'          => false,
		'use_category'         => false,
		'tax'                  => false,
		'use_tax'              => true,
		'use_tag'              => false,
		'use_page_templates'   => false,
		'templates'            => array(),
	),
);
