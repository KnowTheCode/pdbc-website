<?php
/**
 * Formatting
 *
 * @package     KnowTheCode\LiveEvent\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Support;

/**
 * Description.
 *
 * @since 1.0.0
 *
 * @param $property
 *
 * @return void
 */
function get_focal_topic( $property ) {
	$tags = get_the_tags();
	if ( ! $tags ) {
		return;
	}

	$focal_topic = $tags[0];

	return $focal_topic->{$property};
}

/**
 * Strips off the read more link's opening dot pattern.
 *
 * @since 1.0.0
 *
 * @param string $html
 * @param string $dots Dots pattern to strip off
 *
 * @return string
 */
function strip_off_read_more_opening_dots( $html, $dots = '&#x02026; ' ) {
	return substr( $html, strlen( $dots ) );
}


/**
 * Replace the read more text from the Genesis default text of '[Read more...]' to
 * the new specified replacement text.
 *
 * @since 1.0.0
 *
 * @param string $html Read more link HTML
 * @param string $replacement_text Replacement text
 *
 * @return string
 */
function change_read_more_text( $html, $replacement_text ) {
	$text_to_replace = __( '[Read more...]', CHILD_TEXT_DOMAIN );

	return str_replace( $text_to_replace, $replacement_text, $html );
}

/**
 * Get substring from pattern.
 *
 * @since 1.0.0
 *
 * @param string $subject_string
 * @param string $search_pattern
 * @param int $leading_num_characters
 *
 * @return bool|string
 */
function get_substr_from_pattern( $subject_string, $search_pattern, $leading_num_characters = 4 ) {
	$pattern_position = mb_strpos( $subject_string, $search_pattern, 0, 'UTF-8' );
	if ( $pattern_position === false ) {
		return false;
	}
	$pattern_position -= $leading_num_characters;

	$length = mb_strlen( $search_pattern, 'UTF-8' ) + 4;

	return mb_substr( $subject_string, $pattern_position, $length );
}

/**
 * Get the focal topic class attribute.
 *
 * @since 1.0.0
 *
 * @return string
 */
function get_focal_topic_class_attributes() {
	$focal_topic = get_focal_topic( 'slug' );

	return $focal_topic
		? ' focal-topic focal-topic--' . esc_attr( $focal_topic )
		: '';
}