<?php

if ( ! function_exists( 'playerx_edge_logo_meta_box_map' ) ) {
	function playerx_edge_logo_meta_box_map() {
		
		$logo_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'playerx_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'playerx' ),
				'name'  => 'logo_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'playerx' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'playerx' ),
				'parent'      => $logo_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'playerx' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'playerx' ),
				'parent'      => $logo_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'playerx' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'playerx' ),
				'parent'      => $logo_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'playerx' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'playerx' ),
				'parent'      => $logo_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'playerx' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'playerx' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_logo_meta_box_map', 47 );
}