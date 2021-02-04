<?php

if ( ! function_exists( 'playerx_edge_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function playerx_edge_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'playerx_edge_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'playerx_edge_header_standard_meta_map' ) ) {
	function playerx_edge_header_standard_meta_map( $parent ) {
		$hide_dep_options = playerx_edge_get_hide_dep_for_header_standard_meta_boxes();
		
		playerx_edge_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'edgtf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'playerx' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'playerx' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'playerx' ),
					'left'   => esc_html__( 'Left', 'playerx' ),
					'right'  => esc_html__( 'Right', 'playerx' ),
					'center' => esc_html__( 'Center', 'playerx' )
				),
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_additional_header_area_meta_boxes_map', 'playerx_edge_header_standard_meta_map' );
}