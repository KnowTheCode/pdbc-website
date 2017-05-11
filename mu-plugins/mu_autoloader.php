<?php
/**
 * Bootcamp's MU Plugins Loader
 *
 * @package         KnowTheCode
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     KTC Must-User Plugins Loader
 * Plugin URI:      https://KnowTheCode.io
 * Description:     Loads all Must Use Plugins including Fulcrum, Fulcrum Site, Faculty, etc.
 *
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      http://KnowTheCode.io
 * Text Domain:     ktc
 * Requires WP:     4.5
 * Requires PHP:    5.4
 */

namespace KnowTheCode;

include_once( 'fulcrum/bootstrap.php' );

$fulcrum = \Fulcrum\launch();

//include( 'bbpress/bootstrap.php' );

$fulcrum_plugins = array(
	'\KnowTheCode\FulcrumSite\launch' => 'fulcrum-site/bootstrap.php',
	'\KnowTheCode\Faculty\launch'     => 'faculty/bootstrap.php',
);

foreach ( $fulcrum_plugins as $function_name => $boostrap_filename ) {
	require_once( $boostrap_filename );
	$function_name( $fulcrum );
}

//include_once( 'memberpress/bootstrap.php' );

do_action( 'fulcrum_all_must_use_plugins_loaded', $fulcrum );
