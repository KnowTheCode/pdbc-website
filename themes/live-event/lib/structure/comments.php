<?php
/**
 * Comments structures
 *
 * @package     KnowTheCode\LiveEvent\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Structure;

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\customize_comments_form_defaults' );
/**
 * Modify the comment form default arguments.
 *
 * @since 1.0.0
 *
 * @param array $parameters
 *
 * @return mixed
 */
function customize_comments_form_defaults( array $parameters ) {
	$parameters['title_reply'] = 'Share your thoughts';

	return $parameters;
}