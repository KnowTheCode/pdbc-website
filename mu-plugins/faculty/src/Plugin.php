<?php
/**
 * Faculty Controller Plugin
 *
 * @package     KnowTheCode\Faculty
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Faculty;

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
			$this->fulcrum['metabox.faculty_details'];
		}
	}
}
