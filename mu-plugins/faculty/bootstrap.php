<?php
/**
 * Faculty Plugin
 *
 * @package         KnowTheCode\Faculty
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     Faculty Plugin
 * Plugin URI:      https://KnowTheCode.io
 * Description:     Faculty - Manage the teachers, mentors, speakers, staff, and organizers that are participating in the event.  Adds their profile and bio information to streamline integrating them into the event program.
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://KnowTheCode.io
 * Text Domain:     faculty
 * Requires WP:     4.5
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
namespace KnowTheCode\Faculty;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum_Contract;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh, silly, there's nothing to see here." );
}

fulcrum_declare_plugin_constants( 'FACULTY', __FILE__ );

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

	$fulcrum['faculty'] = $instance = new Plugin(
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
	$filenames = array(
		'src/Plugin.php',
		'src/Support/helpers.php',
		'src/Shortcode/FacultyShortcode.php',
		'src/Model/TeamMember.php',
		'src/Model/TeamMemberFactory.php',
	);

	foreach( $filenames as $filename ) {
		require_once( $filename );
	}
}
