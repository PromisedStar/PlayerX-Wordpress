<?php

if ( ! function_exists( 'playerx_edge_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function playerx_edge_header_top_bar_styles() {
		$top_header_height = playerx_edge_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo playerx_edge_dynamic_css( '.edgtf-top-bar', array( 'height' => playerx_edge_filter_px( $top_header_height ) . 'px' ) );
			echo playerx_edge_dynamic_css( '.edgtf-top-bar .edgtf-logo-wrapper a', array( 'max-height' => playerx_edge_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo playerx_edge_dynamic_css( '.edgtf-header-box .edgtf-top-bar-background', array( 'height' => playerx_edge_get_top_bar_background_height() . 'px' ) );
		
		$top_bar_container_selector = '.edgtf-top-bar > .edgtf-vertical-align-containers';
		$top_bar_container_styles   = array();
		$container_side_padding     = playerx_edge_options()->getOptionValue( 'top_bar_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( playerx_edge_string_ends_with( $container_side_padding, 'px' ) || playerx_edge_string_ends_with( $container_side_padding, '%' ) ) {
				$top_bar_container_styles['padding-left'] = $container_side_padding;
				$top_bar_container_styles['padding-right'] = $container_side_padding;
			} else {
				$top_bar_container_styles['padding-left'] = playerx_edge_filter_px( $container_side_padding ) . 'px';
				$top_bar_container_styles['padding-right'] = playerx_edge_filter_px( $container_side_padding ) . 'px';
			}
			
			echo playerx_edge_dynamic_css( $top_bar_container_selector, $top_bar_container_styles );
		}
		
		if ( playerx_edge_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.edgtf-top-bar .edgtf-grid .edgtf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = playerx_edge_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = playerx_edge_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = playerx_edge_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo playerx_edge_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = playerx_edge_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = playerx_edge_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( playerx_edge_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = playerx_edge_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = playerx_edge_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo playerx_edge_dynamic_css( '.edgtf-header-box .edgtf-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( playerx_edge_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo playerx_edge_dynamic_css( '.edgtf-top-bar', $top_bar_styles );
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_header_top_bar_styles' );
}