<?php

if ( ! function_exists( 'playerx_edge_include_search_types_before_load' ) ) {
    /**
     * Load's all header types before load files by going through all folders that are placed directly in header types folder.
     * Functions from this files before-load are used to set all hooks and variables before global options map are init
     */
    function playerx_edge_include_search_types_before_load() {
        foreach ( glob( EDGE_FRAMEWORK_SEARCH_ROOT_DIR . '/types/*/before-load.php' ) as $module_load ) {
            include_once $module_load;
        }
    }

    add_action( 'playerx_edge_action_options_map', 'playerx_edge_include_search_types_before_load', 1 ); // 1 is set to just be before header option map init
}

if ( ! function_exists( 'playerx_edge_load_search' ) ) {
	function playerx_edge_load_search() {
		$search_type_meta = playerx_edge_options()->getOptionValue( 'search_type' );
		$search_type      = ! empty( $search_type_meta ) ? $search_type_meta : 'fullscreen';
		
		if ( playerx_edge_active_widget( false, false, 'edgtf_search_opener' ) ) {
			include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '/' . $search_type . '.php';
		}
	}
	
	add_action( 'init', 'playerx_edge_load_search' );
}

if ( ! function_exists( 'playerx_edge_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function playerx_edge_get_holder_params_search() {
		$params_list = array();
		
		$layout = playerx_edge_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'edgtf-container';
			$params_list['inner']  = 'edgtf-container-inner clearfix';
		} else {
			$params_list['holder'] = 'edgtf-full-width';
			$params_list['inner']  = 'edgtf-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'playerx_edge_filter_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'playerx_edge_get_search_page' ) ) {
	function playerx_edge_get_search_page() {
		$sidebar_layout = playerx_edge_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		playerx_edge_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'playerx_edge_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function playerx_edge_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'playerx_edge_filter_search_page_path', 'templates/page' );
		$type   = apply_filters( 'playerx_edge_filter_search_page_layout', 'default' );
		$module = apply_filters( 'playerx_edge_filter_search_page_module', 'search' );
		$plugin = apply_filters( 'playerx_edge_filter_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => playerx_edge_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'playerx_edge_filter_search_page_params', $params );
		
		playerx_edge_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}

if ( ! function_exists( 'playerx_edge_get_search_submit_icon_class' ) ) {
	/**
	 * Loads search submit icon class
	 */
	function playerx_edge_get_search_submit_icon_class() {
		$classes = array(
			'edgtf-search-submit'
		);
		
		$classes[] = playerx_edge_get_icon_sources_class( 'search', 'edgtf-search-submit' );

		return $classes;
	}
}

if ( ! function_exists( 'playerx_edge_get_search_close_icon_class' ) ) {
	/**
	 * Loads search close icon class
	 */
	function playerx_edge_get_search_close_icon_class() {
		$classes = array(
			'edgtf-search-close'
		);
		
		$classes[] = playerx_edge_get_icon_sources_class( 'search', 'edgtf-search-close' );

		return $classes;
	}
}