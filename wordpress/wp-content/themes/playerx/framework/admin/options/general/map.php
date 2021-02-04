<?php

if ( ! function_exists( 'playerx_edge_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function playerx_edge_general_options_map() {
		
		playerx_edge_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'playerx' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = playerx_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'playerx' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'playerx' ),
				'parent'        => $panel_design_style
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'playerx' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'playerx' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'playerx' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'playerx' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'playerx' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'playerx' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'playerx' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'playerx' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'playerx' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'playerx' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'playerx' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'playerx' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'playerx' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'playerx' ),
					'100i' => esc_html__( '100 Thin Italic', 'playerx' ),
					'200'  => esc_html__( '200 Extra-Light', 'playerx' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'playerx' ),
					'300'  => esc_html__( '300 Light', 'playerx' ),
					'300i' => esc_html__( '300 Light Italic', 'playerx' ),
					'400'  => esc_html__( '400 Regular', 'playerx' ),
					'400i' => esc_html__( '400 Regular Italic', 'playerx' ),
					'500'  => esc_html__( '500 Medium', 'playerx' ),
					'500i' => esc_html__( '500 Medium Italic', 'playerx' ),
					'600'  => esc_html__( '600 Semi-Bold', 'playerx' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'playerx' ),
					'700'  => esc_html__( '700 Bold', 'playerx' ),
					'700i' => esc_html__( '700 Bold Italic', 'playerx' ),
					'800'  => esc_html__( '800 Extra-Bold', 'playerx' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'playerx' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'playerx' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'playerx' )
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'playerx' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'playerx' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'playerx' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'playerx' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'playerx' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'playerx' ),
					'greek'        => esc_html__( 'Greek', 'playerx' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'playerx' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'playerx' )
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'playerx' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #ff0e1f', 'playerx' ),
				'parent'      => $panel_design_style
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'playerx' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'playerx' ),
				'parent'      => $panel_design_style
			)
		);

        playerx_edge_add_admin_field(
            array(
                'name'        => 'page_background_color',
                'type'        => 'color',
                'label'       => esc_html__( 'Page Background Color', 'playerx' ),
                'description' => esc_html__( 'Choose the background color for page content. Default color is #17161a', 'playerx' ),
                'parent'      => $panel_design_style
            )
        );

        playerx_edge_add_admin_field(
            array(
                'name'        => 'page_background_color_gradient_start',
                'type'        => 'color',
                'label'       => esc_html__( 'Page Gradient Background Color - start color', 'playerx' ),
                'description' => esc_html__( 'Choose the background color for page content. Default color is #17161a', 'playerx' ),
                'parent'      => $panel_design_style
            )
        );

        playerx_edge_add_admin_field(
            array(
                'name'        => 'page_background_color_gradient_middle',
                'type'        => 'color',
                'label'       => esc_html__( 'Page Gradient Background Color - middle color', 'playerx' ),
                'description' => esc_html__( 'Choose the background color for page content. Default color is #17161a', 'playerx' ),
                'parent'      => $panel_design_style
            )
        );

        playerx_edge_add_admin_field(
            array(
                'name'        => 'page_background_color_gradient_end',
                'type'        => 'color',
                'label'       => esc_html__( 'Page Gradient Background Color - end colors', 'playerx' ),
                'description' => esc_html__( 'Choose the background color for page content. Default color is #17161a', 'playerx' ),
                'parent'      => $panel_design_style
            )
        );

		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'page_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Page Background Image', 'playerx' ),
				'description' => esc_html__( 'Choose the background image for page content', 'playerx' ),
				'parent'      => $panel_design_style
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'page_background_image_repeat',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Page Background Image Repeat', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will set page background image as pattern in otherwise will be cover background image', 'playerx' ),
				'parent'        => $panel_design_style
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'playerx' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'playerx' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'playerx' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = playerx_edge_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				playerx_edge_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'playerx' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'playerx' ),
						'parent'      => $boxed_container
					)
				);
				
				playerx_edge_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'playerx' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'playerx' ),
						'parent'      => $boxed_container
					)
				);
				
				playerx_edge_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'playerx' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'playerx' ),
						'parent'      => $boxed_container
					)
				);
				
				playerx_edge_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'playerx' ),
						'description'   => esc_html__( 'Choose background image attachment', 'playerx' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'playerx' ),
							'fixed'  => esc_html__( 'Fixed', 'playerx' ),
							'scroll' => esc_html__( 'Scroll', 'playerx' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'playerx' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = playerx_edge_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				playerx_edge_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'playerx' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'playerx' ),
						'parent'      => $paspartu_container
					)
				);
				
				playerx_edge_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'playerx' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'playerx' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				playerx_edge_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'playerx' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'playerx' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				playerx_edge_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'playerx' )
					)
				);
		
				playerx_edge_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'playerx' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'playerx' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'playerx' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'playerx' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'edgtf-grid-1100' => esc_html__( '1100px - default', 'playerx' ),
					'edgtf-grid-1300' => esc_html__( '1300px', 'playerx' ),
					'edgtf-grid-1200' => esc_html__( '1200px', 'playerx' ),
					'edgtf-grid-1000' => esc_html__( '1000px', 'playerx' ),
					'edgtf-grid-800'  => esc_html__( '800px', 'playerx' )
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'playerx' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'playerx' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = playerx_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'playerx' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'playerx' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'playerx' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = playerx_edge_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				playerx_edge_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'playerx' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'playerx' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = playerx_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
				
					playerx_edge_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'playerx' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = playerx_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'playerx' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'playerx' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = playerx_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					playerx_edge_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'playerx' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
					
					playerx_edge_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'playerx' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					playerx_edge_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'playerx' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'playerx' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'playerx' ),
				'parent'        => $panel_settings
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'playerx' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = playerx_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'playerx' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'playerx' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = playerx_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'playerx' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'playerx' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'playerx_edge_action_options_map', 'playerx_edge_general_options_map', 1 );
}

