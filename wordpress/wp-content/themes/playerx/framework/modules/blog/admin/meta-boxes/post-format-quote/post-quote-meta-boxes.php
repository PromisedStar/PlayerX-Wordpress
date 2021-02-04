<?php

if ( ! function_exists( 'playerx_edge_map_post_quote_meta' ) ) {
	function playerx_edge_map_post_quote_meta() {
		$quote_post_format_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'playerx' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'playerx' ),
				'description' => esc_html__( 'Enter Quote text', 'playerx' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'playerx' ),
				'description' => esc_html__( 'Enter Quote author', 'playerx' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_post_quote_meta', 25 );
}