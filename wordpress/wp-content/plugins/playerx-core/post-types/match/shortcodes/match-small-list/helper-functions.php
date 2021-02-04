<?php

if ( ! function_exists( 'playerx_core_add_match_small_list_shortcode' ) ) {
    function playerx_core_add_match_small_list_shortcode( $shortcodes_class_name ) {
        $shortcodes = array(
            'PlayerxCore\CPT\Shortcodes\Match\MatchSmallList'
        );

        $shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );

        return $shortcodes_class_name;
    }

    add_filter( 'playerx_core_filter_add_vc_shortcode', 'playerx_core_add_match_small_list_shortcode' );
}

if ( ! function_exists( 'playerx_core_set_match_small_list_icon_class_name_for_vc_shortcodes' ) ) {
    /**
     * Function that set custom icon class name for match list shortcode to set our icon for Visual Composer shortcodes panel
     */
    function playerx_core_set_match_small_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
        $shortcodes_icon_class_array[] = '.icon-wpb-match-small-list';

        return $shortcodes_icon_class_array;
    }

    add_filter( 'playerx_core_filter_add_vc_shortcodes_custom_icon_class', 'playerx_core_set_match_small_list_icon_class_name_for_vc_shortcodes' );
}