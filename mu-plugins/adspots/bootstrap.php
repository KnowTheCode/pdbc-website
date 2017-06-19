<?php
/**
 * Promo Adspot Plugin
 *
 * @package         KnowTheCode\Promo
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     Promo Adspot Plugin
 * Plugin URI:      https://knowthecode.io
 * Description:     Embedded adspot for our promotions and marketing campaigns.
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://KnowTheCode.io
 * Text Domain:     promo
 * Requires WP:     3.5
 * Requires PHP:    5.4
 */

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace KnowTheCode\Promo;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum;
use Fulcrum\Fulcrum_Contract;

fulcrum_prevent_direct_file_access();

fulcrum_declare_plugin_constants( 'PROMO', __FILE__ );

//add_action( 'fulcrum_is_loaded', __NAMESPACE__ . '\launch' );
/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @param Fulcrum_Contract $fulcrum Instance of Fulcrum
 *
 * @return void
 */
function launch( Fulcrum_Contract $fulcrum ) {
	load_dependencies();
	
	$path = __DIR__ . '/config/plugin.php';

	$fulcrum['promo'] = $instance = new Controller(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);

	return $instance;
}

/**
 * To speed everything up, we are loading files directly here.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_dependencies() {
	require( __DIR__ . '/src/adspot/class-ajax-handler.php' );
	require( __DIR__ . '/src/adspot/class-adspot-shortcode.php' );
	include( __DIR__ . '/src/structure/footer.php' );

	require( __DIR__ . '/src/class-controller.php' );
}

/**
 * Registering the plugin, we need to launch and then flush the
 * rewrite rules to ensure the custom post type/taxonomies
 * are registered up.
 *
 * @since 1.0.0
 *
 * @return void
 */
register_activation_hook( __FILE__, function() {

	if ( get_option( 'promo_adspot_next', false ) === false ) {
		update_option( 'promo_adspot_next', 0, true );
	}

	$instance = launch( Fulcrum::getFulcrum() );
	$instance->activate();
});

/**
 * Deactivating - need to flush the rewrite rules.
 *
 * @since 1.0.1
 *
 * @return void
 */
register_deactivation_hook( __FILE__, function() {
	flush_rewrite_rules();
});