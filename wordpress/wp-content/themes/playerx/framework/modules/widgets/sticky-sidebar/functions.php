<?php

if(!function_exists('playerx_edge_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function playerx_edge_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'PlayerxEdgeClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter('playerx_edge_filter_register_widgets', 'playerx_edge_register_sticky_sidebar_widget');
}