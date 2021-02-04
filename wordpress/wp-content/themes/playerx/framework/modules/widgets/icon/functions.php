<?php

if ( ! function_exists( 'playerx_edge_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function playerx_edge_register_icon_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_icon_widget' );
}