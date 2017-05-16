<?php
/**
 * Cookie Handler
 *
 * @package     KnowTheCode\AdaptiveContent\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\AdaptiveContent\Support;

class CookieHandler {

	public static function set_the_cookie( $cookie_name, $value, $expiration = '' ) {
		if ( ! $expiration ) {
			$expiration = YEAR_IN_SECONDS;
		}

		return setcookie( $cookie_name, $value, $expiration );
	}

	/**
	 * Checks if the cookie exists.
	 *
	 * @since 1.0.0
	 *
	 * @param string $cookie_name
	 *
	 * @return bool
	 */
	public static function has_cookie( $cookie_name ) {
		return array_key_exists( $cookie_name, $_COOKIE );
	}

	/**
	 * Get the cookie.
	 *
	 * @since 1.0.0
	 *
	 * @param string $cookie_name
	 *
	 * @return mixed
	 */
	public static function get_the_cookie( $cookie_name ) {
		if ( static::has_cookie( $cookie_name ) ) {
			return $_COOKIE[ $cookie_name ];
		}
	}
}