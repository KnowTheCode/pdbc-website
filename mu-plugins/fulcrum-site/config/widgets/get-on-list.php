<?php

/**
 * Member Nav Widget - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\FulcrumSite\Widget
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\FulcrumSite\Widget;

return array(

	/*********************
	 * Widget Construct Args
	 ********************/
	'id_base'         => 'get-on-list-widget',
	'name'            => __( 'Get on List', 'fulcrum_site' ),
	'widget_options'  => array(
		'classname'   => 'get-on-list-widget',
		'description' => __( 'Displays the Get on the List Call-to-Action.', 'fulcrum_site' ),
	),
	'control_options' => array(
		'width'  => 400,
		'height' => 350,
	),
	/*********************
	 * Defaults
	 ********************/

	'defaults' => array(
		'title'             => '',
		'class'             => '',
		'message'           => '',
		'button_text'       => 'I want on the List!',
		'show_cta'          => 1,
		'thank_you_message' => '<p><strong>WooHoo! You are now on the list!</strong></p>',
	),
	/*********************
	 * Views
	 ********************/

	'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Widget/views/get-on-list-widget.php',
	'form_view' => FULCRUM_SITE_PLUGIN_DIR . 'src/Widget/views/get-on-list-widget-form.php',
);