<?php
/**
 * Know the Code Genesis-powered child theme
 *
 * @package     KnowTheCode\LiveEvent\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Support;

require_once( __DIR__ . '/lib/support/dependencies-helpers.php' );
require_once( __DIR__ . '/lib/init.php' );
require_once( __DIR__ . '/lib/support/autoload.php' );

add_filter( 'genesis_load_deprecated', '__return_true', 99999999999999 );

/***********************************************
 * TEMPORARY FIX for BUG
 *
 * Genesis v. 2.5 has a bug -
 * 1. GENESIS_CLASSES_DIR is needed
 * 2. But when you filter the `genesis_load_deprecated` is OFF,
 *    you get a fatal error.
 *
 * Issue report submitted to the Genesis repository.
 ************************************************/
//add_action( 'genesis_init', __NAMESPACE__ . '\bug_fix_for_genesis' );
function bug_fix_for_genesis() {


	define( 'GENESIS_CLASSES_DIR', get_template_directory() . '/lib/classes' );
}
