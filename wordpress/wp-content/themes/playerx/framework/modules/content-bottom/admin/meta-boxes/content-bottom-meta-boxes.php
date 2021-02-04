<?php

if ( ! function_exists( 'playerx_edge_map_content_bottom_meta' ) ) {
	function playerx_edge_map_content_bottom_meta() {
		
		$content_bottom_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'playerx_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'playerx' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'playerx' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'playerx' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'edgtf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'edgtf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'playerx' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'playerx' ),
				'options'       => playerx_edge_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'playerx' ),
				'options'       => playerx_edge_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'edgtf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'playerx' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'playerx' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_content_bottom_meta', 71 );
}