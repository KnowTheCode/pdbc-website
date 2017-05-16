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

namespace KnowTheCode\FulcrumSite\Metdata;

return array(
	'defaults' => array(
		'_fulcrum_header_content' => '',
		'_fulcrum_subtitle'       => '',
	),
	'filters'  => array(
		'_fulcrum_header_content' => false,
		'_fulcrum_subtitle'       => 'strip_tags',
	),
);