<?php

if ( ! function_exists( 'playerx_edge_get_hide_dep_for_header_standard_options' ) ) {
	function playerx_edge_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'playerx_edge_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'playerx_edge_header_standard_map' ) ) {
	function playerx_edge_header_standard_map( $parent ) {
		$hide_dep_options = playerx_edge_get_hide_dep_for_header_standard_options();
		
		playerx_edge_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'playerx' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'playerx' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'playerx' ),
					'left'   => esc_html__( 'Left', 'playerx' ),
					'center' => esc_html__( 'Center', 'playerx' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_additional_header_menu_area_options_map', 'playerx_edge_header_standard_map' );
}