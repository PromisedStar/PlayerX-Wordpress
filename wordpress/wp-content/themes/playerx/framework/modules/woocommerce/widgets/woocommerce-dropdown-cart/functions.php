<?php

if ( ! function_exists( 'playerx_edge_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function playerx_edge_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'playerx_edge_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function playerx_edge_get_dropdown_cart_icon_class() {
		$classes = array(
			'edgtf-header-cart'
		);
		
		$classes[] = playerx_edge_get_icon_sources_class( 'dropdown_cart', 'edgtf-header-cart' );
		
		return $classes;
	}
}