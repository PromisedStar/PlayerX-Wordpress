<?php

if (!function_exists('playerx_edge_sidearea_options_map')) {
    function playerx_edge_sidearea_options_map() {

        playerx_edge_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'playerx'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = playerx_edge_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'playerx'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'playerx'),
                'description'   => esc_html__('Choose a type of Side Area', 'playerx'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'playerx'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'playerx'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'playerx'),
                ),
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'playerx'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'playerx'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = playerx_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'playerx'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'playerx'),
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'playerx'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'playerx'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'playerx'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'playerx'),
                'options'       => playerx_edge_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = playerx_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_awesome',
                'label'         => esc_html__('Side Area Icon Pack', 'playerx'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'playerx'),
                'options'       => playerx_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = playerx_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'playerx'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'playerx'),
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'playerx'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'playerx'),
            )
        );

        $side_area_icon_style_group = playerx_edge_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'playerx'),
                'description' => esc_html__('Define styles for Side Area icon', 'playerx')
            )
        );

        $side_area_icon_style_row1 = playerx_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'playerx')
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'playerx')
            )
        );

        $side_area_icon_style_row2 = playerx_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'playerx')
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'playerx')
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'playerx'),
                'description' => esc_html__('Choose a background color for Side Area', 'playerx')
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'playerx'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'playerx'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        playerx_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => 'center',
                'label'         => esc_html__('Text Alignment', 'playerx'),
                'description'   => esc_html__('Choose text alignment for side area', 'playerx'),
                'options'       => array(
                    ''       => esc_html__('Default', 'playerx'),
                    'left'   => esc_html__('Left', 'playerx'),
                    'center' => esc_html__('Center', 'playerx'),
                    'right'  => esc_html__('Right', 'playerx')
                )
            )
        );
    }

    add_action('playerx_edge_action_options_map', 'playerx_edge_sidearea_options_map', 15);
}