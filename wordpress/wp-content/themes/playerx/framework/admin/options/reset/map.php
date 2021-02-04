<?php

if ( ! function_exists( 'playerx_edge_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function playerx_edge_reset_options_map() {
		
		playerx_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'playerx' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = playerx_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'playerx' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'playerx' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'playerx_edge_action_options_map', 'playerx_edge_reset_options_map', 100 );
}