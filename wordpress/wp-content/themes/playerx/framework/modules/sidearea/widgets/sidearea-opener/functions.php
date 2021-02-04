<?php

if ( ! function_exists( 'playerx_edge_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function playerx_edge_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_sidearea_opener_widget' );
}