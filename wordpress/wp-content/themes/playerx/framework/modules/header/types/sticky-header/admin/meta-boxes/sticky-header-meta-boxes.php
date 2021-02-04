<?php

if ( ! function_exists( 'playerx_edge_sticky_header_meta_boxes_options_map' ) ) {
	function playerx_edge_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'edgtf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'playerx' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'playerx' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$playerx_custom_sidebars = playerx_edge_get_custom_sidebars();
		if ( count( $playerx_custom_sidebars ) > 0 ) {
			playerx_edge_create_meta_box_field(
				array(
					'name'        => 'edgtf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'playerx' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'playerx' ),
					'parent'      => $header_meta_box,
					'options'     => $playerx_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'edgtf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'playerx_edge_action_additional_header_area_meta_boxes_map', 'playerx_edge_sticky_header_meta_boxes_options_map', 8, 1 );
}