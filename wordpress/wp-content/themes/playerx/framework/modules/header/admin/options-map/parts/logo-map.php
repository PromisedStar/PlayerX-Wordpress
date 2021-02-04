<?php

if ( ! function_exists( 'playerx_edge_logo_options_map' ) ) {
	function playerx_edge_logo_options_map() {
		
		playerx_edge_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'playerx' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = playerx_edge_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'playerx' )
			)
		);
		
		$hide_logo_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'playerx' ),
				'parent'        => $hide_logo_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'playerx' ),
				'parent'        => $hide_logo_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'playerx' ),
				'parent'        => $hide_logo_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'playerx' ),
				'parent'        => $hide_logo_container
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'playerx' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'playerx_edge_action_options_map', 'playerx_edge_logo_options_map', 2 );
}