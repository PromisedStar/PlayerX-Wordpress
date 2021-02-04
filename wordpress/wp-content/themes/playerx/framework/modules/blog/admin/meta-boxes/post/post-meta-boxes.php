<?php

/*** Post Settings ***/

if ( ! function_exists( 'playerx_edge_map_post_meta' ) ) {
	function playerx_edge_map_post_meta() {
		
		$post_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'playerx' ),
				'name'  => 'post-meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'playerx' ),
				'parent'        => $post_meta_box,
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'playerx' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'playerx' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => playerx_edge_get_custom_sidebars_options( true )
			)
		);
		
		$playerx_custom_sidebars = playerx_edge_get_custom_sidebars();
		if ( count( $playerx_custom_sidebars ) > 0 ) {
			playerx_edge_create_meta_box_field( array(
				'name'        => 'edgtf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'playerx' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'playerx' ),
				'parent'      => $post_meta_box,
				'options'     => playerx_edge_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'playerx' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'playerx' ),
				'parent'      => $post_meta_box
			)
		);

		do_action('playerx_edge_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_post_meta', 20 );
}
