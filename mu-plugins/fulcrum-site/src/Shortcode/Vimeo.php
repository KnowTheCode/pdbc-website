<?php

/**
 * Vimeo Shortcode
 *
 * @package     KnowTheCode\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\FulcrumSite\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class Vimeo extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * NOTE: This is the method to extend for enhanced shortcodes (i.e. which extend this class).
	 *
	 * @since 1.0.1
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$post_id      = get_the_ID();
		$video_id     = esc_attr( $this->atts['id'] );
		$dimensions   = $this->build_dimensions( $this->atts['width'], $this->atts['height'] );
		$url          = $this->build_url( $this->atts );
		$video_footer = $this->get_video_footer( $video_id, $post_id );

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Get the video footer.
	 *
	 * @since 1.0.0
	 *
	 * @param int $video_id
	 * @param int $post_id
	 *
	 * @return string
	 */
	protected function get_video_footer( $video_id, $post_id ) {
		if ( ! $this->atts['show_footer'] ) {
			return '';
		}

		return apply_filters( 'ktc_embed_video_footer', '', $video_id, $post_id );
	}

	/**
	 * Build the dimensions
	 *
	 * @since 1.0.0
	 *
	 * @param int $width
	 * @param int $height
	 *
	 * @return array
	 */
	protected function build_dimensions( $width, $height ) {
		$width  = (int) $width;
		$height = (int) $height;

		if ( $width < 1 ) {
			global $content_width;

			$width = absint( $content_width );
		}

		if ( $height < 1 ) {
			$height = round( ( $width / 640 ) * 360 );
		}

		return compact( 'width', 'height' );
	}

	/**
	 * Build the URL
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	protected function build_url( array $atts ) {

		$url = set_url_scheme( 'https://player.vimeo.com/video/' . $atts['id'] );

		if ( ! empty( $atts['autoplay'] ) ) {
			$url = add_query_arg( 'autoplay', 1, $url );
		}

		if ( ! empty( $atts['loop'] ) ) {
			$url = add_query_arg( 'loop', 1, $url );
		}

		return $url;
	}
}
