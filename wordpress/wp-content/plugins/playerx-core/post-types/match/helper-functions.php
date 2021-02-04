<?php

if ( ! function_exists( 'playerx_core_matches_meta_box_functions' ) ) {
    function playerx_core_matches_meta_box_functions( $post_types ) {
        $post_types[] = 'match-item';

        return $post_types;
    }

    add_filter( 'playerx_edge_filter_meta_box_post_types_save', 'playerx_core_matches_meta_box_functions' );
    add_filter( 'playerx_edge_filter_meta_box_post_types_remove', 'playerx_core_matches_meta_box_functions' );
}

if ( ! function_exists( 'playerx_core_matches_scope_meta_box_functions' ) ) {
    function playerx_core_matches_scope_meta_box_functions( $post_types ) {
        $post_types[] = 'match-item';

        return $post_types;
    }

    add_filter( 'playerx_edge_filter_set_scope_for_meta_boxes', 'playerx_core_matches_scope_meta_box_functions' );
}

if ( ! function_exists( 'playerx_core_match_add_social_share_option' ) ) {
    function playerx_core_match_add_social_share_option( $container ) {
        playerx_edge_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'enable_social_share_on_match',
                'default_value' => 'no',
                'label'         => esc_html__( 'Single Event', 'playerx-core' ),
                'description'   => esc_html__( 'Show Social Share for Event Items', 'playerx-core' ),
                'parent'        => $container
            )
        );
    }

    add_action( 'playerx_edge_filter_post_types_social_share', 'playerx_core_match_add_social_share_option', 10, 1 );
}

if ( ! function_exists( 'playerx_core_register_matches_cpt' ) ) {
    function playerx_core_register_matches_cpt( $cpt_class_name ) {
        $cpt_class = array(
            'PlayerxCore\CPT\Match\MatchRegister'
        );

        $cpt_class_name = array_merge( $cpt_class_name, $cpt_class );

        return $cpt_class_name;
    }

    add_filter( 'playerx_core_filter_register_custom_post_types', 'playerx_core_register_matches_cpt' );
}

// Load matches shortcodes
if(!function_exists('playerx_core_include_matches_shortcodes_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function playerx_core_include_matches_shortcodes_files() {
        foreach(glob(PLAYERX_CORE_CPT_PATH.'/match/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('playerx_core_action_include_shortcodes_file', 'playerx_core_include_matches_shortcodes_files');
}

// Load matches widgets
if(!function_exists('playerx_core_include_matches_widgets_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function playerx_core_include_matches_widgets_files() {
        foreach(glob(PLAYERX_CORE_CPT_PATH.'/match/widgets/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('playerx_core_action_include_widgets_file', 'playerx_core_include_matches_widgets_files');
}

if ( ! function_exists( 'playerx_core_get_single_match' ) ) {
    function playerx_core_get_single_match() {

        $sidebar = playerx_edge_sidebar_layout();

        $params = array(
            "sidebar"   => $sidebar
        );

        playerx_core_get_cpt_single_module_template_part( 'templates/single/holder', 'match', '', $params);
    }
}

if(!function_exists('playerx_core_match_get_info_part')) {
    /**
     * Loads match info item based on passed param
     *
     * @param $part
     */
    function playerx_core_match_get_info_part($part) {

        playerx_core_get_cpt_single_module_template_part('templates/single/parts/'.$part, 'match');
    }
}

if(!function_exists('playerx_core_match_get_single_navigation')) {
    /**
     *
     */
    function playerx_core_match_get_single_navigation() {
        $params = array();

        $in_same_term = playerx_edge_options()->getOptionValue('edgtf_match_single_nav_same_category') == 'yes';

        $prev_post               = get_previous_post($in_same_term, '', 'match-category');
        $next_post               = get_next_post($in_same_term, '', 'match-category');
        $params['has_prev_post'] = false;
        $params['has_next_post'] = false;

        if($prev_post) {
            $params['prev_post_object'] = $prev_post;
            $params['has_prev_post']    = true;
            $params['prev_post']        = array(
                'title' => get_the_title($prev_post->ID),
                'link'  => get_the_permalink($prev_post->ID)
            );
        }

        if($next_post) {
            $params['next_post_object'] = $next_post;
            $params['has_next_post']    = true;
            $params['next_post']        = array(
                'title' => get_the_title($next_post->ID),
                'link'  => get_the_permalink($next_post->ID)
            );
        }

        playerx_core_get_cpt_single_module_template_part('templates/single/parts/navigation', 'match', '', $params);
    }
}