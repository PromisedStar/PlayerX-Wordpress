<?php

if ( ! function_exists( 'playerx_edge_get_hide_dep_for_header_menu_area_options' ) ) {
	function playerx_edge_get_hide_dep_for_header_menu_area_options() {
		$hide_dep_options = apply_filters( 'playerx_edge_filter_header_menu_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'playerx_edge_header_menu_area_options_map' ) ) {
	function playerx_edge_header_menu_area_options_map( $panel_header ) {
		$hide_dep_options = playerx_edge_get_hide_dep_for_header_menu_area_options();
		
		$menu_area_container = playerx_edge_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
		
		playerx_edge_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area In Grid', 'playerx' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'playerx' ),
			)
		);
		
		$menu_area_in_grid_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_in_grid_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid'  => 'no'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'playerx' ),
				'description'   => esc_html__( 'Set grid background color for menu area', 'playerx' ),
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'playerx' ),
				'description'   => esc_html__( 'Set grid background transparency for menu area', 'playerx' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Shadow', 'playerx' ),
				'description'   => esc_html__( 'Set shadow on grid area', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'playerx' ),
				'description'   => esc_html__( 'Set border on grid area', 'playerx' )
			)
		);
		
		$menu_area_in_grid_border_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $menu_area_in_grid_container,
				'name'            => 'menu_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'playerx' ),
				'description'   => esc_html__( 'Set border color for menu area', 'playerx' ),
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'color',
				'name'          => 'menu_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'playerx' ),
				'description'   => esc_html__( 'Set background color for menu area', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'playerx' ),
				'description'   => esc_html__( 'Set background transparency for menu area', 'playerx' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Shadow', 'playerx' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'playerx' ),
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'menu_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Border', 'playerx' ),
				'description'   => esc_html__( 'Set border on menu area', 'playerx' ),
				'parent'        => $menu_area_container
			)
		);
		
		$menu_area_border_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_border'  => 'no'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'menu_area_border_color',
				'label'       => esc_html__( 'Border Color', 'playerx' ),
				'description' => esc_html__( 'Set border color for menu area', 'playerx' ),
				'parent'      => $menu_area_border_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'type'        => 'text',
				'name'        => 'menu_area_height',
				'label'       => esc_html__( 'Height', 'playerx' ),
				'description' => esc_html__( 'Enter header height', 'playerx' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'menu_area_side_padding',
				'label'  => esc_html__( 'Menu Area Side Padding', 'playerx' ),
				'parent' => $menu_area_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'playerx' )
				)
			)
		);
		
		do_action( 'playerx_edge_header_menu_area_additional_options', $panel_header );
	}
	
	add_action( 'playerx_edge_action_header_menu_area_options_map', 'playerx_edge_header_menu_area_options_map', 10, 1 );
}