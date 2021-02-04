<?php

if ( ! function_exists( 'playerx_edge_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function playerx_edge_register_button_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_button_widget' );
}