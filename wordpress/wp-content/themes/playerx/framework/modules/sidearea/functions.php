<?php

if ( ! function_exists( 'playerx_edge_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function playerx_edge_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area', 'playerx' ),
				'description'   => esc_html__( 'Side Area', 'playerx' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="edgtf-widget-title-holder"><h5 class="edgtf-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'playerx_edge_register_side_area_sidebar' );
}

if ( ! function_exists( 'playerx_edge_register_side_area_bottom' ) ) {
	/**
	 * Register side area sidebar
	 */
	function playerx_edge_register_side_area_bottom() {
		register_sidebar(
			array(
				'id'            => 'sidearea-bottom',
				'name'          => esc_html__( 'Side Area Bottom', 'playerx' ),
				'description'   => esc_html__( 'Side Area Bottom', 'playerx' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea-bottom %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="edgtf-widget-title-holder"><h4 class="edgtf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}

	add_action( 'widgets_init', 'playerx_edge_register_side_area_bottom' );
}

if ( ! function_exists( 'playerx_edge_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function playerx_edge_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'edgtf_side_area_opener' ) ) {
			
			if ( playerx_edge_options()->getOptionValue( 'side_area_type' ) ) {
				$classes[] = 'edgtf-' . playerx_edge_options()->getOptionValue( 'side_area_type' );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'playerx_edge_side_menu_body_class' );
}

if ( ! function_exists( 'playerx_edge_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function playerx_edge_get_side_area() {
		
		if ( is_active_widget( false, false, 'edgtf_side_area_opener' ) ) {
			$parameters = array(
				'close_icon_classes' => playerx_edge_get_side_area_close_icon_class()
			);
			
			playerx_edge_get_module_template_part( 'templates/sidearea', 'sidearea', '', $parameters );
		}
	}
	
	add_action( 'playerx_edge_action_after_body_tag', 'playerx_edge_get_side_area', 10 );
}

if ( ! function_exists( 'playerx_edge_get_side_area_close_class' ) ) {
	/**
	 * Loads side area close icon class
	 */
	function playerx_edge_get_side_area_close_icon_class() {
		$classes = array(
			'edgtf-close-side-menu'
		);
		
		$classes[] = playerx_edge_get_icon_sources_class( 'side_area', 'edgtf-close-side-menu' );
		
		return $classes;
	}
}