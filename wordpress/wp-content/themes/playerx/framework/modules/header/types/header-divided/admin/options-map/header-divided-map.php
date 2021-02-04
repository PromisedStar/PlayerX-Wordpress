<?php

if ( ! function_exists( 'playerx_edge_get_hide_dep_for_header_divided_options' ) ) {
    function playerx_edge_get_hide_dep_for_header_divided_options() {
        $hide_dep_options = apply_filters( 'playerx_edge_filter_header_divided_hide_global_option', $hide_dep_options = array() );

        return $hide_dep_options;
    }
}

if ( ! function_exists( 'playerx_edge_header_divided_map' ) ) {
    function playerx_edge_header_divided_map( $parent ) {
        $hide_dep_options = playerx_edge_get_hide_dep_for_header_divided_options();

        playerx_edge_add_admin_field(
            array(
                'parent'          => $parent,
                'type'            => 'image',
                'name'            => 'divided_header_logo_background_image',
                'default_value'   => '',
                'label'           => esc_html__( 'Logo Area background pattern', 'playerx' ),
                'description'     => esc_html__( 'Set background image for logo in divided menu', 'playerx' ),
                'dependency' => array(
                    'hide' => array(
                        'header_options'  => $hide_dep_options
                    )
                )
            )
        );
    }

    add_action( 'playerx_edge_action_additional_header_menu_area_options_map', 'playerx_edge_header_divided_map' );
}