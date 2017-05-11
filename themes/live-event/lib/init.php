<?php
/**
 * Theme initialization
 *
 * @package     KnowTheCode\LiveEvent
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent;

/**
 * Initialize the theme's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {

	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

	$version_number = get_asset_version_number( CHILD_THEME_DIR . '/style.css' );

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
//	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_THEME_VERSION', $version_number );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
}

init_constants();
