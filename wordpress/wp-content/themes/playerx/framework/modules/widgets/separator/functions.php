<?php

if ( ! function_exists( 'playerx_edge_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function playerx_edge_register_separator_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_separator_widget' );
}