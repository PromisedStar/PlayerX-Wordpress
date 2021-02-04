<?php

if ( ! function_exists( 'playerx_edge_map_sidebar_meta' ) ) {
	function playerx_edge_map_sidebar_meta() {
		$edgtf_sidebar_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'playerx_edge_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'playerx' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'playerx' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'playerx' ),
				'parent'      => $edgtf_sidebar_meta_box,
                'options'       => playerx_edge_get_custom_sidebars_options( true )
			)
		);
		
		$edgtf_custom_sidebars = playerx_edge_get_custom_sidebars();
		if ( count( $edgtf_custom_sidebars ) > 0 ) {
			playerx_edge_create_meta_box_field(
				array(
					'name'        => 'edgtf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'playerx' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'playerx' ),
					'parent'      => $edgtf_sidebar_meta_box,
					'options'     => $edgtf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_sidebar_meta', 31 );
}