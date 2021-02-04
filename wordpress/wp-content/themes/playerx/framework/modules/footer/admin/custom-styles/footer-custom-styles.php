<?php

if ( ! function_exists( 'playerx_edge_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function playerx_edge_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = playerx_edge_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo playerx_edge_dynamic_css( '.edgtf-page-footer .edgtf-footer-top-holder', $item_styles );
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_footer_top_general_styles' );
}

if ( ! function_exists( 'playerx_edge_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function playerx_edge_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = playerx_edge_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo playerx_edge_dynamic_css( '.edgtf-page-footer .edgtf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_footer_bottom_general_styles' );
}

if( !function_exists('playerx_edge_footer_background_image')) {
    function playerx_edge_footer_background_image() {
        $footer_image_css = '';
        $background_image = playerx_edge_options()->getOptionValue( 'footer_background_image' );

        if(!empty($background_image)) {
            $footer_image_css = 'url(' . $background_image . ')';
        }

        echo playerx_edge_dynamic_css( '.edgtf-page-footer', array('background-image' => $footer_image_css));
    }

    add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_footer_background_image' );
}