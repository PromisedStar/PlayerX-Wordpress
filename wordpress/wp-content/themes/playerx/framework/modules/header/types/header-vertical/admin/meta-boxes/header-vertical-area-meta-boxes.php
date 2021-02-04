<?php

if ( ! function_exists( 'playerx_edge_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function playerx_edge_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'playerx_edge_filter_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'playerx_edge_header_vertical_area_meta_options_map' ) ) {
	function playerx_edge_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = playerx_edge_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		playerx_edge_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'playerx' )
			)
		);
		
		$playerx_custom_sidebars = playerx_edge_get_custom_sidebars();
		if ( count( $playerx_custom_sidebars ) > 0 ) {
			playerx_edge_create_meta_box_field(
				array(
					'name'        => 'edgtf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'playerx' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'playerx' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $playerx_custom_sidebars
				)
			);
		}
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'playerx' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'playerx' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'playerx' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'playerx' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'playerx' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'playerx' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'playerx' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'playerx' ),
				'description'   => esc_html__( 'Set border on vertical area', 'playerx' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = playerx_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'edgtf_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'playerx' ),
				'description' => esc_html__( 'Choose color of border', 'playerx' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'playerx' ),
				'description'   => esc_html__( 'Set content in vertical center', 'playerx' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'playerx_edge_action_additional_header_area_meta_boxes_map', 'playerx_edge_header_vertical_area_meta_options_map', 10, 1 );
}