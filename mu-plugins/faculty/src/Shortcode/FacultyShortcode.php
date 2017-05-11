<?php
/**
 * Team Member Shortcode
 *
 * This shortcode lets you embed a faculty or list of facultys. You
 * can specify the faculty(s) by:
 *      - faculty's post/record ID
 *      - by the team role taxonomy
 *
 * @package     KnowTheCode\Faculty\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\Faculty\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;
use WP_Query;
use KnowTheCode\Faculty\Model\SpeakerFactory;
use KnowTheCode\Faculty\Support as Support;

class FacultyShortcode extends Shortcode {

	protected $is_single_faculty = false;
	protected $faculty_details = array();
	protected $faculty_id = 0;
	protected $faculty_ids = [];
	protected $query;


	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * NOTE: This is the method to extend for enhanced shortcodes (i.e. which extend this class).
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$this->reset_states();

		if ( ! $this->init_attributes() ) {
			return '';
		}

		/****
		 * Needs a way to do one loop for both the list
		 * and the bio.  The bio has to captured separately
		 * from the list.
		 *
		 * Build the list in one variable.
		 * Build the bios in other.
		 *
		 * Then append the bios to the end of the list HTML.
		 */

		return $this->is_single_faculty
			? $this->render_single()
			: $this->render_multiple();
	}

	protected function render_single() {

	}

	protected function render_multiple() {
		$args = $this->build_args();

		$this->query = new WP_Query( $args );
		if ( ! $this->query->have_posts() ) {
			return '';
		}

		$list_html = $this->render_faculty_list_item();
		wp_reset_postdata();

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}


	protected function render_faculty_list_item() {
		$list_html = $popups_html = '';

		while ( $this->query->have_posts() ) {
			$this->query->the_post();

			$faculty_member = get_post();

			$name_slug = esc_attr( $faculty_member->post_name );

			$profile_picture = get_the_post_thumbnail(
				$faculty_member,
				'medium',
				array(
					'class' => 'faculty-avatar aligncenter',
				)
			);

			$name   = esc_html( get_the_title() );
			$byline = Support\get_metadata( 'short_bio', $faculty_member->ID );
			list( $metadata, $font_icons ) = Support\get_social_links_config( $faculty_member->ID );

			ob_start();
			include( $this->config->view_list_item );
			$list_html .= ob_get_clean();
		}

		return $list_html;
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Reset the shortcode.
	 *
	 * @since 1.1.6
	 *
	 * @return void
	 */
	protected function reset_states() {
		$this->is_single_faculty = false;
		$this->faculty_id        = 0;
		$this->faculty_ids       = array();
		$this->query             = null;
	}

	/**
	 * Builds the arguments for the query.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	protected function build_args() {
		$args = array(
			'post_type'      => 'faculty',
			'posts_per_page' => - 1,
			'nopaging'       => true,
		);

		if ( $this->atts['focus'] || $this->atts['role'] ) {
			$args['tax_query'] = array();
		}

		if ( $this->atts['role'] ) {

			$args['tax_query'][] = array(
				'taxonomy' => 'faculty-role',
				'field'    => 'slug',
				'terms'    => $this->atts['role'],
			);

			$args['orderby'] = 'menu_order';
			$args['order']   = 'ASC';


		}

		if ( $this->atts['focus'] ) {

			$args['tax_query'][] = array(
				'taxonomy' => 'focus',
				'field'    => 'slug',
				'terms'    => $this->atts['focus'],
			);
			$args['orderby']     = 'menu_order';
			$args['order']       = 'ASC';

		}

		if ( $this->atts['id'] ) {
			$args['post__in'] = $this->faculty_ids;
			$args['orderby']  = 'post__in';
		}

		return $args;
	}

	/**
	 * Initialize the attributes.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Returns `true` if successful; else `false` is returned.
	 */
	protected function init_attributes() {
		$this->is_single_faculty = $this->is_single_faculty();

		return $this->is_single_faculty
			? $this->init_faculty()
			: $this->init_multiple_facultys();
	}

	/**
	 * Initialize a single faculty.
	 *
	 * @since 1.0.0
	 *
	 * @param int $faculty_id
	 *
	 * @return bool
	 */
	protected function init_faculty( $faculty_id = 0 ) {
		if ( ! $faculty_id ) {
			$faculty_id = (int) $this->atts['id'];
		}

		if ( (int) $faculty_id < 1 ) {
			return false;
		}

		$post = get_post( $faculty_id );
		if ( ! $post ) {
			return false;
		}

		return $this->setup_the_faculty( $post );
	}

	/**
	 * Initialize multiple facultys.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function init_multiple_facultys() {
		$faculty_ids = explode( ',', $this->atts['id'] );
		if ( ! $faculty_ids ) {
			return false;
		}

		$this->faculty_ids = array_map( 'intval', $faculty_ids );

		return true;
	}

	/**
	 * Set up the variables for this post.
	 *
	 * @since 1.0.0
	 *
	 * @param $post
	 *
	 * @return bool
	 */
	protected function setup_the_faculty( $post ) {
		$faculty_id = (int) $post->ID;
		if ( ! $faculty_id ) {
			return;
		}

		$this->faculty_details[ $faculty_id ] = SpeakerFactory::create( $post, $this->config['faculty_model'] );

		return true;
	}

	protected function is_single_faculty() {
		if ( $this->atts['role'] ) {
			return false;
		}

		if ( $this->atts['focus'] ) {
			return false;
		}

		return strpos( $this->atts['id'], ',' ) === false;
	}

}
