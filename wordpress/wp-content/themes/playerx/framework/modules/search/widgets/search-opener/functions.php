<?php

if ( ! function_exists( 'playerx_edge_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function playerx_edge_register_search_opener_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_search_opener_widget' );
}