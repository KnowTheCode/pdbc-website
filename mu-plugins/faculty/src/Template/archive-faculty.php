<?php
/**
 * Faculty Archive Template
 *
 * @package     KnowTheCode\Faculty\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Faculty\Template;

//use WP_Post;
//use KnowTheCode\LiveEvent\Structure as structure;

add_action( 'after_setup_theme', __NAMESPACE__ . '\setup_the_archive' );
function setup_the_archive() {
	add_action( 'genesis_before', 'KnowTheCode\LiveEvent\Structure\relocate_entry_header' );
}

add_action( 'genesis_before', __NAMESPACE__ . '\relocate_entry_header' );
/**
 * Relocate the entry header to before the content-sidebar containers.
 *
 * @since 1.0.0
 *
 * @return void
 */
function relocate_entry_header() {
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	remove_action( 'genesis_after_header', 'KnowTheCode\LiveEvent\Structure\render_page_header', 9999 );
	add_action( 'genesis_after_header', __NAMESPACE__ . '\render_page_header', 9999 );
	add_action( 'genesis_loop', __NAMESPACE__ . '\render_faculty' );
}

function render_page_header() {
	include ( __DIR__ . '/views/archive-page-header.php' );
}



function render_faculty() {
	include ( __DIR__ . '/views/archive.php' );
}



genesis();
