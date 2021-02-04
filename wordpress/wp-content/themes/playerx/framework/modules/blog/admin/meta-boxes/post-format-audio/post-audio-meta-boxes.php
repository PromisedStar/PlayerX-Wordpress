<?php

if ( ! function_exists( 'playerx_edge_map_post_audio_meta' ) ) {
	function playerx_edge_map_post_audio_meta() {
		$audio_post_format_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'playerx' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'playerx' ),
				'description'   => esc_html__( 'Choose audio type', 'playerx' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'playerx' ),
					'self'            => esc_html__( 'Self Hosted', 'playerx' )
				)
			)
		);
		
		$edgtf_audio_embedded_container = playerx_edge_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'edgtf_audio_embedded_container'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'playerx' ),
				'description' => esc_html__( 'Enter audio URL', 'playerx' ),
				'parent'      => $edgtf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'playerx' ),
				'description' => esc_html__( 'Enter audio link', 'playerx' ),
				'parent'      => $edgtf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_post_audio_meta', 23 );
}