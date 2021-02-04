<?php

if ( ! function_exists( 'playerx_edge_map_post_link_meta' ) ) {
	function playerx_edge_map_post_link_meta() {
		$link_post_format_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'playerx' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'playerx' ),
				'description' => esc_html__( 'Enter link', 'playerx' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_post_link_meta', 24 );
}