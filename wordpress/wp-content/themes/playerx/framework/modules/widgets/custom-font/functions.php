<?php

if ( ! function_exists( 'playerx_edge_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function playerx_edge_register_custom_font_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_custom_font_widget' );
}