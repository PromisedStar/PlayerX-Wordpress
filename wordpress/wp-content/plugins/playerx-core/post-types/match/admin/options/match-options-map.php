<?php

if (!function_exists('playerx_edge_match_options_map')) {

    function playerx_edge_match_options_map() {

        playerx_edge_add_admin_page(array(
            'slug'  => '_match',
            'title' => esc_html__('Match', 'playerx-core'),
            'icon'  => 'fa fa-gamepad'
        ));

        $panel_match = playerx_edge_add_admin_panel(array(
            'title' => esc_html__('Match Single', 'playerx-core'),
            'name'  => 'panel_match_single',
            'page'  => '_match'
        ));

        playerx_edge_add_admin_field(array(
            'name'          => 'edgtf_match_single_hide_pagination',
            'type'          => 'yesno',
            'label'         => esc_html__('Hide Pagination', 'playerx-core'),
            'description'   => esc_html__('Enabling this option will turn off match pagination functionality.', 'playerx-core'),
            'parent'        => $panel_match,
            'default_value' => 'no',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
            )
        ));
        playerx_edge_add_admin_field(
            array(
                'name'          => 'match_single_separator',
                'type'          => 'image',
                'default_value' => PLAYERX_CORE_ASSETS_PATH . '/img/separator.png',
                'label'         => esc_html__('Separator On Section Title', 'playerx-core'),
                'description'   => esc_html__('Choose a default separator image on match single ', 'playerx-core'),
                'parent'        => $panel_match
            )
        );

        playerx_edge_add_admin_field(array(
            'name'          => 'match_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments', 'playerx-core'),
            'description'   => esc_html__('Enabling this option will show comments on your page.', 'playerx-core'),
            'parent'        => $panel_match,
            'default_value' => 'yes'
        ));


    }

    add_action('playerx_edge_action_options_map', 'playerx_edge_match_options_map', 15);

}