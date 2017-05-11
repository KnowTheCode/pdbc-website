<?php
/**
 * Factory to create a new Speaker Model
 *
 * @package     KnowTheCode\Faculty\Model
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Faculty\Model;

class SpeakerFactory {

	public static function create( $post, array $config ) {
		if ( ! $post ) {
			return null;
		}

		return new SpeakerModel( $post, $config );
	}
}