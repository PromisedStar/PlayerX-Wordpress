<?php

if ( ! function_exists( 'playerx_core_testimonials_meta_box_functions' ) ) {
	function playerx_core_testimonials_meta_box_functions( $post_types ) {
		$post_types[] = 'testimonials';
		
		return $post_types;
	}
	
	add_filter( 'playerx_edge_filter_meta_box_post_types_save', 'playerx_core_testimonials_meta_box_functions' );
	add_filter( 'playerx_edge_filter_meta_box_post_types_remove', 'playerx_core_testimonials_meta_box_functions' );
}

if ( ! function_exists( 'playerx_core_register_testimonials_cpt' ) ) {
	function playerx_core_register_testimonials_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'PlayerxCore\CPT\Testimonials\TestimonialsRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'playerx_core_filter_register_custom_post_types', 'playerx_core_register_testimonials_cpt' );
}

// Load testimonials shortcodes
if(!function_exists('playerx_core_include_testimonials_shortcodes_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function playerx_core_include_testimonials_shortcodes_files() {
        foreach(glob(PLAYERX_CORE_CPT_PATH.'/testimonials/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('playerx_core_action_include_shortcodes_file', 'playerx_core_include_testimonials_shortcodes_files');
}