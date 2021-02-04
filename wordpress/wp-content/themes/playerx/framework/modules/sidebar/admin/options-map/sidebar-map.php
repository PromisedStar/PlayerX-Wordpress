<?php

if ( ! function_exists( 'playerx_edge_sidebar_options_map' ) ) {
	function playerx_edge_sidebar_options_map() {
		
		playerx_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'playerx' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = playerx_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'playerx' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		playerx_edge_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'playerx' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'playerx' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => playerx_edge_get_custom_sidebars_options()
		) );
		
		$playerx_custom_sidebars = playerx_edge_get_custom_sidebars();
		if ( count( $playerx_custom_sidebars ) > 0 ) {
			playerx_edge_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'playerx' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'playerx' ),
				'parent'      => $sidebar_panel,
				'options'     => $playerx_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'playerx_edge_action_options_map', 'playerx_edge_sidebar_options_map', 9 );
}