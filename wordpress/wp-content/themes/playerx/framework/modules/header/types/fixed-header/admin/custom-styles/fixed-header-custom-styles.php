<?php

if ( ! function_exists( 'playerx_edge_fixed_header_styles' ) ) {
	/**
	 * Generates styles for fixed haeder
	 */
	function playerx_edge_fixed_header_styles() {
		$background_color        = playerx_edge_options()->getOptionValue( 'fixed_header_background_color' );
		$background_transparency = playerx_edge_options()->getOptionValue( 'fixed_header_transparency' );
		$border_color            = playerx_edge_options()->getOptionValue( 'fixed_header_border_bottom_color' );
		
		$fixed_area_styles = array();
		if ( ! empty( $background_color ) ) {
			$fixed_header_background_color              = $background_color;
			$fixed_header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$fixed_header_background_color_transparency = $background_transparency;
			}
			
			$fixed_area_styles['background-color'] = playerx_edge_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) . '!important';
		}
		
		if ( empty( $background_color ) && $background_transparency !== '' ) {
			$fixed_header_background_color              = '#fff';
			$fixed_header_background_color_transparency = $background_transparency;
			
			$fixed_area_styles['background-color'] = playerx_edge_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) . '!important';
		}
		
		$selector = array(
			'.edgtf-page-header .edgtf-fixed-wrapper.fixed .edgtf-menu-area'
		);
		
		echo playerx_edge_dynamic_css( $selector, $fixed_area_styles );
		
		$fixed_area_holder_styles = array();
		
		if ( ! empty( $border_color ) ) {
			$fixed_area_holder_styles['border-bottom-color'] = $border_color;
		}
		
		$selector_holder = array(
			'.edgtf-page-header .edgtf-fixed-wrapper.fixed'
		);
		
		echo playerx_edge_dynamic_css( $selector_holder, $fixed_area_holder_styles );
		
		// fixed menu style
		
		$menu_item_styles = playerx_edge_get_typography_styles( 'fixed' );
		
		$menu_item_selector = array(
			'.edgtf-fixed-wrapper.fixed .edgtf-main-menu > ul > li > a'
		);
		
		echo playerx_edge_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = playerx_edge_options()->getOptionValue( 'fixed_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.edgtf-fixed-wrapper.fixed .edgtf-main-menu > ul > li:hover > a',
			'.edgtf-fixed-wrapper.fixed .edgtf-main-menu > ul > li.edgtf-active-item > a'
		);
		
		echo playerx_edge_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_fixed_header_styles' );
}