<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'playerx_edge_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function playerx_edge_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'playerx_edge_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'playerx_edge_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function playerx_edge_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'playerx' ),
				'value'      => array(
					esc_html__( 'Full Width', 'playerx' ) => 'full-width',
					esc_html__( 'In Grid', 'playerx' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Edge Anchor ID', 'playerx' ),
				'description' => esc_html__( 'For example "home"', 'playerx' ),
				'group'       => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'playerx' ),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'playerx' ),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Edge Background Position', 'playerx' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'playerx' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'playerx' ),
				'value'       => array(
					esc_html__( 'Never', 'playerx' )        => '',
					esc_html__( 'Below 1280px', 'playerx' ) => '1280',
					esc_html__( 'Below 1024px', 'playerx' ) => '1024',
					esc_html__( 'Below 768px', 'playerx' )  => '768',
					esc_html__( 'Below 680px', 'playerx' )  => '680',
					esc_html__( 'Below 480px', 'playerx' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'playerx' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Edge Parallax Background Image', 'playerx' ),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Edge Parallax Speed', 'playerx' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'playerx' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Edge Parallax Section Height (px)', 'playerx' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'row_shadow',
                'heading'    => esc_html__( 'Edge Row Shadow', 'playerx' ),
                'value'      => array(
                    esc_html__( 'Disable', 'playerx' ) => 'no-shadow',
                    esc_html__( 'Enable', 'playerx' )    => 'with-shadow'
                ),
                'group'      => esc_html__( 'Edge Settings', 'playerx' )
            )
        );
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'playerx' ),
				'value'      => array(
					esc_html__( 'Default', 'playerx' ) => '',
					esc_html__( 'Left', 'playerx' )    => 'left',
					esc_html__( 'Center', 'playerx' )  => 'center',
					esc_html__( 'Right', 'playerx' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => esc_html__('Angled Shape in Background','playerx'),
            'param_name' => 'angled_shape',
            'value' => array(
                esc_html__('No','playerx') => 'no',
                esc_html__('Yes','playerx') => 'yes'
            ),
            'group' => esc_html__('Edge Settings', 'playerx')
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => esc_html__('Angled Shape Direction','playerx'),
            'param_name' => 'angled_shape_direction',
            'value' => array(
                esc_html__('From Left To Right','playerx') => 'from_left_to_right',
                esc_html__('From Right To Left','playerx') => 'from_right_to_left'
            ),
            'dependency' => array(
                'element' => 'angled_shape',
                'value' => array('yes')
            ),
            'group' => esc_html__('Edge Settings', 'playerx')
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => esc_html__('Angle Shape Type','playerx'),
            'param_name' => 'angled_shape_type',
            'value' => array(
                esc_html__('Top and Bottom','playerx') => 'top_bottom',
                esc_html__('Top','playerx') => 'top',
                esc_html__('Bottom','playerx') => 'bottom'
            ),
            'dependency' => array(
                'element' => 'angled_shape',
                'value' => array('yes')
            ),
            'group' => esc_html__('Edge Settings', 'playerx')
        ));



        vc_add_param('vc_row', array(
            'type' => 'attach_image',
            'heading' => esc_html__('Angled Shape Row Background Image','playerx'),
            'param_name' => 'angled_row_bck_image',
            'dependency' => array(
                'element' => 'angled_shape_type',
                'value' => array('top_bottom')
            ),
            'group' => esc_html__('Edge Settings', 'playerx')
        ));


        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => esc_html__('Angle Shape Parallax','playerx'),
            'param_name' => 'angled_shape_parallax',
            'value' => array(
                esc_html__('Yes','playerx') => 'yes',
                esc_html__('No','playerx') => 'no'
            ),
            'dependency' => array(
                'element' => 'angled_shape_type',
                'value' => array('top_bottom')
            ),
            'group' => esc_html__('Edge Settings', 'playerx')
        ));

        vc_add_param('vc_row', array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Angled Shape Background Color','playerx'),
            'param_name' => 'angle_shape_bck_color',
            'dependency' => array(
                'element' => 'angled_shape_type',
                'value' => array('top', 'bottom')
            ),
            'group' => esc_html__('Edge Settings', 'playerx')
        ));
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'playerx' ),
				'value'      => array(
					esc_html__( 'Full Width', 'playerx' ) => 'full-width',
					esc_html__( 'In Grid', 'playerx' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'playerx' ),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'playerx' ),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Edge Background Position', 'playerx' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'playerx' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'playerx' ),
				'value'       => array(
					esc_html__( 'Never', 'playerx' )        => '',
					esc_html__( 'Below 1280px', 'playerx' ) => '1280',
					esc_html__( 'Below 1024px', 'playerx' ) => '1024',
					esc_html__( 'Below 768px', 'playerx' )  => '768',
					esc_html__( 'Below 680px', 'playerx' )  => '680',
					esc_html__( 'Below 480px', 'playerx' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'playerx' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'playerx' ),
				'value'      => array(
					esc_html__( 'Default', 'playerx' ) => '',
					esc_html__( 'Left', 'playerx' )    => 'left',
					esc_html__( 'Center', 'playerx' )  => 'center',
					esc_html__( 'Right', 'playerx' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'playerx' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( playerx_edge_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Edge Enable Passepartout', 'playerx' ),
					'value'       => array_flip( playerx_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Edge Settings', 'playerx' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Edge Passepartout Size', 'playerx' ),
					'value'       => array(
						esc_html__( 'Tiny', 'playerx' )   => 'tiny',
						esc_html__( 'Small', 'playerx' )  => 'small',
						esc_html__( 'Normal', 'playerx' ) => 'normal',
						esc_html__( 'Large', 'playerx' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'playerx' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Edge Disable Side Passepartout', 'playerx' ),
					'value'       => array_flip( playerx_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'playerx' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Edge Disable Top Passepartout', 'playerx' ),
					'value'       => array_flip( playerx_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'playerx' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'playerx_edge_vc_row_map' );
}