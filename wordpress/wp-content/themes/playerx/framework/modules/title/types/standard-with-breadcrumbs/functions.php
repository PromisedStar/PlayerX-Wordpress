<?php

if ( ! function_exists( 'playerx_edge_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function playerx_edge_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'playerx' );
		
		return $type;
	}
	
	add_filter( 'playerx_edge_filter_title_type_global_option', 'playerx_edge_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'playerx_edge_filter_title_type_meta_boxes', 'playerx_edge_set_title_standard_with_breadcrumbs_type_for_options' );
}