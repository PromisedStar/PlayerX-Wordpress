<?php

if (!function_exists('playerx_core_match_meta_box_map')) {
    function playerx_core_match_meta_box_map() {

        $match_meta_box = playerx_edge_create_meta_box(
            array(
                'scope' => array('match-item'),
                'title' => esc_html__('Match', 'playerx-core'),
                'name'  => 'match_meta'
            )
        );

        playerx_edge_add_admin_section_title(array(
            'name'   => 'match_general_title',
            'parent' => $match_meta_box,
            'title'  => esc_html__('General', 'playerx-core')
        ));


        playerx_edge_create_meta_box_field(
            array(
                'type'          => 'select',
                'name'          => 'edgtf_match_status_meta',
                'default_value' => 'to_be_played',
                'label'         => esc_html__('Match Status', 'playerx-core'),
                'description'   => esc_html__('Choose match status for this match', 'playerx-core'),
                'options'       => array(
                    'to_be_played'    => esc_html__('To Be Played', 'playerx-core'),
                    'in_progress' => esc_html__('In Progress', 'playerx-core'),
                    'finished'  => esc_html__('Finished', 'playerx-core'),
                    'canceled'  => esc_html__('Canceled', 'playerx-core'),
                ),
                'parent'        => $match_meta_box,
            )
        );

        playerx_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_match_result_meta',
                'type'        => 'text',
                'label'       => esc_html__('Result', 'playerx-core'),
                'description' => esc_html__('Insert result for this match', 'playerx-core'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        playerx_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_match_stream_link',
                'type'        => 'text',
                'label'       => esc_html__('Link for stream', 'playerx-core'),
                'description' => esc_html__('Set the live streaming link', 'playerx-core'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 12
                )
            )
        );

        playerx_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_match_date_meta',
                'type'        => 'date',
                'label'       => esc_html__('Date', 'playerx-core'),
                'description' => esc_html__('Choose date for this match', 'playerx-core'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        playerx_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_match_time_meta',
                'type'        => 'text',
                'label'       => esc_html__('Time', 'playerx-core'),
                'description' => esc_html__('Insert time for this match', 'playerx-core'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        playerx_edge_add_admin_section_title(array(
            'name'   => 'match_first_team_title',
            'parent' => $match_meta_box,
            'title'  => esc_html__('Team 1', 'playerx-core')
        ));

        playerx_edge_create_meta_box_field(
            array(
                'name'            => 'edgtf_match_team_one_image_meta',
                'type'            => 'image',
                'label'           => esc_html__('Team Image', 'playerx-core'),
                'description'     => esc_html__('Choose Team Image for this match', 'playerx-core'),
                'parent'          => $match_meta_box,
            )
        );
        playerx_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_match_team_one_name_meta',
                'type'        => 'text',
                'label'       => esc_html__('Team Name', 'playerx-core'),
                'description' => esc_html__('Insert team name for this match', 'playerx-core'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        playerx_edge_add_admin_section_title(array(
            'name'   => 'match_second_team_title',
            'parent' => $match_meta_box,
            'title'  => esc_html__('Team 2', 'playerx-core')
        ));

        playerx_edge_create_meta_box_field(
            array(
                'name'            => 'edgtf_match_team_two_image_meta',
                'type'            => 'image',
                'label'           => esc_html__('Team Image', 'playerx-core'),
                'description'     => esc_html__('Choose Team Image for this match', 'playerx-core'),
                'parent'          => $match_meta_box,
            )
        );
        playerx_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_match_team_two_name_meta',
                'type'        => 'text',
                'label'       => esc_html__('Team Name', 'playerx-core'),
                'description' => esc_html__('Insert team name for this match', 'playerx-core'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );
    }

    add_action('playerx_edge_action_meta_boxes_map', 'playerx_core_match_meta_box_map');
}