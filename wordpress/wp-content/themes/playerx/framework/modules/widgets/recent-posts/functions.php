<?php

if ( ! function_exists( 'playerx_edge_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function playerx_edge_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_recent_posts_widget' );
}