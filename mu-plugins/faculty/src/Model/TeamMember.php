<?php
/**
 * Team Member Model
 *
 * @package     KnowTheCode\Faculty\Model
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Faculty\Model;

class TeamMemberModel {

	protected $config = array();
	protected $post_id;
	protected $permalink;
	protected $name_slug;
	protected $name;
	protected $byline;

	public function __construct( $post, array $config ) {
		if ( ! $post ) {
			return null;
		}

		$this->config = $config;

		$this->init( $post );
	}

	protected function init( $post ) {
		$this->post_id   = (int) $post->ID;
		$this->name      = esc_html( $post->post_title );
		$this->permalink = esc_url( get_permalink( $this->post_id ) );
	}
}