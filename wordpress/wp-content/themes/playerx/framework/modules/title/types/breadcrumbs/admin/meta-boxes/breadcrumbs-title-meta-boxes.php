<?php

if ( ! function_exists( 'playerx_edge_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function playerx_edge_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'playerx' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'playerx' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'playerx_edge_action_additional_title_area_meta_boxes', 'playerx_edge_breadcrumbs_title_type_options_meta_boxes' );
}