<?php

if ( ! function_exists( 'playerx_edge_search_opener_icon_size' ) ) {
	function playerx_edge_search_opener_icon_size() {
		$icon_size = playerx_edge_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo playerx_edge_dynamic_css( '.edgtf-search-opener', array(
				'font-size' => playerx_edge_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_search_opener_icon_size' );
}

if ( ! function_exists( 'playerx_edge_search_opener_icon_colors' ) ) {
	function playerx_edge_search_opener_icon_colors() {
		$icon_color       = playerx_edge_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = playerx_edge_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo playerx_edge_dynamic_css( '.edgtf-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo playerx_edge_dynamic_css( '.edgtf-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_search_opener_icon_colors' );
}

if ( ! function_exists( 'playerx_edge_search_opener_text_styles' ) ) {
	function playerx_edge_search_opener_text_styles() {
		$item_styles = playerx_edge_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.edgtf-search-icon-text'
		);
		
		echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = playerx_edge_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo playerx_edge_dynamic_css( '.edgtf-search-opener:hover .edgtf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_search_opener_text_styles' );
}