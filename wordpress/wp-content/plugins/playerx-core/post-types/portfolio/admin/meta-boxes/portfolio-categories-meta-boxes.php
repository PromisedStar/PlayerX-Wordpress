<?php

if ( ! function_exists( 'playerx_edge_portfolio_category_additional_fields' ) ) {
	function playerx_edge_portfolio_category_additional_fields() {
		
		$fields = playerx_edge_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		playerx_edge_add_taxonomy_field(
			array(
				'name'   => 'edgtf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'playerx-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'playerx_edge_action_custom_taxonomy_fields', 'playerx_edge_portfolio_category_additional_fields' );
}