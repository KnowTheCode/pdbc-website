<?php
/**
 * Adaptive Content Controller Plugin
 *
 * @package     KnowTheCode\AdaptiveContent
 * @since       1.0.2
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\AdaptiveContent;

use WP_REST_Response;
use Fulcrum\Addon\Addon;
use KnowTheCode\AdaptiveContent\Support\CookieHandler;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.2';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.5';

	protected $current_iam_selection;

	protected $post_id = 0;

	/**
	 * Get the current I Am selection.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_current_selection() {
		return $this->current_iam_selection;
	}

	/**
	 * Initialize the events.
	 *
	 * @since 1.1.2
	 *
	 * @return void
	 */
	protected function init_events() {
		parent::init_events();

		if ( is_admin() ) {
			$this->fulcrum['metabox.adaptive_content'];

			return;
		}

		$this->init_the_current_selection();

//		add_action( 'rest_api_init', array( $this, 'init_rest_endpoint' ) );
		add_filter( 'body_class', array( $this, 'add_iam_to_body_class' ) );
		add_action( 'genesis_before', array( $this, 'setup_the_hooks' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Initialize the current selection.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_the_current_selection() {
		$this->current_iam_selection = CookieHandler::get_the_cookie( $this->config->config['cookie_name'] );

		if ( $this->current_iam_selection ) {
			$this->current_iam_selection = trim( $this->current_iam_selection );

		} else {
			$this->current_iam_selection = $this->config->config['default'];
		}

		$this->fulcrum['current_iam_selection'] = $this->current_iam_selection;
	}

	/**
	 * Add the selected UX IAM selection to the body classes,
	 * if one has been selected.
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function add_iam_to_body_class( array $classes ) {
		if ( $this->current_iam_selection ) {
			$classes[] = 'iam--' . $this->current_iam_selection;
		}

		return $classes;
	}

	function setup_the_hooks() {
		if ( ! is_page() && ! is_front_page() ) {
			return;
		}

		$this->post_id = get_the_ID();

		if ( $this->current_iam_selection == 'developer' ) {
			remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
			add_action( 'genesis_entry_content', array( $this, 'render_ux_iam_contents' ) );
		}
//		add_action( 'genesis_header', array( $this, 'render_nav_button' ), 11 );
		add_action( 'rendering_before_primary_nav_hamburger', array( $this, 'render_nav_button' ), 11 );
		add_filter( 'genesis_attr_entry', array( $this, 'add_post_id_data_attr' ) );
	}

	function render_nav_button() {
		include_once( $this->config->config['button_view'] );
	}

	function render_ux_iam_contents() {
		if ( $this->current_iam_selection == 'developer' ) {
			$this->render_developer_content();
		} else {
			the_content();
		}

	}

	function enqueue_assets() {
		wp_enqueue_script(
			'adaptive_content_js',
			ADAPTIVECONTENT_PLUGIN_URL . 'assets/dist/js/jquery.plugin.min.js',
			array( 'jquery' ),
			self::VERSION,
			true
		);

		$params = array(
			'iam_nonce'       => wp_create_nonce( 'wp_rest' ),
			'iam_url'         => site_url( $this->config->config['rest_url'] ),
			'iam_cookie_name' => '_pdbc_ux_iam',
			'default_iam'     => 'entrepreneur',
			'post_id'         => get_the_ID(),
		);

		wp_localize_script(
			'adaptive_content_js',
			'iamParameters',
			$params
		);
	}

	function add_post_id_data_attr( array $attributes ) {

		$attributes['data-post-id'] = $this->post_id;

		return $attributes;
	}

	/*********************
	 * REST API
	 ********************/

	function init_rest_endpoint() {
		// Register the route
		register_rest_route(
			$this->config->config['rest_namespace'],
			'/iam/',
			array(
				'methods'  => 'POST',
				'callback' => array( $this, 'rest_handler' ),
				'args'     => array(
					'iam'     => array( 'required' => true ),
					'post_id' => array( 'required' => true ),
				),
			)
		);
	}

	public function rest_handler( $request ) {
		$parameters = $request->get_params();

		$iam_selection = strip_tags( $parameters['iam'] );
		if ( ! in_array( $iam_selection, array( 'developer', 'entrepreneur' ) ) ) {
			return new WP_REST_Response(
				array(
					'message' => 'Invalid IAM',
					'iam'     => $iam_selection,
				), 200 );
		}

		$this->post_id = (int) $parameters['post_id'];
		if ( $this->post_id < 1 ) {
			return new WP_REST_Response( array( 'message' => 'Invalid Post ID' ), 200 );
		}

		$post = get_post( $this->post_id );
		if ( ! $post ) {
			return new WP_REST_Response( array( 'message' => 'Post not found' ), 200 );
		}

		$content = '';
		if ( $iam_selection == 'developer' ) {
			$content = $this->get_developer_content();
		}

		if ( ! $content ) {
			$content = do_shortcode( $post->post_content );
		}

		$data_packet = array(
			'message'        => 'New content',
			'content'        => wpautop( $content ),
			'post_id'        => $this->post_id,
			'iam'            => $parameters['iam'],
			'entryClassname' => '.entry.post-' . $this->post_id,
		);

		return new WP_REST_Response( $data_packet, 200 );
	}

	/*********************
	 * Helpers
	 ********************/

	protected function get_developer_content() {
		$developer_content = get_post_meta( $this->post_id, '_ux_developer_content', true );
		if ( ! $developer_content ) {
			return '';
		}

		return do_shortcode( $developer_content );
	}

	protected function render_developer_content( $echo = true ) {
		$developer_content = $this->get_developer_content();
		if ( ! $developer_content ) {
			$developer_content = do_shortcode( get_the_content() );
		}

		$developer_content = wpautop( $developer_content );

		if ( $echo ) {
			echo $developer_content;
		}

		return $developer_content;
	}
}
