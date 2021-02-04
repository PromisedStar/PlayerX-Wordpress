<?php

if ( ! function_exists( 'playerx_core_add_highlight_shortcodes' ) ) {
	function playerx_core_add_highlight_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PlayerxCore\CPT\Shortcodes\Highlight\Highlight'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcode', 'playerx_core_add_highlight_shortcodes' );
}