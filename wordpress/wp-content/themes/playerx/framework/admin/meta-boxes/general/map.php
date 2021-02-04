<?php

if ( ! function_exists( 'playerx_edge_map_general_meta' ) ) {
	function playerx_edge_map_general_meta() {
		
		$general_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => apply_filters( 'playerx_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'playerx' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'playerx' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'playerx' ),
				'parent'      => $general_meta_box
			)
		);

		
		playerx_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_page_scroll_to_content_meta',
				'type' => 'select',
				'label' => esc_html__('One-Scroll To Page Content', 'playerx'),
				'description' => esc_html__('Enable this option for a direct scroll to content on down-scroll.', 'playerx'),
				'options' => array(
					'no' => esc_html__('No','playerx'),
					'yes' => esc_html__('Yes','playerx')
				),
				'parent' => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'playerx' ),
				'parent'        => $general_meta_box
			)
		);
		
		$edgtf_content_padding_group = playerx_edge_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Styles', 'playerx' ),
				'description' => esc_html__( 'Define styles for Content area', 'playerx' ),
				'parent'      => $general_meta_box
			)
		);
		
			$edgtf_content_padding_row = playerx_edge_add_admin_row(
				array(
					'name'   => 'edgtf_content_padding_row',
					'parent' => $edgtf_content_padding_group
				)
			);

                playerx_edge_create_meta_box_field(
                    array(
                        'name'          => 'edgtf_page_skin_meta',
                        'type'          => 'selectsimple',
                        'default_value' => '',
                        'label'         => esc_html__('Page Skin', 'playerx'),
                        'description'   => esc_html__('Choose Page Skin for this page', 'playerx'),
                        'parent'        => $edgtf_content_padding_row,
                        'options'       => array(
                            ''    => esc_html__('Default (Dark)', 'playerx'),
                            'edgtf-page-content-skin-light' => esc_html__('Light', 'playerx')
                        ),
                    )
                );
			
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_page_background_color_meta',
						'type'        => 'colorsimple',
						'label'       => esc_html__( 'Page Background Color', 'playerx' ),
						'parent'      => $edgtf_content_padding_row
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_page_background_image_meta',
						'type'          => 'imagesimple',
						'label'         => esc_html__( 'Page Background Image', 'playerx' ),
						'parent'        => $edgtf_content_padding_row
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_page_background_repeat_meta',
						'type'          => 'selectsimple',
						'default_value' => '',
						'label'         => esc_html__( 'Page Background Image Repeat', 'playerx' ),
						'options'       => playerx_edge_get_yes_no_select_array(),
						'parent'        => $edgtf_content_padding_row
					)
				);
		
			$edgtf_content_padding_row_1 = playerx_edge_add_admin_row(
				array(
					'name'   => 'edgtf_content_padding_row_1',
					'next'   => true,
					'parent' => $edgtf_content_padding_group
				)
			);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'   => 'edgtf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (eg. 10px 5px 10px 5px)', 'playerx' ),
						'parent' => $edgtf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'    => 'edgtf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (eg. 10px 5px 10px 5px)', 'playerx' ),
						'parent'  => $edgtf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'playerx' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'playerx' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'playerx' ),
					'edgtf-grid-1300' => esc_html__( '1300px', 'playerx' ),
					'edgtf-grid-1200' => esc_html__( '1200px', 'playerx' ),
					'edgtf-grid-1100' => esc_html__( '1100px', 'playerx' ),
					'edgtf-grid-1000' => esc_html__( '1000px', 'playerx' ),
					'edgtf-grid-800'  => esc_html__( '800px', 'playerx' )
				)
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_page_grid_space_meta',
				'type'        => 'select',
				'default_value' => '',
				'label'       => esc_html__( 'Grid Layout Space', 'playerx' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page', 'playerx' ),
				'options'     => playerx_edge_get_space_between_items_array( true ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		playerx_edge_create_meta_box_field(
			array(
				'name'    => 'edgtf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'playerx' ),
				'parent'  => $general_meta_box,
				'options' => playerx_edge_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = playerx_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_boxed_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'playerx' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'playerx' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'playerx' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'playerx' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'playerx' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'playerx' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'          => 'edgtf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'playerx' ),
						'description'   => esc_html__( 'Choose background image attachment', 'playerx' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'playerx' ),
							'fixed'  => esc_html__( 'Fixed', 'playerx' ),
							'scroll' => esc_html__( 'Scroll', 'playerx' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'playerx' ),
				'parent'        => $general_meta_box,
				'options'       => playerx_edge_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = playerx_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'edgtf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'playerx' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'playerx' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'playerx' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'playerx' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'playerx' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'playerx' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				playerx_edge_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'playerx' ),
						'options'       => playerx_edge_get_yes_no_select_array(),
					)
				);
		
				playerx_edge_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'playerx' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'playerx' ),
						'options'       => playerx_edge_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'playerx' ),
				'parent'        => $general_meta_box,
				'options'       => playerx_edge_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = playerx_edge_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				playerx_edge_create_meta_box_field(
					array(
						'name'        => 'edgtf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'playerx' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'playerx' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => playerx_edge_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = playerx_edge_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'edgtf_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					playerx_edge_create_meta_box_field(
						array(
							'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'playerx' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = playerx_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'playerx' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'playerx' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = playerx_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					playerx_edge_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'edgtf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'playerx' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'playerx' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'playerx' ),
								'pulse'                 => esc_html__( 'Pulse', 'playerx' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'playerx' ),
								'cube'                  => esc_html__( 'Cube', 'playerx' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'playerx' ),
								'stripes'               => esc_html__( 'Stripes', 'playerx' ),
								'wave'                  => esc_html__( 'Wave', 'playerx' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'playerx' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'playerx' ),
								'atom'                  => esc_html__( 'Atom', 'playerx' ),
								'clock'                 => esc_html__( 'Clock', 'playerx' ),
								'mitosis'               => esc_html__( 'Mitosis', 'playerx' ),
								'lines'                 => esc_html__( 'Lines', 'playerx' ),
								'fussion'               => esc_html__( 'Fussion', 'playerx' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'playerx' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'playerx' )
							)
						)
					);
					
					playerx_edge_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'edgtf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'playerx' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					playerx_edge_create_meta_box_field(
						array(
							'name'        => 'edgtf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'playerx' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'playerx' ),
							'options'     => playerx_edge_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'playerx' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'playerx' ),
				'parent'      => $general_meta_box,
				'options'     => playerx_edge_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_general_meta', 10 );
}

if ( ! function_exists( 'playerx_edge_container_background_style' ) ) {
	/**
	 * Function that return container style
	 */
	function playerx_edge_container_background_style( $style ) {
		$page_id      = playerx_edge_get_page_id();
		$class_prefix = playerx_edge_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .edgtf-content'
		);
		
		$container_class        = array();
		$page_background_color  = get_post_meta( $page_id, 'edgtf_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'edgtf_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'edgtf_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}
		
		$current_style = playerx_edge_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'playerx_edge_filter_add_page_custom_style', 'playerx_edge_container_background_style' );
}