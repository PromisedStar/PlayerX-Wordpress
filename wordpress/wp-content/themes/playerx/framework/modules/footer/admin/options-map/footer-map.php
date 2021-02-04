<?php

if ( ! function_exists( 'playerx_edge_footer_options_map' ) ) {
	function playerx_edge_footer_options_map() {

		playerx_edge_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'playerx' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = playerx_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'playerx' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		playerx_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'playerx' ),
				'parent'        => $footer_panel
			)
		);

        playerx_edge_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'playerx' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'playerx' ),
                'parent'        => $footer_panel,
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'      => $footer_panel,
                'type'        => 'image',
                'name'        => 'footer_background_image',
                'label'       => esc_html__( 'Background Image', 'playerx' ),
                'description' => esc_html__( 'Choose a background image for footer area', 'playerx' )
            )
        );

		playerx_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'playerx' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = playerx_edge_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		playerx_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4 4 4',
				'label'         => esc_html__( 'Footer Top Columns', 'playerx' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'playerx' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		playerx_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'playerx' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'playerx' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'playerx' ),
					'left'   => esc_html__( 'Left', 'playerx' ),
					'center' => esc_html__( 'Center', 'playerx' ),
					'right'  => esc_html__( 'Right', 'playerx' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		playerx_edge_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'playerx' ),
				'description' => esc_html__( 'Set background color for top footer area', 'playerx' ),
				'parent'      => $show_footer_top_container
			)
		);

		playerx_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'playerx' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = playerx_edge_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		playerx_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'playerx' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'playerx' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		playerx_edge_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'playerx' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'playerx' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'playerx_edge_action_options_map', 'playerx_edge_footer_options_map', 11 );
}