<?php

if ( ! function_exists( 'playerx_edge_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function playerx_edge_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'playerx' );

        return $search_type_options;
    }

    add_filter( 'playerx_edge_filter_search_type_global_option', 'playerx_edge_set_search_slide_from_hb_global_option' );
}