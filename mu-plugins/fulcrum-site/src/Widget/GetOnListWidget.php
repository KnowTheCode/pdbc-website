<?php

/**
 * Member Nav - displays menu links based upon if s/he is logged in or not.
 *
 * @package     KnowTheCode\FulcrumSite\Widget
 * @since       1.2.1
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\FulcrumSite\Widget;

use Fulcrum\Custom\Widget\Widget;

class GetOnListWidget extends Widget {

	/**
	 * Echo the widget content.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Display arguments including
	 *                          before_title, after_title, before_widget, & after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 *
	 * @return null
	 */
	public function widget( $args, $instance ) {
		$this->init_instance( $instance );

		echo $this->modify_before_widget_html( $args['before_widget'], $instance );

		echo $args['before_title'] . $args['after_title'];

		$form_class = $instance['show_cta']
			? 'get-on-list--right-panel'
			: 'get-on-list--container';

		if ( is_readable( $this->config->view ) ) {
			include( $this->config->view );
		}

		echo $args['after_widget'];
	}

	/**
	 * Echo the widget content.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Display arguments including
	 *                          before_title, after_title, before_widget, & after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 *
	 * @return null
	 */
	protected function render_widget( array &$args, array &$instance ) {}

	/**
	 * Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If false is returned, the instance won't be saved / updated.
	 *
	 * @since 1.0.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Settings to save or bool false to cancel saving
	 */
	public function update( $new_instance, $old_instance ) {
		$new_instance['show_cta'] = isset( $new_instance[show_cta] ) ? 1 : 0;

		if ( current_user_can( 'unfiltered_html' ) ) {
			$new_instance['message'] = $new_instance['message'];
			$new_instance['thank_you_message'] = $new_instance['thank_you_message'];
		} else {
			$new_instance['message'] = wp_kses_post( $new_instance['message'] );
			$new_instance['thank_you_message'] = wp_kses_post( $new_instance['thank_you_message'] );
		}

		foreach( array( 'title', 'class', 'button_text' ) as $key ) {
			$new_instance[ $key ] = strip_tags( $new_instance[ $key ] );
		}

		return $new_instance;
	}

}
