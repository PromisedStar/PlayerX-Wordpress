<?php

if ( ! function_exists( 'playerx_edge_register_widgets' ) ) {
    function playerx_edge_register_widgets() {
        $widgets = apply_filters( 'playerx_edge_filter_register_widgets', $widgets = array() );

        if(playerx_edge_core_plugin_installed()) {
            foreach ($widgets as $widget) {
                playerx_edge_create_wp_widget($widget);
            }
        }
    }

    add_action( 'widgets_init', 'playerx_edge_register_widgets' );
}