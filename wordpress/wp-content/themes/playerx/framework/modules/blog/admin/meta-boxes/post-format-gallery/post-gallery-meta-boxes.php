<?php

if ( ! function_exists( 'playerx_edge_map_post_gallery_meta' ) ) {
	
	function playerx_edge_map_post_gallery_meta() {
		$gallery_post_format_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'playerx' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		playerx_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'playerx' ),
				'description' => esc_html__( 'Choose your gallery images', 'playerx' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_post_gallery_meta', 21 );
}
