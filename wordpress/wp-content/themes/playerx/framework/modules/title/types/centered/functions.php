<?php

if ( ! function_exists( 'playerx_edge_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function playerx_edge_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'playerx' );
		
		return $type;
	}
	
	add_filter( 'playerx_edge_filter_title_type_global_option', 'playerx_edge_set_title_centered_type_for_options' );
	add_filter( 'playerx_edge_filter_title_type_meta_boxes', 'playerx_edge_set_title_centered_type_for_options' );
}