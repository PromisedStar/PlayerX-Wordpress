<?php

if ( ! function_exists( 'playerx_edge_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function playerx_edge_register_author_info_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_author_info_widget' );
}