if ( ! function_exists( 'playerx_edge_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function playerx_edge_page_general_style( $style ) {
		$current_style = '';
		$page_id       = playerx_edge_get_page_id();
		$class_prefix  = playerx_edge_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = playerx_edge_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = playerx_edge_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = playerx_edge_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = playerx_edge_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.edgtf-boxed .edgtf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= playerx_edge_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.edgtf-paspartu-enabled .edgtf-page-header .edgtf-fixed-wrapper.fixed',
			'.edgtf-paspartu-enabled .edgtf-sticky-header',
			'.edgtf-paspartu-enabled .edgtf-mobile-header.mobile-header-appear .edgtf-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.edgtf-paspartu-enabled.edgtf-fixed-paspartu-enabled .edgtf-page-header .edgtf-fixed-wrapper.fixed',
			'.edgtf-paspartu-enabled.edgtf-fixed-paspartu-enabled .edgtf-sticky-header.header-appear',
			'.edgtf-paspartu-enabled.edgtf-fixed-paspartu-enabled .edgtf-mobile-header.mobile-header-appear .edgtf-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = playerx_edge_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = playerx_edge_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( playerx_edge_string_ends_with( $paspartu_width, '%' ) || playerx_edge_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = playerx_edge_string_ends_with( $paspartu_width, '%' ) ? playerx_edge_filter_suffix( $paspartu_width, '%' ) : playerx_edge_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = playerx_edge_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.edgtf-paspartu-enabled .edgtf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= playerx_edge_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= playerx_edge_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= playerx_edge_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = playerx_edge_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( playerx_edge_string_ends_with( $paspartu_responsive_width, '%' ) || playerx_edge_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = playerx_edge_string_ends_with( $paspartu_responsive_width, '%' ) ? playerx_edge_filter_suffix( $paspartu_responsive_width, '%' ) : playerx_edge_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = playerx_edge_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . playerx_edge_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . playerx_edge_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . playerx_edge_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'playerx_edge_filter_add_page_custom_style', 'playerx_edge_page_general_style' );
}