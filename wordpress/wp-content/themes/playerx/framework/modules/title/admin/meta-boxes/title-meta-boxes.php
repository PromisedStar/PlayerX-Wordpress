<?php

if ( ! function_exists( 'playerx_edge_get_title_types_meta_boxes' ) ) {
	function playerx_edge_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'playerx_edge_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'playerx' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'playerx_edge_map_title_meta' ) ) {
	function playerx_edge_map_title_meta() {
		$title_type_meta_boxes = playerx_edge_get_title_types_meta_boxes();
		
		$title_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'playerx_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'playerx' ),
				'name'  => 'title_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'playerx' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'playerx' ),
				'parent'        => $title_meta_box,
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = playerx_edge_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'edgtf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'edgtf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'playerx' ),
						'description'   => esc_html__( 'Choose title type', 'playerx' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'playerx' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'playerx' ),
						'options'       => playerx_edge_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'playerx' ),
						'description' => esc_html__( 'Set a height for Title Area', 'playerx' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'playerx' ),
						'description' => esc_html__( 'Choose a background color for title area', 'playerx' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'playerx' ),
						'description' => esc_html__( 'Choose an Image for title area', 'playerx' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'playerx' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'playerx' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'playerx' ),
							'hide'                => esc_html__( 'Hide Image', 'playerx' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'playerx' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'playerx' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'playerx' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'playerx' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'playerx' )
						)
					)
				);

                playerx_edge_create_meta_box_field(
                    array(
                        'name'          => 'edgtf_show_title_area_shadow_meta',
                        'type'          => 'select',
                        'default_value' => '',
                        'label'         => esc_html__( 'Show Title Area Shadow', 'playerx' ),
                        'description'   => esc_html__( 'This option will enable/disable Title Area Shadow', 'playerx' ),
                        'parent'        => $show_title_area_meta_container,
                        'options'       => playerx_edge_get_yes_no_select_array()
                    )
                );
				
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'playerx' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'playerx' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'playerx' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'playerx' ),
							'window-top'    => esc_html__( 'From Window Top', 'playerx' )
						)
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'playerx' ),
						'options'       => playerx_edge_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'playerx' ),
						'description' => esc_html__( 'Choose a color for title text', 'playerx' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'playerx' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'playerx' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'playerx' ),
						'options'       => playerx_edge_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'playerx' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'playerx' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'playerx_edge_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_title_meta', 60 );
}