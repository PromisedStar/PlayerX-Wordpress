<?php

if ( ! function_exists( 'playerx_edge_map_post_video_meta' ) ) {
	function playerx_edge_map_post_video_meta() {
		$video_post_format_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'playerx' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'playerx' ),
				'description'   => esc_html__( 'Choose video type', 'playerx' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'playerx' ),
					'self'            => esc_html__( 'Self Hosted', 'playerx' )
				)
			)
		);
		
		$edgtf_video_embedded_container = playerx_edge_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'edgtf_video_embedded_container'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'playerx' ),
				'description' => esc_html__( 'Enter Video URL', 'playerx' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'playerx' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'playerx' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'playerx' ),
				'description' => esc_html__( 'Enter video image', 'playerx' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_post_video_meta', 22 );
}