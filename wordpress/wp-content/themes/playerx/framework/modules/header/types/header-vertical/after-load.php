<?php

if ( ! function_exists( 'playerx_edge_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function playerx_edge_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( playerx_edge_check_is_header_type_enabled( 'header-vertical', playerx_edge_get_page_id() ) ) {
		add_filter( 'playerx_edge_filter_allow_sticky_header_behavior', 'playerx_edge_disable_behaviors_for_header_vertical' );
		add_filter( 'playerx_edge_filter_allow_content_boxed_layout', 'playerx_edge_disable_behaviors_for_header_vertical' );
	}
}