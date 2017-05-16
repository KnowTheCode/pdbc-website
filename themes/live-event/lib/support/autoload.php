<?php
/**
 * Autoload files to launch the theme.
 *
 * @package     KnowTheCode\LiveEvent\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Support;

use Fulcrum\Config\Config;
use KnowTheCode\LiveEvent\Admin\Metabox\Metabox;

/**
 * Initialize the filenames to be loaded.
 *
 * @since 1.0.0
 *
 * @param bool $is_admin
 *
 * @return void
 */
function init_files( $is_admin = false ) {
	$filenames = array(
		'setup.php',
		'widgets/widget-areas.php',
		'support/formatting.php',
		'support/load-assets.php',
		'structure/archive.php',
//		'structure/comments.php',
		'structure/footer.php',
		'structure/header.php',
		'structure/nav.php',
		'structure/post.php',
//		'structure/search.php',
	);

	load_specified_files( $filenames );
}

/**
 * Load each of the specified files.
 *
 * @since 1.3.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';

	foreach ( $filenames as $filename ) {
		require_once( $folder_root . $filename );
	}
}

/**
 * Autoload the files and dependencies.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_autoload() {
	$is_admin = is_admin();

	init_files( $is_admin );
}

do_autoload();
