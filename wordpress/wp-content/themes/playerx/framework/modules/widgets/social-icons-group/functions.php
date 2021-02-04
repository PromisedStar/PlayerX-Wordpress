<?php

if ( ! function_exists( 'playerx_edge_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function playerx_edge_register_social_icons_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_social_icons_widget' );
}