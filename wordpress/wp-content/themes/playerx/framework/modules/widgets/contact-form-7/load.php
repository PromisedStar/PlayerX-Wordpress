<?php

if ( playerx_edge_contact_form_7_installed() ) {
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_cf7_widget' );
}

if ( ! function_exists( 'playerx_edge_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function playerx_edge_register_cf7_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassContactForm7Widget';
		
		return $widgets;
	}
}