<?php

if ( ! function_exists( 'playerx_core_map_testimonials_meta' ) ) {
	function playerx_core_map_testimonials_meta() {
		$testimonial_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'playerx-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'playerx-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'playerx-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'playerx-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'playerx-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'playerx-core' ),
				'description' => esc_html__( 'Enter author name', 'playerx-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'playerx-core' ),
				'description' => esc_html__( 'Enter author job position', 'playerx-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_core_map_testimonials_meta', 95 );
}