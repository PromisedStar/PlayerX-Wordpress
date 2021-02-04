<?php

if ( ! function_exists( 'playerx_edge_map_woocommerce_meta' ) ) {
	function playerx_edge_map_woocommerce_meta() {
		
		$woocommerce_meta_box = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'playerx' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'        => 'edgtf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'playerx' ),
				'description' => esc_html__( 'Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'playerx' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'playerx' ),
					'small'              => esc_html__( 'Small', 'playerx' ),
					'large-width'        => esc_html__( 'Large Width', 'playerx' ),
					'large-height'       => esc_html__( 'Large Height', 'playerx' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'playerx' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'playerx' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'playerx' ),
				'options'       => playerx_edge_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		playerx_edge_create_meta_box_field(
			array(
				'name'          => 'edgtf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'playerx' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'playerx' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_edge_map_woocommerce_meta', 99 );
}