<?php

if ( ! function_exists( 'playerx_edge_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function playerx_edge_register_blog_list_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_blog_list_widget' );
}