<?php

if ( ! function_exists( 'playerx_core_enqueue_scripts_for_vertical_split_slider_shortcodes' ) ) {
	/**
	 * Function that includes all necessary 3rd party scripts for this shortcode
	 */
	function playerx_core_enqueue_scripts_for_vertical_split_slider_shortcodes() {
		wp_enqueue_script( 'multiscroll', PLAYERX_CORE_SHORTCODES_URL_PATH . '/vertical-split-slider/assets/js/plugins/jquery.multiscroll.min.js', array( 'jquery' ), false, true );
	}
	
	add_action( 'playerx_edge_action_enqueue_third_party_scripts', 'playerx_core_enqueue_scripts_for_vertical_split_slider_shortcodes' );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider_Left_Panel extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider_Right_Panel extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider_Content_Item extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'playerx_core_add_vertical_split_screen_slider_shortcodes' ) ) {
	function playerx_core_add_vertical_split_screen_slider_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PlayerxCore\CPT\Shortcodes\VerticalSplitSlider\VerticalSplitSlider',
			'PlayerxCore\CPT\Shortcodes\VerticalSplitSliderContentItem\VerticalSplitSliderContentItem',
			'PlayerxCore\CPT\Shortcodes\VerticalSplitSliderLeftPanel\VerticalSplitSliderLeftPanel',
			'PlayerxCore\CPT\Shortcodes\VerticalSplitSliderRightPanel\VerticalSplitSliderRightPanel'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcode', 'playerx_core_add_vertical_split_screen_slider_shortcodes' );
}

if ( ! function_exists( 'playerx_core_set_vertical_split_slider_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for vertical split slider shortcode
	 */
	function playerx_core_set_vertical_split_slider_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_edgtf_vertical_split_slider_left_panel,
		.vc_shortcodes_container.wpb_edgtf_vertical_split_slider_right_panel {
			background-color: #f4f4f4;
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcodes_custom_style', 'playerx_core_set_vertical_split_slider_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'playerx_core_set_vertical_split_slider_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for vertical split slider shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function playerx_core_set_vertical_split_slider_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-vertical-split-slider';
		$shortcodes_icon_class_array[] = '.icon-wpb-vertical-split-slider-content-item';
		$shortcodes_icon_class_array[] = '.icon-wpb-vertical-split-slider-left-panel';
		$shortcodes_icon_class_array[] = '.icon-wpb-vertical-split-slider-right-panel';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcodes_custom_icon_class', 'playerx_core_set_vertical_split_slider_icon_class_name_for_vc_shortcodes' );
}