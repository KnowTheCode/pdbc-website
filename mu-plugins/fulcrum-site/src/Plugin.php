<?php
/**
 * Plugin Controller
 *
 * @package     KnowTheCode\FulcrumSite
 * @since       1.2.2
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\FulcrumSite;

use Fulcrum\Addon\Addon;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.5';

	/*************************
	 * Instantiate & Init
	 ************************/

	/**
	 * Addons can overload this method for additional functionality
	 *
	 * @since 1.2.1
	 *
	 * @return null
	 */
	protected function init_addon() {
		do_action( 'fulcrum_site_loaded' );

		if ( is_admin() ) {
			remove_filter( 'pre_user_description', 'wp_filter_kses' );
			add_filter( 'pre_user_description', 'wp_kses_post' );
		}

		add_action( 'edit_form_after_title', array( $this, 'enable_page_for_posts_editor' ) );

		add_filter( 'genesis_load_deprecated', '__return_false' );

		add_action( 'init', array( $this, 'init_local_plugin' ) );
	}

	/**
	 * Initialize the local plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_local_plugin() {
		add_post_type_support( 'page', 'excerpt' );
	}

	/**
	 * Enable the editor again on the page_for_posts.
	 *
	 * @since 1.0.0
	 *
	 * @param $post
	 *
	 * @return void
	 */
	public function enable_page_for_posts_editor( $post ) {
		if ( $post->ID == get_option( 'page_for_posts' ) ) {
			add_post_type_support( 'page', 'editor' );
		}
	}

	/**
	 * Checks if the user object is setup and ready.
	 *
	 * @since 1.0.0
	 *
	 * @param null $user
	 *
	 * @return bool
	 */
	protected function is_user( $user = null ) {
		if ( ! is_object( $user ) ) {
			global $user;
		}

		return isset( $user->roles ) && is_array( $user->roles );
	}
}
